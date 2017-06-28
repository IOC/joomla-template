<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php foreach ($this->link_items as &$item) : ?>
    <div class="row extra-new">
        <div class="more-news-icon col-xs-1 col-md-1">
            <!-- <span class="glyphicon glyphicon-triangle-right"></span> -->
            <span class="custom-icon triangle"></span>
        </div>
        <div class="more-news-title col-xs-11 col-md-8">
            <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
                <?php echo $item->title; ?>
            </a>
        </div>
    </div>
<?php endforeach; ?>
