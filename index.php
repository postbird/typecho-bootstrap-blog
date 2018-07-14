<?php
/**
 * Postbird typecho 两栏博客简约主题
 * 
 * @package Postbird-typecho-two-sidebar-block
 * @author postbird
 * @version 0.0.1
 * @link http://www.ptbird.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="col-md-8 col-xs-12 " id="main" role="main">
	<?php while($this->next()): ?>
        <article class="post-wrapper" itemscope itemtype="http://schema.org/BlogPosting">
           <div class="row">
               <div class="col-md-4 col-xs-4">
                   <?php if(get_postthumb($this)) {?>
                       <img src="<?php echo get_postthumb($this) ?>" alt="文章缩略图" class="post-thumb-image img-thumbnail">
                   <?php }else{?>
                       <div class="no-thumb-image">
                           <span>暂无缩略图</span>
                       </div>
                   <?php } ?>
               </div>
               <div class="col-md-8 col-xs-8">
                   <h3><a class="title-link" itemprop="url" title="<?php $this->title() ?>" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
<!--                   <hr>-->
                   <div class="post-content" itemprop="articleBody">
                        <?php $this->excerpt(100, '...'); ?>
                   </div>
               </div>
               <div class="col-md-12 post-meta">
                   <ul class="">
                       <li><?php _e('时间： '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
                       <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者： '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
                       <li><?php _e('分类： '); ?><?php $this->category(','); ?></li>
                       <li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0 条评论', '1 条评论', '%d 条评论'); ?></a></li>
                       <li class="float-right">
                           <a href="<?php $this->permalink() ?>" class="float-right">阅读全文</a>
                       </li>
                   </ul>

               </div>
           </div>


        </article>
	<?php endwhile; ?>
    <nav  aria-label="Page navigation ">
        <?php $this->pageNav('«', '»', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination', 'itemTag' => 'li', 'itemClass'=>'page-item', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
    </nav>

</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
