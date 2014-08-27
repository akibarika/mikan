<?php
/**
 * Created by PhpStorm.
 * User: akibarika
 * Date: 27/08/14
 * Time: 7:30 下午
 */
get_header(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="post-content post">
            <div class="post-heading">
                <h1><?php the_title(); ?></h1>
                <div class="post-date">
                    由<strong> <?php echo get_the_author_link(); ?> </strong>发布与 <?php the_time('Y/m/d') ?>
                </div>
            </div>
            <div class="post-detail">
                <?php the_content(); ?>
                <div class="copyright">
                    <p>Contents licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">cc-by-4.0</a></p>
                </div>
            </div>
            <div class="single-share">
                <a href="http://service.weibo.com/share/share.php?url=<?php the_permalink() ?>&appkey=&title=<?php the_title(); ?>&pic=&ralateUid=&language=zh_cn" onclick="window.open(this.href, 'weibo-share', 'width=550,height=235');return false;"><span class="icon-sina-weibo"></span></a>
                <a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink() ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;"><span class="icon-twitter"></span></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="window.open(this.href, 'facebook-share', 'width=550,height=235');return false;"><span class="icon-facebook"></span></a>
                <a href="https://plus.google.com/share?url=<?php the_permalink() ?>" onclick="window.open(this.href, 'google-plus-share', 'width=550,height=235');return false;"><span class="icon-googleplus"></span></a>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>