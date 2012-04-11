<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php
//get template params
$templateparams	=  JFactory::getApplication()->getTemplate(true)->params;

//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

if(!$templateparams->get('html5', 0)): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else: ?>
	<?php echo '<!DOCTYPE html>'; ?>
<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="language" content="<?php echo $this->language; ?>" />

<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
<?php if ($this->error->getCode()>=400 && $this->error->getCode() < 500) { 	?>


		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/position.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/layout.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/print.css" type="text/css" media="Print" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ioc.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/error.css" type="text/css" />
<?php
	$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
	if ($files):
		if (!is_array($files)):
			$files = array($files);
		endif;
		foreach($files as $file):
?>
		<link rel="stylesheet" href="<?php echo $file;?>" type="text/css" />
<?php
	 	endforeach;
	endif;
?>
		<?php if ($this->direction == 'rtl') : ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template_rtl.css" type="text/css" />
		<?php endif; ?>
		<!--[if lte IE 6]>
			<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<!--[if IE 7]>
			<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
		<![endif]-->
</head>

<body>


	<div id="all">
		<div id="back">
			<?php if(!$templateparams->get('html5', 0)): ?>
		<div id="header">
			<?php else: ?>
		<header id="header">
			<?php endif; ?>
					<div class="logoheader">
						<h1 id="logo">
						<a href="http://www.gencat.cat/" title="Generalitat de Catalunya">
							<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/gencat.png" alt="<?php echo JText::_('Generalitat de Catalunya - Inici'); ?>" />
						</a>
						<span class="header1">
						<?php echo htmlspecialchars($templateparams->get('sitedescription'));?>
						</span>
						</h1>
					</div><!-- end logoheader -->

						<ul class="skiplinks">
							<li><a href="#wrapper2" class="u2"><?php echo JText::_('TPL_IOC_SKIP_TO_ERROR_CONTENT'); ?></a></li>
							<li><a href="#nav" class="u2"><?php echo JText::_('TPL_IOC_ERROR_JUMP_TO_NAV'); ?></a></li>

						</ul>
						<div id="line"></div>
					<div id="header-image">
						<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/hdr_bg_home.jpg"  alt="<?php echo JText::_('TPL_IOC_LOGO'); ?>" />
						<span class="title">L'institut que va on tu vas</span>
					</div>

		<?php if(!$templateparams->get('html5', 0)): ?>
				</div><!-- end header -->
			<?php else: ?>
				</header><!-- end header -->
			<?php endif; ?>
		<div id="contentarea2" >
						<?php if(!$templateparams->get('html5', 0)): ?>
							<div class="left1" id="nav">
						<?php else: ?>
							<nav class="left1" id="nav">
						<?php endif; ?>
				<div id="breadcrumbs">
					<a href="<?php echo $this->baseurl; ?>/index.php" rel="home" title="<?php echo JText::_('Inici'); ?>" class="nolink">
					<img class="logo" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/ioc_logo.png" alt="<?php echo JText::_('Logotip Institut Obert de Catalunya'); ?>" />
					</a>
				</div>
				<h2 class="unseen"><?php echo JText::_('TPL_IOC_NAVIGATION'); ?></h2>
				<?php $module = JModuleHelper::getModule( 'menu', 'Estudis' );?>
				<div class="moduletable_menu">
 				<h3>
 					<span class="backh">
						<?php echo $module->title;?>
 					</span>
 				</h3>
 				<?php echo JModuleHelper::renderModule( $module);	?>
				</div>
					<?php if(!$templateparams->get('html5', 0)): ?>
							</div>
						<?php else: ?>
							</nav>
						<?php endif; ?><!-- end navi -->
			<div id="wrapper2">
			<div id="errorboxbody">
						<h2><?php echo JText::_('JERROR_AN_ERROR_HAS_OCCURRED'); ?><br />
								<?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h2>
								<?php if (JModuleHelper::getModule( 'search' )) : ?>
									<div id="searchbox">
									<h3 class="unseen"><?php echo JText::_('TPL_IOC_SEARCH'); ?></h3>
									<p><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></p>
									<?php $module = JModuleHelper::getModule( 'search' );
									echo JModuleHelper::renderModule( $module);	?>
									</div>
								<?php endif; ?>
								<div>
								<p><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
								</div>

					<h3><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></h3>
					<div class="errdesc">
						<span class="errnum">(<?php echo $this->error->getCode() ; ?>)</span>&nbsp;<?php echo $this->error->getMessage();?>
					</div>
					<br />

				</div><!-- end wrapper -->
			</div><!-- end contentarea -->

						<?php if ($this->debug) :
							echo $this->renderBacktrace();
						endif; ?>


			</div>  <!--end all -->
			</div>
			</div>

		<div id="footer-sub">

			<?php if (!$templateparams->get('html5', 0)): ?>
				<div id="footer">
			<?php else: ?>
				<footer id="footer">
			<?php endif; ?>

					<div class="innerfooter">
					<div class="contact">
				    	<p>INSTITUT OBERT DE CATALUNYA.  Avda. Paral·lel, 71-73. 08004. Barcelona.</p>
				    	<p><a target="_blank" href="http://www20.gencat.cat/portal/site/ensenyament" rel="external">Departament d'Ensenyament</a></p>
				    </div>

				    <ul class="infofooter">
				      <li class="first"><a href="http://www.gencat.cat/web/cat/avis_legal.htm">Avís legal</a></li>
				      <li><a href="http://www.gencat.cat/web/cat/accessibilitat.htm">Accessibilitat</a></li>
				      <li>&copy; Generalitat de Catalunya</li>
				    </ul>
				</div>

			<?php if (!$templateparams->get('html5', 0)): ?>
				</div><!-- end footer -->
			<?php else: ?>
				</footer>
			<?php endif; ?>

			</div>
</body>
</html>
<?php } else { ?>
<?php
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
?>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
</head>
<body>
	<div class="error">
		<div id="outline">
		<div id="errorboxoutline">
			<div id="errorboxheader"> <?php echo $this->title; ?></div>
			<div id="errorboxbody">
			<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
				<ol>
					<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
				</ol>
			<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>

				<ul>
					<li><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
					<li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_search" title="<?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></a></li>

				</ul>
			<div id="techinfo">
			<p><?php echo $this->error->getMessage(); ?></p>

			<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>

			<p>
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</p>
			</div>
			</div>
		</div>
		</div>
	</div>
</body>
</html>


<?php } ?>
