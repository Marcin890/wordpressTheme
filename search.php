<?php get_header(); ?>

<section class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="archive-section">
                    <div class="container">
                        <div class="row">

                            <?php while ( have_posts() ) :  the_post();
                                get_template_part('content/featured');


                            endwhile;
                            
                         ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"><?php get_template_part( 'content/widget' )?></div>
        </div>
        <?php  bieszczady_the_posts_navigation() ?>
    </div>
</section>


<?php get_footer(); ?>