<footer id="footer">
    <div class="container">
        <div class="wrap-footer">
            <?php if ( is_single() ){ ?>
            <span class="icon-dir to-left"></span>
            <span class="icon-up"></span>
            <span class="icon-dir to-right"></span>
            <?php } else { ?>
             <div class="more">
            <?php echo get_next_posts_link('<span title="显示更多" class="icon-refresh"></span>'); ?></div>
            <span class="icon-up"></span>
            <?php } ?>
            <p class="cp">Made with <span class="heart"><3</span> in Theme <span class="mikan">Mikan</span></p>
        </div>
    </div>
</footer>
<!-- js files-->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.history.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/nprogress.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments-ajax.js"></script>

</body>

</html>