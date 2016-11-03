<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<!--<div class="footer1<?php echo $moduleclass_sfx ?>">
    <jdoc:include type="modules" name="footer-info" style="none" />
    <?php //echo $lineone; ?>
</div>-->
<div class="col-lg-12 col-md-12 col-sm-12 footer2<?php echo $moduleclass_sfx ?>">
    <div class="col-lg-10 col-md-10 col-md-10 text-center">
        <span>Institut Obert de Catalunya. Av. Paral·lel, 71-73. 08004. Barcelona</span>
        <a href="http://ensenyament.gencat.cat">Departament d'Ensenyament</a>
    </div>
    <div class="col-lg-2 col-md-2 col-md-3 social text-center">
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
    <div class="avis_legal">
        <div class="hidden-xs">
            <div class="col-sm-2 col-md-2 col-lg-2 text-left" id="peuImatge">
                <a accesskey="5" target="_self" title="http://www.gencat.cat" href="http://www.gencat.cat">
                <img src="<?php echo JURI::base().'templates/'.$template.'/images/gencat_gris.png';?>" width="101" height="27" alt="http://www.gencat.cat" class="adaptImage"></a>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10" id="peuAvis">
                <p>
                    <a href="http://web.gencat.cat/ca/menu-ajuda/ajuda/avis_legal/" target="_blank">Avís legal</a>: La ©Generalitat de Catalunya permet la reutilització dels continguts i de les dades sempre que se citi la font i la data d'actualització, que no es desnaturalitzi la informació i que no es contradigui amb una llicència específica.
                </p>
            </div>
        </div>
        <div class="visible-xs">
            <p><a href="http://web.gencat.cat/ca/menu-ajuda/ajuda/avis_legal/" target="_blank">Avís legal</a>: La ©Generalitat de Catalunya permet la reutilització dels continguts i de les dades sempre que se citi la font i la data d'actualització, que no es desnaturalitzi la informació i que no es contradigui amb una llicència específica.</p>
        </div>
    </div>
</div>
