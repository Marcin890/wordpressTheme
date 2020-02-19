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
                    <?php get_template_part('content/author') ?>
                </div>
                <div class="comments-wrapper">
                    <?php comments_template(); ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <?php get_template_part( 'content/widget' )?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();?>