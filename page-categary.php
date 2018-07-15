<?php
/**
 * 文章分类
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
<div class="col-md-12 ">
    <div class="page-wrapper">
        <div class="categary-wrapper">
            <div class="categary-content" itemprop="articleBody">
                <div class="categary-list">
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<div class="col-md-3 categary-item-wrapper"><div class="categary-item" ><a class="categary-item-link" href="{permalink}"> {name} ·  ({count})</a></div></div>'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
