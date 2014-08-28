<footer id="footer" class="cf">
    <div class="container">
        <div class="wrap-footer">
            <?php if ( is_single() ){ ?>
                <span class="icon-arrow-up" title="往上"></span>
            <?php } else { ?>
                <div class="more">
                    <?php echo get_next_posts_link('<span title="显示更多" class="icon-refresh"></span>'); ?>
                </div>
                <span class="icon-arrow-up" title="往上"></span>
            <?php } ?>
            <p class="cp">Made with <span class="heart"><3</span> in Theme <span class="mikan">Mikan</span></p>
        </div>
    </div>
</footer>
<!-- js files-->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js?ver=1.11.1"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.history.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/nprogress.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js?ver=1.0"></script>
<?php wp_footer(); ?>
</body>

</html>