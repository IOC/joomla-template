<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space

$imgpath = JURI::base() . 'templates/' . $template . '/images';
?>

<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
$lang = JFactory::getLanguage();
$frontpage = ($menu->getActive() == $menu->getDefault($lang->getTag()));
//print_r($this->params);
?>

<?php if (!empty($this->important)) : ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php foreach ($this->important as $key => $article) : ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" <?php if (!$key) { ?>class="active" <?php } ?>><?php echo $article->title;?></li>
  	<?php endforeach; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php foreach ($this->important as $key => $article) :
            $article->introtext = preg_replace('~</?p[^>]*>~', '', $article->introtext);
            preg_match('/<img.+src="(([^"])+)"[^>]+>/', $article->introtext, $matches);
            if (isset($matches[1])) {
                $src = $matches[1];
                $article->introtext = preg_replace('/\s*<img[^>]*>\s*/', '', $article->introtext, 1);
            } else {
                $src = $imgpath . '/carousel-default.jpg';
            }
    ?>
            <div class="item <?php if (!$key) { ?> active <?php } ?>" style="background-image: url('<?php echo $src;?>')">
              <div class="important-background"></div>
              <div class="carousel-caption">
                <?php
                  $link = JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, $article->language));
                ?>
          	    <h1><a href="<?php echo $link;?>"><?php echo $article->title;?></a></h1>
                <?php
                    /*$tinyclass = 'tiny-important';
                    if (mb_strlen(strip_tags($article->introtext)) > 222) {
                      $tinyclass = '';
                    }*/
                ?>
                <!--<p class="carousel-introtext <?php //echo $tinyclass;?>">-->
                  <?php //echo trim($article->introtext);?>
                <!--</p>-->
        	    </div>
            </div>
    <?php endforeach; ?>
  </div>

  <!--
  <div class="carousel-caption">
            <h1><span class="glyphicon glyphicon-exclamation-sign text-danger" aria-hidden="true"></span>Aturada</h1>
            <p>El proper dia 16 d'abril des de les 08:00h fins a les 12:00h, per treballs de manteniment en els servidors de l'IOC, els nostres serveis poden estar en certs moments no disponibles. Disculpeu les molèsties.</p>
          </div>
    -->

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>

<!-- Print studies -->
<?php if ($modules = JModuleHelper::getModules('studies')) : ?>
  <?php foreach ($modules as $module) : ?>
    <div class="container all-studies">
    <?php echo JModuleHelper::renderModule($module, array('style' => 'container studies')); ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<div id="news" class="container blog-featured<?php echo $this->pageclass_sfx;?>" itemscope itemtype="https://schema.org/Blog">

<?php if ($this->params->get('show_page_heading') != 0) : ?>
<div class="page-header">
	<h2>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h2>
</div>
<?php endif; ?>

<?php $leadingcount = 0; ?>
<?php if (!empty($this->lead_items)) : ?>
<div class="items-leading clearfix">
	<?php foreach ($this->lead_items as &$item) : ?>
		<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> clearfix"
			itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</div>
		<?php
			$leadingcount++;
		?>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<?php
	$introcount = (count($this->intro_items));
	$counter = 0;
?>
<?php if (!empty($this->intro_items)) : ?>
	<?php foreach ($this->intro_items as $key => &$item) : ?>

		<?php
		$key = ($key - $leadingcount) + 1;
		$rowcount = (((int) $key - 1) % (int) $this->columns) + 1;
		$row = $counter / $this->columns;
    $columns = !empty($this->link_items) ? $this->columns + 1 : $this->columns;
    $collg = (int) 12/ $columns;

		if ($rowcount == 1) : ?>

		<div class="items-row cols-<?php echo (int) $this->columns;?> <?php echo 'row-' . $row; ?> row-fluid">
		<?php endif; ?>
			<div class="col-lg-<?php echo $collg;?> col-md-3 col-sm-12 item column-<?php echo $rowcount;?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> span<?php echo round((12 / $this->columns));?>"
				itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
			<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
			?>
			</div>
			<?php $counter++; ?>

			<?php if (($rowcount == $this->columns) or ($counter == $introcount)) : ?>
        <?php if (!empty($this->link_items)) : ?>
          <div class="link_items items-more col-lg-<?php echo $collg;?> col-md-3 col-sm-12 item column-<?php echo $rowcount+1;?>">
          <h4><?php echo JText::_('COM_CONTENT_READ_MORE_TITLE'); ?></h4>
          <?php echo $this->loadTemplate('links'); ?>
          </div>
        <?php endif; ?>
        </div>
		  <?php endif; ?>

	<?php endforeach; ?>
<?php endif; ?>

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
    <div class="text-center">
    	<div class="pagination">

    		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
    			<p class="counter pull-right">
    				<?php echo $this->pagination->getPagesCounter(); ?>
    			</p>
    		<?php  endif; ?>
    				<?php echo $this->pagination->getPagesLinks(); ?>
    	</div>
    </div>
<?php endif; ?>

</div>
