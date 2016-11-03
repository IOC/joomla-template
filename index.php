<?php
/*------------------------------------------------------------------------
# author Gonzalo Suez
# copyright Copyright © 2013 gsuez.cl. All rights reserved.
# @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website http://www.gsuez.cl
-------------------------------------------------------------------------*/	// no direct access
defined('_JEXEC') or die;
include 'includes/params.php';
if ($params->get('compile_sass', '0') === '1')
{
	require_once "includes/sass.php";
}
?>
<!DOCTYPE html>
<html lang="ca">
<?php
 include 'includes/head.php'; ?>
<body>
<?php
 if($layout=='boxed'){ ?>
<div class="layout-boxed">
  <?php  } ?>
<div id="wrap">
<!--Navigation-->
<header id="header" class="header header--fixed hide-from-print" >
<!--top-->
<?php  //if($this->countModules('top')) : ?>
<div id="top" class="navbar-inverse">
<div class="container">
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7 logoheader">
        <a title="Generalitat de Catalunya" href="http://www.gencat.cat/">
            <img alt="Generalitat de Catalunya" src="<?php echo JURI::base().'templates/'.$this->template.'/images/gencat.png';?>">
        </a>
    </div>
    <div class="col-md-3 col-sm-3 text-right">
        <jdoc:include type="modules" name="lang-menu" style="none" />
    </div>
    <div class="col-lg-2 col-md-2 col-md-3 social hidden-sm hidden-xs text-center">
        <a href="https://es.linkedin.com/in/ioc-institut-obert-de-catalunya-bb4805b1" target="_blank">
            <span class="glyphicon glyphicons-social-linked-in img-circle" aria-hidden="true"></span>
        </a>
        <a href="http://twitter.com/ioc" target="_blank">
            <span class="glyphicon glyphicons-social-twitter img-circle" aria-hidden="true"></span>
        </a>
        <a href="https://vimeo.com/institutobert" target="_blank">
            <span class="glyphicon glyphicons-social-vimeo img-circle" aria-hidden="true"></span>
        </a>
    </div>
</div>
<div class="row">
<jdoc:include type="modules" name="top" style="none" />
</div>
</div>
</div>
<?php  //endif; ?>
<!--top-->
<div id="navigation">
<div class="navbar navbar-default">
<div class="container">
<div class="navbar-header col-lg-3">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
    <div id="brand">
        <a href="<?php  echo $this->params->get('logo_link')   ?>">
            <img class="hidden-xs hidden-sm logo" src="templates/ioc/images/ioc_logo.png" alt="Logotip Institut Obert de Catalunya" />
            <img class="hidden-lg hidden-md logo-small" src="templates/ioc/images/ioc_logo_small.png" alt="Logotip Institut Obert de Catalunya" />
        </a>
    </div>
    <!-- Search -->
    <div class="col-md-1 col-lg-1 col-sm-1 visible-xs tiny-search">
        <button type="button" class="navbar-toggle btn-lg" data-toggle="collapse" data-target="#search">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
    </div>
    <!-- Campus -->
    <?php  if ($this->countModules('login-campus')) : ?>
        <div id="frm-login-campus-mobile" class="col-md-1 col-lg-1 col-sm-1 visible-xs tiny-campus">
            <button type="button" class="navbar-toggle btn-lg" data-toggle="modal" data-target="#login-campus">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </button>
        </div>
    <?php endif; ?>
</div>
<div class="navbar-collapse collapse col-sm-6 col-md-8 col-lg-9">
<?php  if ($this->countModules('navigation')) : ?>
                        <jdoc:include type="modules" name="navigation" style="none" />
                        <?php  endif; ?>
</div>
<div class="navbar-collapse collapse navbar-right col-md-1 col-lg-1 col-sm-1 hidden-xs">
    <ul class="nav navbar-nav search">
        <li>
            <button type="button" class="btn-md" data-toggle="collapse" data-target="#search">
                <span class="glyphicon glyphicon-search white" aria-hidden="true"></span>
                <span class="hidden-md hidden-sm hidden-xs"><?php echo JText::_('JSEARCH_FILTER_SUBMIT');?></span>
            </button>
        </li>
    </ul>
</div>
<div id="frm-login-campus" class="navbar-collapse collapse navbar-right col-md-1 col-lg-1 col-sm-1 hidden-xs">
<?php  if ($this->countModules('login-campus')) : ?>
    <ul class="nav navbar-nav login-campus">
        <li>
            <button type="button" class="btn-md" data-toggle="modal" data-target="#login-campus">
                <span class="glyphicon glyphicon-user white" aria-hidden="true"></span>
                <span id="login-text" class="hidden-md hidden-sm hidden-xs"><?php echo JText::_('JLOGIN') . ' ';?>Campus</span>
            </button>
        </li>
    </ul>
<?php  endif; ?>
</div>
</div></div>
</div>
</header>
<div class="clearfix"></div>
<!--Navigation-->
<section>
<!--fullwidth-->
<?php  if($this->countModules('fullwidth')) : ?>
<div id="fullwidth">
<div class="row">
<jdoc:include type="modules" name="fullwidth" style="block"/>
</div>
</div>
<?php  endif; ?>
<!--fullwidth-->
<!--Showcase-->
<?php  if($this->countModules('showcase')) : ?>
<div id="showcase">
<div class="container">
<div class="row">
<jdoc:include type="modules" name="showcase" style="block"/>
</div>
</div>
</div>
<?php  endif; ?>
<!--Showcase-->
<!--Feature-->
<?php  if($this->countModules('feature')) : ?>
<div id="feature">
<div class="container">
<div class="row">
<jdoc:include type="modules" name="feature" style="block" />
</div>
</div>
</div>
<?php  endif; ?>
<!--Feature-->
<!--Breadcrum-->
<?php  if($this->countModules('breadcrumbs')) : ?>
<div id="breadcrumbs" class="hidden-xs">
<div class="container">
<div class="row">
<jdoc:include type="modules" name="breadcrumbs" style="block" />
</div>
</div>
</div>
<!--Breadcrum-->
<?php  endif; ?>
<!-- Content -->
<div class="fluid-container">
<div id="main" class="row show-grid">
<!-- Left -->
<?php  if($this->countModules('left')) : ?>
<div id="sidebar" class="col-sm-<?php  echo $leftcolgrid; ?>">
<jdoc:include type="modules" name="left" style="block" />
</div>
<?php  endif; ?>
<!-- Component -->
<div id="container" class="col-sm-<?php  echo (12-$leftcolgrid-$rightcolgrid); ?>">
<!-- Content-top Module Position -->
<?php  if($this->countModules('content-top')) : ?>
<div id="content-top" class="container">
<button type="button" class="collapsed" data-toggle="collapse" data-target=".menu-nav">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<div class="collapse menu-nav">
    <jdoc:include type="modules" name="content-top" style="block" />
</div>
</div>
<?php  endif; ?>
<!-- Front page show or hide -->
<?php
	$app = JFactory::getApplication();
	$menu = $app->getMenu();
	if ($frontpageshow){
		// show on all pages
		?>
<div id="main-box">

<jdoc:include type="message" />
<div class="collapse form-search search-top" id="search" aria-labelledby="search" aria-hidden="true">
    <div class="container">
        <jdoc:include type="modules" name="search" style="modules" />
    </div>
</div>
<jdoc:include type="component" />
<?php  if ($this->countModules('sub_studies')) : ?>
    <div class="container all-studies">
        <jdoc:include type="modules" name="sub_studies" style="sub_studies" />
    </div>
<?php  endif; ?>
<?php  if ($this->countModules('login-campus')) : ?>
<div class="modal fade login-campus" id="login-campus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <jdoc:include type="modules" name="login-campus" style="modal" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php  endif; ?>
</div>
<?php
	} else {
		if ($menu->getActive() !== $menu->getDefault()) {
			// show on all pages but the default page
			?>
<div id="main-box">
<jdoc:include type="component" />
</div>
<?php
 }} ?>
<!-- Front page show or hide -->
<!-- Below Content Module Position -->
<?php  if($this->countModules('content-bottom')) : ?>
<div id="content-bottom">
<div class="row">
<jdoc:include type="modules" name="content-bottom" style="block" />
</div>
</div>
<?php  endif; ?>
</div>
<!-- Right -->
<?php  if($this->countModules('right')) : ?>
<div id="sidebar-2" class="col-sm-<?php  echo $rightcolgrid; ?>">
<jdoc:include type="modules" name="right" style="block" />
</div>
<?php  endif; ?>
</div>
</div>

<!-- Content -->
<!-- bottom -->
<?php  if($this->countModules('bottom')) : ?>
<div id="bottom">
<div class="container">
<div class="row">
<jdoc:include type="modules" name="bottom" style="block" />
</div>
</div>
</div>
<?php  endif; ?>
<!-- bottom -->
<!-- footer -->
<?php  if($this->countModules('footer')) : ?>
<div id="footer" class="fluid-container">
<div class="footer">
<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-4 col-sm-4 col-md-4">
            <jdoc:include type="modules" name="footer-info" style="xhtml" />
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4">
            <jdoc:include type="modules" name="footer-web" style="xhtml" />
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4">
            <jdoc:include type="modules" name="footer-banners" style="xhtml" />
        </div>
    </div>
    <jdoc:include type="modules" name="footer" />
</div>
</div>
</div>
<?php  endif; ?>
<!-- footer -->
<!--<div id="push"></div>-->
<!-- copy -->
<?php  if($this->countModules('copy')) : ?>
<div id="copy"  class="well">
<div class="container">
<div class="row">
<jdoc:include type="modules" name="copy" style="block" />
</div>
</div>
</div>
<?php  endif; ?>
<!-- copy -->
<!-- menu slide -->
<?php  if($this->countModules('panelnav')): ?>
<div id="panelnav">
    <jdoc:include type="modules" name="panelnav" style="none" />
</div><!-- end panelnav -->
<?php  endif;// end panelnav  ?>
<!-- menu slide -->
<a href="#" class="back-to-top"><span class="glyphicon glyphicon-chevron-up"></span></a>
<jdoc:include type="modules" name="debug" />
</section></div>
<?php
 if($layout=='boxed'){ ?>
</div>
  <?php  } ?>
<!-- page -->
<!-- JS -->
<script type="text/javascript" src="<?php echo $tpath; ?>/js/template.min.js"></script>
<!-- JS -->
</body>
</html>