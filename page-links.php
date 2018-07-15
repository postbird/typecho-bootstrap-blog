<?php
/**
 * 友情链接模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col-md-12 text-center">
    <div class="page-header">
        <h2 class="page-title"><?php $this->title() ?></h2>
        <hr>
    </div>
</div>
<div class="col-md-12">
    <div class="">
        <div class="page-content markdown-body" itemprop="articleBody" style="">
            <?php $this->content(); ?>
        </div>
    </div><!-- end #main-->
</div>
<div class="col-md-12">
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
