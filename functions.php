<?php 
//-----  BOOTSTRAP
// Bootstrap JS
function bootstrap_enqueue_scripts() {
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ) );
  }
  add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_scripts');

//-----  ADDITIONAL
// Theme URL
if(!defined('BIESZCZADY_URL')) {
	define('BIESZCZADY_URL', WP_CONTENT_URL.'/themes/'.get_template().'/');
}



// Clip text
function the_excerpt_max_charlength($charlength) {
    echo cutText(get_the_excerpt(), $charlength);
}
function cutText($text, $maxLength){    
    $maxLength++;
    $return = '';
    if (mb_strlen($text) > $maxLength) {
        $subex = mb_substr($text, 0, $maxLength - 5);
        $exwords = explode(' ', $subex);
        $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
        if ($excut < 0) {
            $return = mb_substr($subex, 0, $excut);
        } else {
            $return = $subex;
        }
        $return .= '[...]';
    } else {
        $return = $text;
    }    
    return $return;
}

// Get current Year
function currentYear(){
    return date('Y');
}

//------ IMAGE SIZE
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 415, 114 );

add_image_size( 'small', 270, 180, true );
add_image_size( 'medium', 530, 350, true );
add_image_size( 'large', 840, 560, true );

//----- POSTS
// Register post type
function create_posttype() { 
    register_post_type( 'cities',  
        array(
            'labels' => array(
                'name' => 'Miasta',
                'singular_name' => 'Miasto',
                'all_items' => 'Wszystkie miasta',
                'add_new' => 'Dodaj nowe miasto',
                'add_new_item' => 'Dodaj nowe miasto',
                'edit_item' => 'Edytuj miasto',
                'new_item' => 'Nowe miasto',
                'view_item' => 'Zobacz miasto',
                'search_items' => 'Szukaj miasta',
                'not_found' =>  'Nie znaleziono żadnych miast',
                'not_found_in_trash' => 'Nie znaleziono żadnych miast w koszu', 
                'parent_item_colon' => ''
            ),
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,            
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'rewrite' => array('slug' => 'cities'),
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields', 'post-formats'
            )
        )
    );
}
add_action( 'init', 'create_posttype' );


// Register Taxonomies
function bieszczady_init_taxonomies(){
        
    register_taxonomy(
        'gmina',
        array('cities'),
        array(
            'hierarchical' => false,
            'labels' => array(
                'name' => 'Gminy',
                'singular_name' => 'Gmina',
                'search_items' =>  'Wyszukaj gminy',
                'popular_items' => 'Najpopularniejsze gminy',
                'all_items' => 'Wszystkie gminy',
                'most_used_items' => null,
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => 'Edytuj gminę', 
                'update_item' => 'Aktualizuj gminę',
                'add_new_item' => 'Dodaj nową gminę',
                'new_item_name' => 'Nazwa nowej gminy',
                'separate_items_with_commas' => 'Oddziel gminy przecinkiem',
                'add_or_remove_items' => 'Dodaj lub usuń gminy',
                'choose_from_most_used' => 'Wybierz spośród najczęścież używanych gmin',
                'menu_name' => 'Gmina',
            ),
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count', 
            'query_var' => true,
            'rewrite' => array('slug' => 'division' )
    ));
}
add_action('init', 'bieszczady_init_taxonomies');

// Get categories
function getPostCategories() {
    $categories = get_the_category();
    foreach( $categories as $category) {
        $name = $category->name;
        $category_link = get_category_link( $category->term_id );
        echo "<a href='$category_link'>
            <span class=" . esc_attr( $name) . ">$name</span>
         </a>";
        }    
    }

// Get tags
function getTags() {
    $tag_list = get_the_tag_list( '<ul class="tag-list"><li>', '</li><li>', '</li></ul>' );
 
    if ( $tag_list && ! is_wp_error( $tag_list ) ) {
        echo $tag_list;
    }
}


//----- SIEDBAR
// Register sidebar
function bieszczady_widgets_init() {	
    $sidebar_right = array(
			'name'          => __( 'Main', 'bieszczady' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
    );
    $sidebar_footer = array(
        'name'          => __( 'Footer', 'bieszczady' ),
        'id'            => 'footer',
        'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
);	
    register_sidebar($sidebar_right);
    register_sidebar($sidebar_footer);
}
add_action( 'widgets_init', 'bieszczady_widgets_init' );


//-----  NAVIGATION
// Post pagination
function bieszczady_the_posts_navigation() {
    the_posts_pagination( array(
        'screen_reader_text' => ' ',
        'mid_size'  => 2,
        'prev_text' => __( '<', ('Nowe') ),
        'next_text' => __( '>', ('Stare') ),
    ) );
}

// Register menu
register_nav_menus(
array(
            'menu-1' => __( 'Primary', 'bieszczady' ),
            'footer' => __( 'Footer Menu', 'bieszczady' ),
            'social' => __( 'Social Links Menu', 'bieszczady' ),
    )
    );

// Walker Menu
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

//   Main menu
function bieszczady_menu() {
    wp_nav_menu( array(
        'theme_location'    => 'menu-1',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    ) );
}

// Footer menu
function footer_menu() {
    wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'menu_class'     => 'footer-menu',
            'depth'          => 1,
        )
    );
}

// Comments
function bieszczady_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    
    $tag = $args['style'];
?>
	<!-- Echo tag define in style in comments.php(div) -->
	<!-- Add class parent when post has child -->
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="li-comment-<?php comment_ID() ?>">
        <!-- Single comment -->
        <div id="div-comment-<?php comment_ID(); ?>" class="inner">
            <!-- Get avatar -->
           
                          
            <div class="comments-meta">
                <div class="comments-avatar"><?php echo get_avatar($comment, $args[avatar_size]); ?> </div>
                <p class="comments-author"><?php echo get_comment_author_link(); ?>
                    <span class="comments-time">
                    <?php echo get_comment_date() . ' ' . get_comment_time() ?>
                    </span>   
                </p>    
                
                <p class="comments-answear"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                      
                
                
            </div>
            <?php comment_text(); ?>
            <!-- check if the comment is modified-->
            <?php if($comment->comment_approved == '0') : ?>
                <div class="comment-awaiting-moderation">Twój komentarz oczekuje na moderację!</div>
            <?php endif; ?>
        </div>
<?php
}


?>