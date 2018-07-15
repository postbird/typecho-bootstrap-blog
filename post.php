<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-md-8" id="post-item" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <div class="post-content markdown-body" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <div class="post-keywords">
            <div itemprop="keywords" class="tags"><?php _e('标签： '); ?><?php $this->tags(' ', true, 'none'); ?></div>
        </div>
        <div class="post-well" style="background-color:#f6f6f6;padding:10px;margin-bottom: 10px;white-space: nowrap;">
            <p>文章版权：<a style="color:#15A7F0;" href="http://www.ptbird.cn">Postbird-There I am , in the world more exciting!</a></p>
            <p>本文链接：<a  style="color:#15A7F0;"href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
            <p>转载请注明文章原始出处 !</p>
        </div>
    </article>
    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
    <?php $this->need('comments.php'); ?>


</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
