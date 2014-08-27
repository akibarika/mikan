<?php
/**
 * Created by PhpStorm.
 * User: Akiba
 * Date: 14-8-24
 * Time: 上午1:52
 */
if ( post_password_required() ) : ?>
    <?php _e( 'Enter your password to view comments.' ); ?>
    <?php return; endif; ?>
<div id="comments">
    <div class="commentscount">
        <h3><?php comments_number( '0', '1', '%' ); ?> Comments</h3>
    </div>
    <div class="comt">
<?php if ( have_comments() ) : ?>
    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=mytheme_comment&max_depth=10000'); ?>
    </ol>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <div class="navigation cf">
            <span class="left"><?php previous_comments_link( __( '&laquo; Older Comments' ) ); ?></span>
            <span class="right"><?php next_comments_link( __( 'Newer Comments &raquo;' ) ); ?></span>
        </div>
    <?php endif; ?>
<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p><?php _e( 'Comments are closed.' ); ?></p>
<?php endif; ?>
<?php
$args =  array(
    'comment_field'=> '<textarea id="comment" name="comment" cols="45" rows="8"></textarea>',
    'label_submit'=> '确 认 提 交 / Ctrl + Enter',
);
comment_form($args);
?>