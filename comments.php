<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="row">
    <div class="col-md-12">
        <div id="comments" class=" comments-wrapper">
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>" class="comment-item">
            <div class="comment-author">
                <?php $comments->gravatar('40', ''); ?>
                <span class="fn">
            <?php $comments->author(); ?>
            <?php if ($comments->authorId) {
                if ($comments->authorId == $comments->ownerId) {
                    echo "<span class='author-after-text'>[作者]</span>";
                }?>
            <?php }?>
        </span>
            </div>
            <div class="comment-meta">
                <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            </div>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
            <div class="comment-content">
                <?php $comments->content(); ?>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
                <p><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></p>
                <?php $comments->listComments(); ?>
                <nav  aria-label="Page navigation text-center">
                    <?php $comments->pageNav('«', '»', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination', 'itemTag' => 'li', 'itemClass'=>'page-item', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
                </nav>
            <?php endif; ?>

            <?php if($this->allow('comment')): ?>
                <div id="<?php $this->respondId(); ?>" class="respond">
                    <div class="cancel-comment-reply">
                        <?php $comments->cancelReply(); ?>
                    </div>
                    <div class="add-comments">
                        <h4 id="response"><?php _e('添加新评论'); ?></h4>
                        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="form">
                            <?php if($this->user->hasLogin()): ?>
                                <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="author" class="required"><?php _e('称呼'); ?></label>
                                    <input type="text" name="author" id="author" class="text form-control" value="<?php $this->remember('author'); ?>" required />
                                </div>
                                <div class="form-group">
                                    <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                                    <input type="email" name="mail" id="mail" class="text form-control" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                                </div>
                                <div  class="form-group">
                                    <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                                    <input type="url" name="url" id="url" class="text form-control" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                                </div>
                            <?php endif; ?>
                            <p>
                                <label for="textarea" class="required"><?php _e('内容'); ?></label>
                                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea form-control" required ><?php $this->remember('text'); ?></textarea>
                            </p>
                            <p>
                                <button type="submit" class="submit btn btn-info "><?php _e('提交评论'); ?></button>
                            </p>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <h3><?php _e('评论已关闭'); ?></h3>
            <?php endif; ?>
        </div>
    </div>
</div>
