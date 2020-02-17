<?php get_header(  ) ?>
<section class="content-area">
    <div class="container-fluid">
        <header class="post-header">        
            <h2 class="post-title"><?php the_title(''); ?></h2> 
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
            </div>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <?php get_template_part( 'content/widget' )?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>