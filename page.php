<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-12" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="page-header">
            <div class="post-header" >
                <h2 class="page-title text-center"><?php $this->title() ?></h2>
                <hr>
            </div>
        </div>
        <div class="page-content markdown-body" itemprop="articleBody" style="">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>

<?php //$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
