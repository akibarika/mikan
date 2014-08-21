<?php

get_header(); ?>
                <div class="post-list">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="post-item post">
                        <a href="<?php the_permalink() ?>" title="点击阅读: <?php the_title(); ?>"><h4 class="post-title"><?php the_title(); ?></h4><time>发布于 <?php the_time('Y/m/d') ?></time></a>
                    </article>
                <?php  endwhile; else : ?>
                    <article class="post-item">
                        <h4 class="post-title">这里什么都没有哦！</h4>
                    </article>
                <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php get_footer(); ?>