<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');
?>
<div class="fluid-container page-header default ">
    <div class="container">
        <h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
    </div>
</div>
<div class="item-page-default search<?php echo $this->pageclass_sfx; ?> container">
<?php echo $this->loadTemplate('form'); ?>
<?php if ($this->error == null && count($this->results) > 0) :
    echo $this->loadTemplate('results');
else :
    echo $this->loadTemplate('error');
endif; ?>
</div>
