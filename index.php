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
if ($params->get('refresh_media_version', '0') === '1')
{
    JFactory::getApplication()->flushAssets();
}
?>
<!DOCTYPE html>
<html lang="ca">
<?php
 include 'includes/head.php';
$app = JFactory::getApplication();
$menu = $app->getMenu();
$lang = JFactory::getLanguage();
if ($menu->getActive() == $menu->getDefault($lang->getTag())
    && JRequest::getCmd('view') == 'featured') {
    $frontpage = 'ioc-front-page';
} else {
    $frontpage = '';
}
$pageclass = '';
$imgpath = 'templates/' . $app->getTemplate() . '/images/';
$itemid = JRequest::getVar('Itemid');
if ($itemid && JRequest::getCmd('view') != 'search') {
    $active = $menu->getItem($itemid);
    $params = $menu->getParams( $active->id );
    $pageclass = $params->get( 'pageclass_sfx' );
    $suffixes = array(
        'logo_',
        'subpage_'
    );
    $pageclass = str_replace($suffixes, '', $pageclass);
    if ($pageclass == 'news' && !empty($frontpage)) {
        $pageclass = '';
    }
}
?>
<body class="<?php echo $frontpage;?>">
<?php
 if($layout=='boxed'){ ?>
<div class="layout-boxed">
  <?php  } ?>
<div id="wrap">
<!--Navigation-->
<header id="header" class="header header--fixed hide-from-print <?php echo $pageclass;?>">
<div id="navigation">
<div class="fake-menu-bg"></div>
<div class="navbar navbar-default">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
    <div id="brand">
        <a href="http://ensenyament.gencat.cat" class="ioc-departament">
            <img class=" logo" src="<?php echo $imgpath; ?>logo-dep-ens.svg" alt="Departament d'Ensenyament" />
        </a>
        <a href="<?php  echo $this->params->get('logo_link')   ?>" class="ioc-logo">
            <img class="logo" src="<?php echo $imgpath; ?>logo-ioc-petit.svg" alt="Institut Obert de Catalunya" />
        </a>
    </div>
    <!-- Campus -->
    <?php  if ($this->countModules('login-campus')) : ?>
        <div id="login-campus-small" class="login-campus-mobile visible-xs visible-sm tiny-campus">
            <button type="button" class="btn-lg" data-toggle="modal" data-target="#login-campus">
                <span class="custom-icon"></span>
            </button>
        </div>
    <?php endif; ?>
    <!-- Search -->
    <div class="visible-xs visible-sm tiny-search">
        <button type="button" class="btn-lg" data-toggle="collapse" data-target="#search">
            <!-- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
            <span class="custom-icon"></span>
        </button>
    </div>
</div>
<?php  if ($this->countModules('login-campus')) : ?>
    <button id="login-campus-medium" class="hidden-xs hidden-sm login-clone-campus" data-toggle="modal" data-target="#login-campus">
        <span class="custom-icon" aria-hidden="true"></span>
        <span class="login-text"><?php echo JText::_('TPL_IOC_LOGIN_CAMPUS') . ' ';?></span>
    </button>
<?php  endif; ?>
<div class="social hidden-sm hidden-xs text-left">
        <a href="https://es.linkedin.com/in/ioc-institut-obert-de-catalunya-bb4805b1" target="_blank">
            <span class="linkedin custom-icon"></span>
        </a>
        <a href="http://twitter.com/ioc" target="_blank">
            <span class="twitter custom-icon"></span>
        </a>
        <a href="https://vimeo.com/institutobert" target="_blank">
            <span class="vimeo custom-icon"></span>
        </a>
</div>
<?php  if ($this->countModules('lang-menu')) : ?>
<div class="col-md-1 col-sm-1 hidden-sm hidden-xs ioc-languages">
    <jdoc:include type="modules" name="lang-menu" style="none" />
</div>
<?php endif; ?>
<div class="navbar-collapse collapse col-md-1 col-lg-1 col-sm-1 hidden-xs ioc-search">
    <ul class="nav navbar-nav search">
        <li>
            <span class="hidden-md hidden-sm hidden-xs">|</span>
            <button type="button" class="btn-md" data-toggle="collapse" data-target="#search">
                <!-- <span class="glyphicon glyphicon-search white" aria-hidden="true"></span> -->
                <span class="custom-icon" aria-hidden="true"></span>
                <span class="string-search hidden-md hidden-sm hidden-xs"><?php echo JText::_('JSEARCH_FILTER_SUBMIT');?></span>
            </button>
        </li>
    </ul>
</div>
<div class="navbar-collapse collapse ioc-menu col-sm-6 col-md-8 col-lg-9" aria-expanded="false">
<?php  if ($this->countModules('navigation')) : ?>
                        <jdoc:include type="modules" name="navigation" style="none" />
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
<div class="modal fade login-form-campus" id="login-campus" tabindex="-1" role="dialog" aria-labelledby="login-campus-large login-campus-medium login-campus-small" aria-hidden="true">
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
<div id="footer" class="fluid-container footer">
    <div class="logo-mobile container visible-xs visible-sm">
        <img src="<?php echo $imgpath?>logo-ioc-negatiu.svg" alt="Institut Obert de Catalunya" />
    </div>
    <div id="footer-collapse" class="top container">
        <div class="top">
            <jdoc:include type="modules" name="footer-top-col1" style="xhtml" />
            <jdoc:include type="modules" name="footer-top-col2" style="xhtml" />
            <jdoc:include type="modules" name="footer-top-col3" style="xhtml" />
            <jdoc:include type="modules" name="footer-top-col4" style="xhtml" />
        </div>
    </div>
    <div class="visible-xs visible-sm container mobile">
        <div class="social">
            <span class="text">Segueix-nos:</span>
            <a href="https://es.linkedin.com/in/ioc-institut-obert-de-catalunya-bb4805b1">
                <span class="custom-icon linkedin"></span>
            </a>
            <a href="https://twitter.com/ioc"><span class="custom-icon twitter"></span></a>
            <a href="https://vimeo.com/institutobert"><span class="custom-icon vimeo"></span></a>
        </div>
        <div class="contacte">
            <span class="text">Contacta'ns:</span>
            <a href="contacte#contacte">
                <span class="custom-icon correu"></span>
            </a>
        </div>
    </div>
    <div class="bottom container">
        <div class="ioc-banners">
            <div class="col-xs-3 col-sm-3 col-md-3 col-1">
                <jdoc:include type="modules" name="footer-bottom-col1" style="xhtml" />
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <jdoc:include type="modules" name="footer-bottom-col2" style="xhtml" />
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <jdoc:include type="modules" name="footer-bottom-col3" style="xhtml" />
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-4">
                <jdoc:include type="modules" name="footer-bottom-col4" style="xhtml" />
            </div>
        </div>
    </div>
    <jdoc:include type="modules" name="footer" />
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
<a href="#" class="back-to-top"><span class="custom-icon"></span><span class="hidden-xs hidden-sm text"><?php echo JText::_('TPL_IOC_BACKTOTOP'); ?></span></a>
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