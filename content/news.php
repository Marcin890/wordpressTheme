<div class="col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>

        </div>
        <p class="post-category"><?php getPostCategories();?></p>
        <h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h2>
        <p class="post-date"><?php echo get_the_date('D M j'); ?></p>
        <p><?php the_excerpt_max_charlength(200); ?></p>
        <div class="btn-wrapper"><a class="btn-link" href="<?php the_permalink(); ?>">Continue Reading</a></div>
    </article>
</div>