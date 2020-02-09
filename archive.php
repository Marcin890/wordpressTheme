<?php get_header(); ?>
<section class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="archive-section">
                    <div class="container">
                        <div class="row">
                            <?php
                                if ( have_posts() ) {
                                    while ( have_posts() ) :  the_post();
                                        get_template_part('content/featured');
                                    endwhile; 
                                    bieszczady_the_posts_navigation();
                                } else {
                                    get_template_part('content/content-none');
                                } 
                            ?>
                        </div>
                    </div>
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
<?php get_footer(); ?>