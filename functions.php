<?php
define( "THEME_DIR", get_template_directory_uri() );

function my_enqueue_scripts() {

	/** REGISTER HTML5 - SHIM/SHIV **/
	wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1.0', false );
	wp_enqueue_script( 'html5-shim' );

	/** Andra script om du vill ha! **/
	wp_register_script( 'fixed_menu', get_template_directory_uri() . '/js/fixed_menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'fixed_menu' );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

register_nav_menu( 'primary', 'Primary Menu' );

function my_css_attributes_filter( $var ) {
	if ( in_array( 'current-menu-item', $var ) )
		$var[] = 'active';

	return $var;
}
add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 );

/** Custom Post Types **/

if( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
	add_image_size( 'screen-shot', 720, 540 ); // Full Size Screen

}

add_action( 'init', 'portfolio_register' );

function portfolio_register() {

	$args = array(
		'label'              => __( 'Portfolio' ),
		'singular_label'     => __( 'Project' ),
		'public'             => true,
		'show_ui'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'rewrite'            => true,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	); 

	register_post_type( 'Portfolio', $args );
}

register_taxonomy( 'project-type', array('portfolio'), array( 
	'hierarchical'   => true,
	'label'          => 'Project Types',
	'singular_label' => 'Project Type',
	'rewrite'        => true )
);

add_action(	'admin_init', 'portfolio_meta_box' );
function portfolio_meta_box() {

	add_meta_box( 'projInfo-meta', 'Project Options', 'portfolio_meta_options', 'portfolio', 'side', 'low' );

}

function portfolio_meta_options() {

	global $post;
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom = get_post_custom($post->ID);
	$link = $custom['projLink'][0];
?>
	<label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />
<?php 
}

add_action( 'save_post', 'save_project_link' );

function save_project_link() {
	global $post;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return $post_id;
	}else{
		update_post_meta( $post->ID, 'projLink', $_POST['projLink']);
	}
}

add_filter( 'manage_edit-portfolio_columns', 'project_edit_columns');

function project_edit_columns( $columns ) {
	$columns = array(
		'cb' => '</input type="checkbox" />',
		'title' => 'Project',
		'description' => 'Description',
		'link' => 'Link',
		'type' => 'Type of Project',
	);

	return $columns;

}

add_action( 'manage_posts_custom_column', 'project_custom_columns' );

function project_custom_columns( $column ) {
	global $post;
	switch ($column){
		case 'description':
			the_excerpt();
			break;
		case 'link':
			$custom = get_post_custom();
			echo $custom['projLink'][0];
			break;
		case 'type':
			echo get_the_term_list($post->ID, 'project-type', '', ', ', '');
	}
}