<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-md-12">
        <div class="page-header">
            <div class="page-title">
                <h3 class=" text-center"><?php $this->archiveTitle(array(
                        'category'  =>  _t('分类 <span class="archive-title">%s</span> 下的文章'),
                        'search'    =>  _t('包含关键字  <span class="archive-title">%s</span>  的文章'),
                        'tag'       =>  _t('标签  <span class="archive-title">%s</span>  下的文章'),
                        'author'    =>  _t(' <span class="archive-title">%s</span>  发布的文章')
                    ), '', ''); ?></h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="main" role="main">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <div class="col-md-4 card-item">
                <div class="card post-wrapper" >
                    <?php if(get_postthumb($this)) {?>
                        <a href="<?php $this->permalink() ?>"><img src="<?php echo get_postthumb($this) ?>" alt="文章缩略图" class="post-thumb-image img-thumbnail"></a>
                    <?php }else{?>
                        <div class="no-thumb-image">
                            <a href="<?php $this->permalink() ?>"><span>暂无缩略图</span></a>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title text-center"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h5>
                        <p class="card-text"><?php $this->excerpt(100, '...'); ?></p>
                        <hr>
                        <div class="card-meta">
                            <div class="card-meta-item" itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></div>
                            <div class="card-meta-item"><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></div>
                            <div class="card-meta-item"><?php _e('分类: '); ?><?php $this->category(','); ?></div>
                            <div  class="card-meta-item" itemprop="interactionCount"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('0 条评论', '1 条评论', '%d 条评论'); ?></a></div> </div>
                        <hr>
                        <a href="<?php $this->permalink() ?>" class="float-right">阅读全文</a>
                    </div>
                </div>
            </div>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div><!-- end #main -->

<!--	--><?php //$this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
