<?php get_header(); ?>
<!-- content-area -->
<section class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- featured-section -->
                <section class="news-section">
                    <div class="container">
                        <div class="row">
                            <?php 
                                $args = array(  
                                    'post_type' => 'post',
                                    'posts_per_page' => 1  
                                );

                                $loop = new WP_Query( $args ); 
		                        if ( have_posts() ) {
			                    while ( $loop->have_posts() ) {
                                    $loop->the_post();
                                    $do_not_duplicate = $post->ID;
			                    	 get_template_part('content/featured');}
		                        } else {
                                    get_template_part('content/content-none');
                                 }  
                                  ?>
                        </div>
                    </div>
                </section>
                <!-- END featured-section -->
                <!-- news-section -->
                <section class="news-section">
                    <div class="container">
                        <div class="row">
                            <?php 
                                $args = array(  
                                    'post_type' => 'post',
                                    'posts_per_page' => 5  
                                );

                                $loop = new WP_Query( $args ); 
		                        if ( have_posts() ) {
			                    while ( $loop->have_posts() ) {
                                    $loop->the_post();
                                    if( $post->ID == $do_not_duplicate ) continue;
			                    	 get_template_part('content/news');}
		                        } else { 
                                    get_template_part('content/content-none');
                                }  
                                  ?>
                        </div>
                    </div>
                </section>
                <!-- END of news-section -->

                <!-- cities-section -->
                <section class="cities-section">
                    <div class="container">
                        <div class="row">
                            <?php 
                                $args = array(  
                                    'post_type' => 'cities',
                                    'posts_per_page' => 3  
                                );

                                $loop = new WP_Query( $args ); 
		                        if ( have_posts() ) {
			                    while ( $loop->have_posts() ) {
                                    $loop->the_post();
                                    if( $post->ID == $do_not_duplicate ) continue;
			                    	 get_template_part('content/cities');}
		                        } else {
                                    get_template_part('content/content-none');
                                 }  
                                  ?>
                        </div>
                    </div>
                </section>
                <!-- END of news-section -->
            </div>
            <!-- Sidebar -->
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'footer' ) ) : ?>
                <?php get_template_part( 'content/widget' )?>
                <?php endif; ?>
            </div>
            <!-- END Sidebar -->
        </div>
    </div>
</section>
<!-- END content-area -->
<?php get_footer(); ?>