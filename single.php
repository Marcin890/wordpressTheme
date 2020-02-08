<?php get_header(  ) ?>
<section class="content-area">

    <div class="container-fluid">
        <header class="post-header">
            <p class="post-category"><?php getPostCategories();?></p>
            <h2 class="post-title"><?php the_title(''); ?></h2>
            <p class="post-date"><?php echo get_the_date('D M j'); ?></p>
        </header>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
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
            <div class="col-md-3">
                <?php get_template_part( 'content/widget' )?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();?>