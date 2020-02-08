<?php get_header(  ) ?>
<section class="content-area">

    <div class="container-fluid">

    </div>

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
                    <div class="author-bio">

                        <h2 class="author-title">
                            <?php echo get_the_author() ?>
                        </h2>

                        <p class="author-description">
                            <?php the_author_meta( 'description' ); ?>
                            <a class="author-link"
                                href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                                rel="authorr">Więcej postów
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cities-card">
                    <h2 class="post-title"><?php the_title(''); ?></h2>
                    <div class="post-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <ul class="cities-stats">
                        <li>Liczba ludności: <?php echo get_post_meta($post->ID, 'population', true); ?></li>
                        <li>Kod pocztowy: <?php echo get_post_meta($post->ID, 'zip-code', true); ?></li>
                        <li>Wysokość: <?php echo get_post_meta($post->ID, 'altitude', true); ?></li>
                    </ul>
                </div>


                <!-- <ul><?php echo get_the_term_list( $post->ID, 'gmina', '<li class="jobs_item">', ', ', '</li>' ) ?>
                </ul> -->
            </div>
        </div>
    </div>
</section>

<?php
get_footer();?>