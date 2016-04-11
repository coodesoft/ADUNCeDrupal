<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
 /*
 * <?php print $navbar_classes; ?>
 * <?php print $front_page; ?>
 */
?>
<div id="all">
  <header id="header-container" role="banner" class="l-header">
    <div id="background" class="container-fluid">
      <div id="header" class="container">
        <?php if ($logo): ?>
          <div id="l-branding" class="branding col-xs-12 col-sm-4">
            <a class="logo" href="#" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          </div>
        <?php endif;?>
        <?php if (!empty($page['top_navigation'])): ?>
          <div class="l-top-navigation navbar-header pull-right hidden-xs">
            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> -->
            <div id="top-menu" class="navbar-collapse collapse"><!-- -collapse collapse -->
              <nav role="navigation">
                <?php if (!empty($page['top_navigation'])): ?>
                  <?php print render($page['top_navigation']); ?>
                <?php endif; ?>
              </nav>
            </div>
          </div>
        <?php endif; ?>
        <div id="slogan">
          <?php if (!empty($site_slogan)): ?>
            <p class="lead pull-bottom"><?php print $site_slogan; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div id="main-menu-container"class="container">
      <!-- <button id="main-menu" type="button" class="visible-xs-block btn btn-default btn-lg"> -->
        <!-- <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></i> -->
        <a id="hamburger" class="mm-slideout" href="#menu"><span></span></a>
      <!-- </button> -->
      <!-- <a  href="#main-menu" class="visible-xs-block">Open</a> -->

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div id="main-menu" class="navbar-collapse collapse row remove-padding"><!-- -collapse collapse -->
        <nav role="navigation" class="col-sm-12 remove-padding">
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    </div>
  </header>
  <section class="content">
    <?php print render($page['content']); ?>
  </section>
  <footer>
    <div id="footer-container">
      <?php print render($page['footer']); ?>
    </div>

    <div id="footer-line-top"></div>
    <div class="clearfix"></div>
    <div class="footer-bottom">
      <div id="footer-inside">
        <?php if(!empty($page['banner'])): ?>
          <?php print render($page['banner']); ?>
        <?php endif; ?>
      </div>
    </div>

  </footer>
</div>
