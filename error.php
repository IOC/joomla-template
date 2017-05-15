<?php
    /*------------------------------------------------------------------------
# author    Marc Català
# copyright © 2017 Institut Obert de Catalunya. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/
defined( '_JEXEC' ) or die;
// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$tpath = $this->baseurl.'/templates/'.$this->template;
?><!doctype html>
<html lang="<?php echo $this->language; ?>">
<head>
  <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> <!-- mobile viewport optimized -->
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/template.min.css" type="text/css" />
  <link rel="shortcut icon" href="<?php echo $tpath; ?>/favicon.ico" type="image/vnd.microsoft.icon" />
</head>
<body class="error">
  <div class="fluid-container">
    <div class="error-bg">
      <div class="error-text">
        <img src="<?php echo $tpath; ?>/images/ioc_logo.png" />
        <h3><?php echo htmlspecialchars($app->getCfg('sitename')); ?></h3>
        <h1> <?php echo $this->error->getCode(); ?></h1>
        <h3><?php echo $this->error->getMessage(); ?></h3>
      </div>
    </div>
    <div class="container error-search">
        <?php // Render module mod_search.
            $module = JModuleHelper::getModule('mod_search');
            echo JModuleHelper::renderModule($module);
        ?>
    </div>
    <div class="container">
        <a class="btn btn-primary btn-lg" href="<?php echo $this->baseurl; ?>/" title="<?php echo JText::_('HOME'); ?>"><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></a>
    </div>
    <div id="footer" class="footer container">
        <?php // Render module footer.
          $module = JModuleHelper::getModule('footer');
          echo JModuleHelper::renderModule($module);
        ?>
    </div>
  </div>
</body>
</html>