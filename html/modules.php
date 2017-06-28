<?php  
/*------------------------------------------------------------------------
# author    Gonzalo Suez
# copyright © 2013 gsuez.cl. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.gsuez.cl
-------------------------------------------------------------------------*/
defined('_JEXEC') or die;
/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */
/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_block($module, &$params, &$attribs)
{
 	if (!empty ($module->content)) : ?>
           <div class="block <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
            <div class="moduletable">
	           	<?php if ($module->showtitle != 0) : ?>
			<div class="module-title">
	                		<h3 class="title"><span class="<?php echo $params->get('header_class'); ?>" ></span><?php echo $module->title ; ?></h3>
			</div>
	                	<?php endif; ?>
	                	<div class="module-content">
	                		<?php echo $module->content; ?>
	                	</div>
              </div>
           </div>
	<?php endif;
}
	function modChrome_MBstyle($module, &$params, &$attribs){
		if (!empty ($module->content)) :
		?>
           <div class="MBstyle <?php  if ($params->get('moduleclass_sfx')!='') : ?><?php  echo $params->get('moduleclass_sfx'); ?><?php  endif; ?>">
            <div class="moduletable">
	           	<?php  if ($module->showtitle != 0) : ?>
			<div class="module-title">
	                		<h3 class="title"><span class="<?php echo $params->get('header_class'); ?>" ></span><?php echo $module->title ; ?></h3>
                            			<div class="title-line"> <span></span> </div>
			</div>
	                	<?php  endif; ?>
	                	<div class="module-content">
	                		<?php  echo $module->content; ?>
	                	</div>
              </div>
           </div>
	<?php 
		endif;
	}

function modChrome_studies($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="block <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
            <div class="studies">
                <?php if ($module->showtitle != 0) : ?>
                    <div class="title">
                        <div class="col-xs-12">
                            <h1><span class="<?php echo $params->get('header_class'); ?>" ></span><?php echo $module->title ; ?></h1>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="studies-content row">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
    <?php endif;
}

function modChrome_sub_studies($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="block <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
            <div class="substudies row">
                <?php if ($module->showtitle != 0) : ?>
                    <div class="title">
                        <div class="col-xs-12">
                            <h1><span class="<?php echo $params->get('header_class'); ?>" ></span><?php echo $module->title ; ?></h1>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="studies-content">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
    <?php endif;
}

function modChrome_menu_footer($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="col-sm-3 top-col">
            <div class="hidden-xs hidden-sm block <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
                <div class="studies">
                    <?php if ($module->showtitle != 0) : ?>
                        <div class="title">
                            <h3><?php echo $module->title ; ?></h3>
                        </div>
                    <?php endif; ?>
                    <div class="studies-content">
                        <?php echo $module->content; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group visible-xs visible-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#footer-collapse" href="#footer-collapse-<?php echo $module->id; ?>" aria-expanded="false"><?php echo $module->title ; ?><span class="custom-icon plus"></span></a>
                    </h3>
                </div>
                <div id="footer-collapse-<?php echo $module->id; ?>" class="panel-collapse collapse">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
    <?php endif;
}

function modChrome_banner_footer($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <?php if ($attribs['name'] == 'footer-opening') : ?>
            <div class="col-sm-12 mid-col">
        <?php else : ?>
            <div class="col-sm-3 top-col">
        <?php endif; ?>
            <div class="hidden-xs hidden-sm block <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
                <div class="moduletable">
                    <?php if ($module->showtitle != 0) : ?>
                        <div class="title">
                            <h3><?php echo $module->title ; ?></h3>
                        </div>
                    <?php endif; ?>
                    <div class="banner-content">
                        <?php echo $module->content; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group visible-xs visible-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#footer-collapse" href="#footer-collapse-<?php echo $module->id; ?>" aria-expanded="false"><?php echo $module->title ; ?><span class="custom-icon plus"></span></a>
                    </h3>
                </div>
                <div id="footer-collapse-<?php echo $module->id; ?>" class="panel-collapse collapse">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
    <?php endif;
}

function modChrome_employment($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="block <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
            <div class="row">
                <?php if ($module->showtitle != 0) : ?>
                    <div class="title">
                        <div class="col-xs-12">
                            <h1><span class="<?php echo $params->get('header_class'); ?>" ></span><?php echo $module->title ; ?></h1>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="employment-content">
                    <?php echo $module->content; ?>
                </div>
            </div>
        </div>
    <?php endif;
}
