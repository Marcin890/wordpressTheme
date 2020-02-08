<?php 

// Enable support for Post Thumbnails on posts and pages.
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 415, 114 );


// Our custom post type function
function create_posttype() {
 
    register_post_type( 'cities',
    // CPT Options
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
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



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

    // Register menu
    register_nav_menus(
        array(
            'menu-1' => __( 'primary', 'bieszczady' ),
            'footer' => __( 'Footer Menu', 'bieszczady' ),
            'social' => __( 'Social Links Menu', 'bieszczady' ),
        )
    );

// Walker Menu
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// Current Year
function currentYear(){
    return date('Y');
}

// Register sidebar

function bieszczady_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Main', 'bieszczady' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'bieszczady_widgets_init' );

// Taxonomies
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


// Post pagination
function bieszczady_the_posts_navigation() {
    the_posts_pagination( array(
        'screen_reader_text' => ' ',
        'mid_size'  => 2,
        'prev_text' => __( '<', ('Nowe') ),
        'next_text' => __( '>', ('Stare') ),
    ) );
}

// Bootstrap JS
function bootstrap_enqueue_scripts() {
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array( 'jquery' ) );
  }
  add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_scripts');

?>