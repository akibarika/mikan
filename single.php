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
                    由<strong> <?php echo get_the_author_link(); ?> </strong>发布在 <?php the_category(' '); ?>
                </div>
            </div>
            <div class="post-detail cf">
                <?php the_content(); ?>
                <div class="copyright">
                    <p>Transshipment is forbidden</p>
                    <p>本站文章禁止转载</p>
                </div>
            </div>
            <div class="single-tags">
                <?php the_tags(' ',' '); ?>
            </div>

        </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>