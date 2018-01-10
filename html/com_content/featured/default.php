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
$menuitems = array();
?>

<?php if (!empty($this->important)) : ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
  <!-- Indicators -->
  <ol class="carousel-indicators hidden">
  	<?php foreach ($this->important as $key => $article) : ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" <?php if (!$key) { ?>class="active" <?php } ?>><?php //echo $article->title;?></li>
  	<?php endforeach; ?>
  </ol>
  <noscript>
    <div class="carousel-indicators">
      <?php foreach ($this->important as $key => $article) : ?>
          <?php $link = JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, $article->language)); ?>
          <a href="<?php echo $link;?>" title="<?php echo $article->title;?>"><?php echo $article->title;?></a>
      <?php endforeach; ?>
    </div>
  </noscript>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php  if (count(JModuleHelper::getModules('login-campus')) > 0) : ?>
      <div class="container login-campus">
        <div class="login-campus-body first hidden-xs hidden-sm" data-toggle="modal" data-target="#login-campus">
            <span class="custom-icon"></span>
            <p class="login-text"><?php echo JText::_('JLOGIN_CAMPUS') . ' ';?></p>
        </div>
      </div>
    <?php  endif; ?>
    <?php foreach ($this->important as $key => $article) :
            $link = JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, $article->language));
            array_push($menuitems, array($article->title, $link));
            $welcome = $article->alias == 'ioc-welcome';
            $src = $imgpath . '/carousel-default.jpg';
            if ($welcome) {
              if ($welcome = preg_match('~<h2>(.*?)</h2>~', $article->introtext, $matches)) {
                $article->introtext = preg_replace('~<h2>(.*?)</h2>~', '', $article->introtext, 1);
                $article->title = $matches[1];
              }
            } else {
              $article->introtext = preg_replace('~</?p[^>]*>~', '', $article->introtext);
              if (preg_match('/class="imatge-noticia"/', $article->introtext)) {
                preg_match('/<img.+src="(([^"])+)"[^>]+>/', $article->introtext, $matches);
                if (isset($matches[1])) {
                    $src = $matches[1];
                    $article->introtext = preg_replace('/\s*<img[^>]*>\s*/', '', $article->introtext, 1);
                }
              }
            }
    ?>
            <?php if ($welcome) : ?>
              <div class="item welcome <?php if (!$key) { ?> active <?php } ?>">
                <div class="carousel-transparency">
                  <img class="top-layer" src="<?php echo $imgpath; ?>/transparency.svg" alt="">
                </div>
                <?php echo $article->introtext; ?>
            <?php else : ?>
              <div class="item <?php if (!$key) { ?> active <?php } ?>" style="background-image: url('<?php echo $src;?>')">
            <?php endif; ?>
            <div class="container logo-ioc-large">
              <img src="<?php echo $imgpath; ?>/logo-ioc-gran.svg" alt="Institut Obert de Catalunya">
            </div>
              <div class="important-background"></div>
              <div class="container carousel-caption">
                <?php
                  $link = JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, $article->language));
                ?>
                <?php if ($welcome) : ?>
                  <h2><?php echo $article->title;?></h2>
                <?php else : ?>
                  <h2><a href="<?php echo $link;?>"><?php echo $article->title;?></a></h2>
                <?php endif; ?>
        	    </div>
            </div>
    <?php endforeach; ?>
  </div>
  <div class="avisos hidden-sm hidden-xs">
    <a class="prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="control-prev" aria-hidden="true"></span>
    </a>
    <a class="next" href="#myCarousel" role="button" data-slide="next">
      <?php foreach ($menuitems as $k => $item) :?>
        <?php
          if ($k == 0) {
            $item = array(JText::_('JLIB_HTML_START'), '');
          }
        ?>
        <div><?php echo $item[0]; ?></div>
      <?php endforeach; ?>
      <span class="control-next" aria-hidden="true"></span>
    </a>
  </div>
  <div class="avisos-mobile visible-sm visible-xs">
    <h2>Novetats</h2>
    <!-- <a class="next" href="#myCarousel" role="button" data-slide="next"> -->
      <?php foreach ($menuitems as $k => $item) :?>
        <?php
          if ($k == 0) {
            continue;
          }
        ?>
        <div><a href="<?php echo $item[1];?>"><?php echo $item[0]; ?></a></div>
      <?php endforeach; ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>

<!-- Print studies -->
<?php if ($modules = JModuleHelper::getModules('studies')) : ?>
  <div id="estudis"></div>
  <?php foreach ($modules as $module) : ?>
    <div class="container all-studies">
    <?php echo JModuleHelper::renderModule($module, array('style' => 'container studies')); ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php if ($modules = JModuleHelper::getModules('employment')) : ?>
  <?php foreach ($modules as $module) : ?>
    <div class="container layout-employment">
    <?php echo JModuleHelper::renderModule($module, array('style' => 'container employment')); ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<div id="news" >
<div class="container blog-featured<?php echo $this->pageclass_sfx;?>" itemscope itemtype="https://schema.org/Blog">

<?php if ($this->params->get('show_page_heading') != 0) : ?>
  <div class="title">
    <div class="col-xs-12">
      <h1>
        <?php echo $this->escape($this->params->get('page_heading')); ?>
      </h1>
    </div>
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
			<div class="col-lg-<?php echo $collg;?> col-md-3 col-sm-4 col-xs-12 item column-<?php echo $rowcount;?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> span<?php echo round((12 / $this->columns));?>"
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
          <h3><?php echo JText::_('COM_CONTENT_READ_MORE_NEWS_TITLE'); ?></h3>
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
</div>
