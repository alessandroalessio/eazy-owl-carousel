<?php 

// Register Custom Post Type
function eazy_owl_carousel_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Carousel', 'Post Type General Name', 'eazy_owl_carousel' ),
		'singular_name'         => _x( 'Carousel', 'Post Type Singular Name', 'eazy_owl_carousel' ),
		'menu_name'             => __( 'Carousel', 'eazy_owl_carousel' ),
		'name_admin_bar'        => __( 'Carosel', 'eazy_owl_carousel' ),
		'archives'              => __( 'Item Archives', 'eazy_owl_carousel' ),
		'attributes'            => __( 'Item Attributes', 'eazy_owl_carousel' ),
		'parent_item_colon'     => __( 'Parent Item:', 'eazy_owl_carousel' ),
		'all_items'             => __( 'All Items', 'eazy_owl_carousel' ),
		'add_new_item'          => __( 'Add New Item', 'eazy_owl_carousel' ),
		'add_new'               => __( 'Add New', 'eazy_owl_carousel' ),
		'new_item'              => __( 'New Item', 'eazy_owl_carousel' ),
		'edit_item'             => __( 'Edit Item', 'eazy_owl_carousel' ),
		'update_item'           => __( 'Update Item', 'eazy_owl_carousel' ),
		'view_item'             => __( 'View Item', 'eazy_owl_carousel' ),
		'view_items'            => __( 'View Items', 'eazy_owl_carousel' ),
		'search_items'          => __( 'Search Item', 'eazy_owl_carousel' ),
		'not_found'             => __( 'Not found', 'eazy_owl_carousel' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'eazy_owl_carousel' ),
		'featured_image'        => __( 'Featured Image', 'eazy_owl_carousel' ),
		'set_featured_image'    => __( 'Set featured image', 'eazy_owl_carousel' ),
		'remove_featured_image' => __( 'Remove featured image', 'eazy_owl_carousel' ),
		'use_featured_image'    => __( 'Use as featured image', 'eazy_owl_carousel' ),
		'insert_into_item'      => __( 'Insert into item', 'eazy_owl_carousel' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'eazy_owl_carousel' ),
		'items_list'            => __( 'Items list', 'eazy_owl_carousel' ),
		'items_list_navigation' => __( 'Items list navigation', 'eazy_owl_carousel' ),
		'filter_items_list'     => __( 'Filter items list', 'eazy_owl_carousel' ),
	);
	$args = array(
		'label'                 => __( 'Carousel', 'eazy_owl_carousel' ),
		'description'           => __( 'Post Type for OWL Carousel', 'eazy_owl_carousel' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'eazy_owl_carousel', $args );

}
add_action( 'init', 'eazy_owl_carousel_custom_post_type', 0 );


// Register Custom Meta Boxes
function eazy_owl_carousel_metabox() {
    $prefix = 'eazyowl_';
    
    // Options
    $cmb = new_cmb2_box( array(
		'id'            => 'eazy_owl_carousel_opt_metabox',
		'title'         => __( 'Options', 'eazy_owl_carousel' ),
		'object_types'  => array( 'eazy_owl_carousel', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		'closed'        => true,
    ) );
    $cmb->add_field( array(
        'name'    => __('Items', 'eazy_owl_carousel'),
        'desc'    => __('Items displayed in Carousel', 'eazy_owl_carousel'),
        'default' => '3',
        'id'      => 'opt_items',
        'type'    => 'text_small',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        ),
    ) );
    $cmb->add_field( array(
        'name'    => __('Margin', 'eazy_owl_carousel'),
        'desc'    => __('Margin between items (in px)', 'eazy_owl_carousel'),
        'default' => '0',
        'id'      => 'opt_margin',
        'type'    => 'text_small',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        ),
    ) );
    $cmb->add_field( array(
        'name'    => __('Loop', 'eazy_owl_carousel'),
        'desc'    => __('Loop the carousel', 'eazy_owl_carousel'),
        'default' => 'false',
        'id'      => 'opt_loop',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'No', 'eazy_owl_carousel' ),
            'true'   => __( 'Yes', 'eazy_owl_carousel' ),
        ),
    ) );    
    $cmb->add_field( array(
        'name'    => __('Navigation', 'eazy_owl_carousel'),
        'desc'    => __('Enable arrow to move carousel', 'eazy_owl_carousel'),
        'default' => 'false',
        'id'      => 'opt_nav',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'No', 'eazy_owl_carousel' ),
            'true'   => __( 'Yes', 'eazy_owl_carousel' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => __('Dots', 'eazy_owl_carousel'),
        'desc'    => __('Display dots to navigation', 'eazy_owl_carousel'),
        'default' => 'false',
        'id'      => 'opt_dots',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'No', 'eazy_owl_carousel' ),
            'true'   => __( 'Yes', 'eazy_owl_carousel' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => __('Autoplay', 'eazy_owl_carousel'),
        'desc'    => __('Enable autostar for carousel', 'eazy_owl_carousel'),
        'default' => 'false',
        'id'      => 'opt_autoplay',
        'type'    => 'radio_inline',
        'options' => array(
            'false' => __( 'No', 'eazy_owl_carousel' ),
            'true'   => __( 'Yes', 'eazy_owl_carousel' ),
        ),
    ) );
    $cmb->add_field( array(
        'name'    => __('Autoplay Speed', 'eazy_owl_carousel'),
        'desc'    => __('Speed after slide', 'eazy_owl_carousel'),
        'default' => '3000',
        'id'      => 'opt_autoplaySpeed',
        'type'    => 'text_small',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        ),
    ) );

    // Box
    $cmb = new_cmb2_box( array(
		'id'            => 'eazy_owl_carousel_slide_metabox',
		'title'         => __( 'Slide', 'eazy_owl_carousel' ),
		'object_types'  => array( 'eazy_owl_carousel', ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		// 'closed'     => true, // Keep the metabox closed by default
    ) );
    $group = $cmb->add_field( array(
        'id'          => 'eazy_owl_carousel_repeat_group',
        'type'        => 'group',
        'description' => __( 'List of all slide', 'eazy_owl_carousel' ),
        'options'     => array(
            'group_title'   => __( 'Item {#}', 'eazy_owl_carousel' ),
            'add_button'    => __( 'Add Another Entry', 'eazy_owl_carousel' ),
            'remove_button' => __( 'Remove Entry', 'eazy_owl_carousel' ),
            'sortable'      => true,
        ),
    ) );
    $cmb->add_group_field( $group, array(
        'name' => __( 'Image', 'eazy_owl_carousel' ),
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => 'thumbnail', 
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
    ) );
    $cmb->add_group_field( $group, array(
        'name' => __('Title', 'eazy_owl_carousel' ),
        'id'   => 'title',
        'desc' => __('Title displayed in overlay (optional)', 'eazy_owl_carousel' ),
        'type' => 'text',
    ) );
    $cmb->add_group_field( $group, array(
        'name' => __('Description', 'eazy_owl_carousel' ),
        'id' => 'description',
        'desc' => __('Description displayed in overlay (optional)', 'eazy_owl_carousel' ),
        'type' => 'textarea_small'
    ) );
    $cmb->add_group_field( $group, array(
        'name' => __('CTA Url', 'eazy_owl_carousel' ),
        'id'   => 'cta_url',
        'desc' => __('Call to Action URL (optional)', 'eazy_owl_carousel' ),
        'type' => 'text',
    ) );
    $cmb->add_group_field( $group, array(
        'name' => __('CTA Label', 'eazy_owl_carousel' ),
        'id'   => 'cta_label',
        'desc' => __('Call to Action Label (optional)', 'eazy_owl_carousel' ),
        'type' => 'text',
    ) );
}
add_action( 'cmb2_admin_init', 'eazy_owl_carousel_metabox' );