<footer>
    <div class="container">
        <div class="wrap-footer">
            <?php if ( is_home() ) {  ?>

            <?php echo get_next_posts_link('<span class="icon-refresh"></span>'); ?>
            <span class="icon-up"></span>
            <?php } elseif ( is_single() ){ ?>
            <span class="icon-dir to-left"></span>
            <span class="icon-up"></span>
            <span class="icon-dir to-right"></span>
            <?php } ?>
            <p class="cp">Made with <span class="heart"><3</span> in Theme <span class="mikan">Mikan</span></p>
        </div>
    </div>
</footer>
<!-- js files-->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.history.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/nprogress.js"></script>
</body>

</html>