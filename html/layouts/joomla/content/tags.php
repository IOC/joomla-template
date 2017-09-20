<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

$authorised = JFactory::getUser()->getAuthorisedViewLevels();

?>
<?php if (!empty($displayData)) : ?>
    <?php foreach ($displayData as $tag) :?>
        <?php if (in_array($tag->access, $authorised)) : ?>
            <?php $tagParams = new Registry($tag->params); ?>
            <div class="ioctags tag-<?php echo $tagParams->get('tag_link_class'); ?>">
                <span class="glyphicon glyphicon-tag tag-icon"></span>
                <p class="tag"><?php echo strip_tags($tag->description); ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>