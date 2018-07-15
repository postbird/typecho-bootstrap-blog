<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<a class="to-top" style="z-index: 1200;">
    <img src="<?php  $this->options->themeUrl('img/top.svg')?>" alt="返回顶部" title="返回顶部">
</a>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <footer id="footer" role="contentinfo">
                &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
                <?php _e('由 <a href="http://www.typecho.org"  target="_blank">Typecho</a> 强力驱动'); ?>.
                <?php _e('Theme by  <a href="http://www.ptbird.cn" target="_blank">Postbird</a>'); ?>.
            </footer><!-- end #footer -->
        </div>
    </div>
</div>

<?php $this->footer(); ?>
</body>
</html>
