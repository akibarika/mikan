<?php
/**
 * Created by PhpStorm.
 * User: Akiba
 * Date: 14-8-21
 * Time: 下午11:10
 */

//adding menu selecting support
add_theme_support( 'menus' );
if( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(array('menu' => 'Menu'));
}

function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    global $commentcount;
    if(!$commentcount) {
        $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage')-1 : get_page_of_comment( $comment->comment_ID, $args )-1;
        $cpp=get_option('comments_per_page');
        $commentcount = $cpp * $page;
    }

    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>" <?php if( $depth > 1){ echo 'style="margin-left:35px;"';} ?>>
        <div id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-author"><?php echo get_avatar( $comment, $size = '34'); ?></div>
            <div class="comment-head">
                <span class="name"><?php printf(__('%s'), get_comment_author_link()) ?></span>
                <div class="date"><?php printf(__('%1$s %2$s'), get_comment_date('F j, Y'),  get_comment_time('H:i:G')) ?> <?php if(!$parent_id = $comment->comment_parent) {printf('#%1$s', ++$commentcount);} ?></div>
            </div>
            <div class="comment-entry">
                <div class="comment-text"><?php comment_text() ?>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.') ?></em>
                        <br />
                    <?php endif; ?>
                </div>
                <div class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('回复')))) ?></div>
            </div>
        </div>
    </li>
<?php } ?>
