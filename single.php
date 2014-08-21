<?php
/**
 * Created by PhpStorm.
 * User: akibarika
 * Date: 21/08/14
 * Time: 4:11 下午
 */
get_header(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="post-content post">
            <div class="post-heading">
                <h1><?php the_title(); ?></h1>
                <div class="post-date">
                    由<strong> <?php echo get_the_author_link(); ?> </strong>发布于 <?php the_time('Y/m/d') ?>
                </div>
            </div>

        </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>