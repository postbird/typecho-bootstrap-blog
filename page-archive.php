<?php
/**
 * 文章存档
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
        <article class="page-wrapper" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="post-content" itemprop="articleBody">
                <?php
                $stat = Typecho_Widget::widget('Widget_Stat');
                Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
                $year=0; $mon=0; $i=0; $j=0;
                $output = '<div class="archives">';
                while($archives->next()){
                    $year_tmp = date('Y',$archives->created);
                    $mon_tmp = date('m',$archives->created);
                    $y=$year; $m=$mon;
                    if ($year > $year_tmp || $mon > $mon_tmp) {
                        $output .= '</ul></div>';
                    }
                    if ($year != $year_tmp || $mon != $mon_tmp) {
                        $year = $year_tmp;
                        $mon = $mon_tmp;
                        $output .= '<div class="archives-item"><h4>'.date('Y年m月',$archives->created).'</h4><hr><ul class="archives_list">'; //输出年份
                    }
                    $output .= '<li>'.date('d日',$archives->created).' <a href="'.$archives->permalink .'">'. $archives->title .'</a></li>'; //输出文章
                }
                $output .= '</ul></div></div>';
                echo $output;
                ?>
            </div>
        </article>
    </div><!-- end #main-->
<?php $this->need('footer.php'); ?>