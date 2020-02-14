<?php get_header(  ) ?>
<section class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php                     
                         while ( have_posts() ) :
                          the_post();
                          the_content();
                         endwhile;                     
                         ?>
                    </div>
                </article>
                <div class="tags">
                    <?php echo getTags() ?>
                </div>
                <div class="author-wrapper">
                    <?php get_template_part('content/author') ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cities-card">
                    <h2 class="post-title"><?php the_title(''); ?></h2>
                    <div class="post-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <ul class="cities-stats">
                        <li><strong>Liczba ludności:</strong>
                            <?php echo get_post_meta($post->ID, 'population', true); ?></li>
                        <li><strong>Kod pocztowy:</strong> <?php echo get_post_meta($post->ID, 'zip-code', true); ?>
                        </li>
                        <li><strong>Wysokość:</strong> <?php echo get_post_meta($post->ID, 'altitude', true); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();?>