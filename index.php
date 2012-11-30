<?php
/**
 * @package		Joomla.Site
 * @subpackage	Templates.ioc
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color			= $this->params->get('templatecolor');
$logo			= $this->params->get('logo');
$navposition	= $this->params->get('navposition');
$app			= JFactory::getApplication();
$doc			= JFactory::getDocument();
$templateparams	= $app->getTemplate(true)->params;

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript', true);
?>
<?php if(!$templateparams->get('html5', 0)): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else: ?>
	<?php echo '<!DOCTYPE html>'; ?>
<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		<jdoc:include type="head" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/position.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/layout.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/print.css" type="text/css" media="Print" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ioc.css" type="text/css" />
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
<?php if($templateparams->get('html5', 0)) { ?>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/html5.js"></script>
		<![endif]-->
<?php } ?>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/hide.js"></script>
	</head>

	<body>
	<?php if (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false) : ?>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/ie6only.css" rel="stylesheet" type="text/css" />
		<div class="ie6">
			<img class="logo" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/ioc_logo.png" alt="<?php echo JText::_('Logotip Institut Obert de Catalunya'); ?>" />
			<br />
			<br />
			<br />
			<p class="clear">
				<strong>El vostre navegador (Internet Explorer 6) no &eacute;s compatible amb els est&agrave;ndards web, que utilitza l'Institut Obert de Catalunya.</strong>
			</p>
			<p>
				<strong>Per a poder visualitzar correctament aquest portal, utilitzeu qualsevol dels navegadors seg&uuml;ents:</strong>
			</p>
			<br />
			<p>
				<a href="http://www.mozilla.org/ca/firefox/new/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/FF.png"></a>
				<a href="http://www.google.com/chrome/index.html"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/GC.png"></a>
				<a href="http://www.opera.com/browser/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/OB.png"></a>
				<a href="http://www.apple.com/es/safari/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/SA.png"></a>
				<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/IE.png"></a>
			</p>
		</div>
	<?php else :?>
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
						<jdoc:include type="modules" name="position-1" />
						<div id="line">
						<h3 class="unseen"><?php echo JText::_('TPL_IOC_SEARCH'); ?></h3>
						<jdoc:include type="modules" name="position-0" />
						</div> <!-- end line -->
			<div id="header-image">
				<jdoc:include type="modules" name="position-15" />
				<?php if ($this->countModules('position-15')==0): ?>
					<?php $logo = $showRightColumn ? 'hdr_bg_home.jpg' : 'hdr_bg.jpg'; ?>
					<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/<?php echo $logo?>"  alt="<?php echo JText::_('TPL_IOC_LOGO'); ?>" />
					<span class="title"><?php echo JText::_('L\'institut que va on tu vas'); ?></span>
				<?php endif; ?>
			</div>
			<?php if (!$templateparams->get('html5', 0)): ?>
				</div><!-- end header -->
			<?php else: ?>
				</header><!-- end header -->
			<?php endif; ?>
			<div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
						<div id="breadcrumbs">
							<a href="" rel="home" title="<?php echo JText::_('Inici'); ?>" class="nolink">
							<img class="logo" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/ioc_logo.png" alt="<?php echo JText::_('Logotip Institut Obert de Catalunya'); ?>" />
							</a>
							<jdoc:include type="modules" name="top-menu" />
							<jdoc:include type="modules" name="login-campus" />
							<jdoc:include type="modules" name="position-2" />

						</div>
						<?php if ($navposition=='left' and $showleft) : ?>

							<?php if(!$this->params->get('html5', 0)): ?>
								<div class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
							<?php else: ?>
								<nav class="left1 <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
							<?php endif; ?>

									<jdoc:include type="modules" name="position-7" style="iocDivision" headerLevel="3" />
									<jdoc:include type="modules" name="position-4" style="iocHide" headerLevel="3" state="0 " />
									<jdoc:include type="modules" name="position-5" style="iocTabs" headerLevel="2"  id="3" />

							<?php if(!$this->params->get('html5', 0)): ?>
								</div><!-- end navi -->
							<?php else: ?>
								</nav>
							<?php endif; ?>

						<?php endif; ?>

						<div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>>

							<div id="main">

							<?php if ($this->countModules('position-12')): ?>
								<div id="top"><jdoc:include type="modules" name="position-12"   />
								</div>
							<?php endif; ?>

								<jdoc:include type="message" />
								<jdoc:include type="component" />

							</div><!-- end main -->

						</div><!-- end wrapper -->

					<?php if ($showRightColumn) : ?>
						<h2 class="unseen">
							<?php echo JText::_('TPL_IOC_ADDITIONAL_INFORMATION'); ?>
						</h2>
	<!--	<div id="close">
							<a href="#" onclick="auf('right')">
								<span id="bild">
									<?php //echo JText::_('TPL_IOC_TEXTRIGHTCLOSE'); ?></span></a>
						</div>-->

					<?php if (!$templateparams->get('html5', 0)): ?>
						<div id="right">
					<?php else: ?>
						<aside id="right">
					<?php endif; ?>
					<?php
										if(!empty($_SERVER['QUERY_STRING']) && preg_match('/^errorcode=\d/', $_SERVER['QUERY_STRING'])){
											preg_match('/(?<=^errorcode=)\d/', $_SERVER['QUERY_STRING'], $error);
											$error = (int)array_shift($error);
											if ($error > 0 && $error < 5){
												$missatge = "<div class=\"aligne\"><h2>Error d'accés al campus</h2></div><div class=\"alignd\"><img src=\"".$this->baseurl."/templates/ioc/images/exclamation.png\" alt=\"Exclamació\"/></div><p class=\"clear\"><br />";
												if($error === 1){
													$missatge .= "No estan habilitades les galetes del seu navegador.";
												}elseif($error === 2){
													$missatge .= "Nom d'usuari incorrecte.";
												}elseif($error === 3){
													$missatge .= "Nom d'usuari o contrasenya incorrecte.";
												}elseif($error === 4){
													$missatge .= "Temps de sessió finalitzat.";
												}
												$missatge .= "</p>";
												$missatge .= "<a title=\"Ajuda campus\" href=\"index.php?option=com_content&view=article&id=193&Itemid=28\"><img src=\"templates/ioc/images/help.png\" alt=\"Ajuda campus\" /> Ajuda'm a entrar al campus</a>";
												echo "<div class=\"moduletable\"><div class=\"errcampus\">$missatge</div></div>";
											}
										}
					?>
							<a id="additional"></a>
							<jdoc:include type="modules" name="position-6" style="iocDivision" headerLevel="3"/>
							<jdoc:include type="modules" name="position-8" style="iocDivision" headerLevel="3"  />
							<jdoc:include type="modules" name="position-3" style="iocDivision" headerLevel="3"  />

					<?php if(!$templateparams->get('html5', 0)): ?>
						</div><!-- end right -->
					<?php else: ?>
						</aside>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($navposition=='center' and $showleft) : ?>

					<?php if (!$this->params->get('html5', 0)): ?>
						<div class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav" >
					<?php else: ?>
						<nav class="left <?php if ($showRightColumn==NULL){ echo 'leftbigger';} ?>" id="nav">
					<?php endif; ?>

							<jdoc:include type="modules" name="position-7"  style="iocDivision" headerLevel="3" />
							<jdoc:include type="modules" name="position-4" style="iocHide" headerLevel="3" state="0 " />
							<jdoc:include type="modules" name="position-5" style="iocTabs" headerLevel="2"  id="3" />

					<?php if (!$templateparams->get('html5', 0)): ?>
						</div><!-- end navi -->
					<?php else: ?>
						</nav>
					<?php endif; ?>
				<?php endif; ?>

						<div class="wrap"></div>

					</div> <!-- end contentarea -->

				</div><!-- back -->

			</div><!-- all -->

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

			<jdoc:include type="modules" name="debug" />
		<?php endif; ?>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/campus.js"></script>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/analytics.js"></script>
	</body>
</html>
