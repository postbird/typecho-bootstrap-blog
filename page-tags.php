<?php
/**
 * 标签模板
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
    <div class="page-wrapper">
        <div class="tags-wrapper" >
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0')->to($tags); ?>
            <?php if($tags->have()): ?>
            <div class="tags-list">
                <?php while ($tags->next()): ?>
                    <div class="col-md-2 tag-item"><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?> (<?php $tags->count(); ?>)</a></div>
                <?php endwhile; ?>
                <?php else: ?>
                    <div><?php _e('没有任何标签'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- end #main-->
</div>
<?php $this->need('footer.php'); ?>
