<div class="col-sm-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class('cities-wrapper'); ?>>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>

        </div>

        <div class="post-info">
            <p class="post-category text-white"><?php getPostCategories();?></p>
            <h3 class="post-title"><a class="post-link text-white"
                    href="<?php the_permalink() ?>"><?php the_title(''); ?></a>
            </h3>
            <p class="post-date text-white"><?php echo get_the_date('D M j'); ?></p>
        </div>
    </article>
</div>