<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-md-4 kit-hidden-tb" id="secondary" role="complementary">


    <!-- 边栏显示最近文章，默认注释掉 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <ul class="list-group">
            <li class="list-group-item list-group-item-info"><span><?php _e('最新文章'); ?></span></li>
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li class="list-group-item"><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>


    <!-- 边栏显示最近回复，默认开启 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <ul class="list-group">
            <li class="list-group-item list-group-item-info"><span><?php _e('最近回复'); ?></span></li>
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li class="list-group-item comment-item"><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>： <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>


<!-- 边栏显示文章分类 默认开启-->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget post-category" >
        <ul class="list-group">
            <li class="list-group-item list-group-item-info"><span><?php _e('文章分类'); ?></span></li>
        </ul>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=list-group&itemClass=list-group-item'); ?>
    </section>
    <?php endif; ?>

    <!-- 边栏显示归档，默认注释掉 -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
        <li class="list-group-item list-group-item-info"><span><?php _e('归档'); ?></span></li>
        <ul class="list-group">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li class="list-group-item"><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>


<!--    边栏显示其他操作，默认开启-->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
        <ul class="list-group">
            <li class="list-group-item list-group-item-info"><span><?php _e('其他'); ?></span></li>
            <?php if($this->user->hasLogin()): ?>
                <li class="list-group-item">
                    <a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a>
                    <span> &nbsp;&nbsp;|&nbsp;&nbsp;</span>
                    <a href="<?php $this->options->logoutUrl(); ?>" class="pull-right"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="list-group-item"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li class="list-group-item"><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li class="list-group-item"><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
        </ul>
	</section>
    <?php endif; ?>


    <!-- 边栏显示友情链接，默认注释掉 -->
<!--    <section class="widget">-->
<!--        <ul class="list-group">-->
<!--            <li class="list-group-item list-group-item-info"><span>--><?php //_e('友情链接'); ?><!--</span></li>-->
<!--            <li class="list-group-item"><a target="_blank" href="" title="">友情链接名称</a></li>-->
<!--        </ul>-->
<!--    </section>-->

</div><!-- end #sidebar -->
