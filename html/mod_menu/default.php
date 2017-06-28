<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<?php

if ($params->get('menutype') == 'topmenu') {
	$class = "nav navbar-nav";
	$menunavclass = "";
} else {
		$class = "nav navbar-nav";
	$menunavclass = "";

/*	$class = "panel-group";
	$menunavclass = "panel panel-default";*/
}

?>
<ul class="<?php echo $class;?>"<?php
	$tag = '';

	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php

$specialstyles = array (
	'Ioc-studies',
	'Ioc-sub_studies',
	'Ioc-employment',
);

$specialclass = '';
if (in_array($params->get('style'), $specialstyles)) {
	$numelements = count($list);
	$col = 3;
	$colsmall = 6;
	if ($numelements < 4) {
		$col = 12 / $numelements;
	}
	$specialclass = "list-group-item col-lg-$col col-md-$col col-sm-$col col-xs-$colsmall ";
}

foreach ($list as $i => &$item)
{
	$dataattr = '';

	if ($item->params->get('menu-meta_keywords')) {
		$dataattr = 'data-meta-keyword="' . $item->params->get('menu-meta_keywords') . '"';
	}

	$class = $menunavclass . $specialclass . 'item-' . $item->id;

	if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if (!empty($class))
	{
		$class = ' class="' . trim($class) . '"';
	}

	echo '<li' . $class . ' ' . $dataattr . '>';

	if (!empty($specialclass)) {
		$style = '';
		if ($item->menu_image) {
			$style = 'style="background-image: url('. $item->menu_image .')"';
		}
		echo '<a href="'. $item->flink .'"><div class="study-img" '. $style . '></div>';
	}

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	if (!empty($specialclass)) {
		echo '</a>';
	}
	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="nav-child unstyled small">';
	}
	elseif ($item->shallower)
	{
		// The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	else
	{
		// The next item is on the same level.
		echo '</li>';
	}
}
?></ul>
