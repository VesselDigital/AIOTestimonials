<?php

namespace AIOTestimonials\PostTypes;

class Testimonial
{

    /**
     * Init the testimonial post type
     */
    function __construct()
    {
        //
    }

    /**
     * Register the post type
     * 
     * @return void
     */
    public static function register_post_type()
    {
        $labels = array(
            'name'                  => _x( 'Testimonials', 'Post Type General Name', 'testimonial' ),
            'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'testimonial' ),
            'menu_name'             => __( 'AIO Testimonials', 'testimonial' ),
            'name_admin_bar'        => __( 'Testimonial', 'testimonial' ),
            'archives'              => __( 'Testimonial Archives', 'testimonial' ),
            'attributes'            => __( 'Testimonial Attributes', 'testimonial' ),
            'parent_item_colon'     => __( 'Parent:', 'testimonial' ),
            'all_items'             => __( 'All Testimonials', 'testimonial' ),
            'add_new_item'          => __( 'New Testimonial', 'testimonial' ),
            'add_new'               => __( 'New Testimonial', 'testimonial' ),
            'new_item'              => __( 'New Testimonial', 'testimonial' ),
            'edit_item'             => __( 'Edit Testimonial', 'testimonial' ),
            'update_item'           => __( 'Update Testimonial', 'testimonial' ),
            'view_item'             => __( 'View Testimonial', 'testimonial' ),
            'view_items'            => __( 'View Testimonials', 'testimonial' ),
            'search_items'          => __( 'Search Testimonial', 'testimonial' ),
            'not_found'             => __( 'Not found', 'testimonial' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'testimonial' ),
            'featured_image'        => __( 'Testimonial Image', 'testimonial' ),
            'set_featured_image'    => __( 'Set testimonial image', 'testimonial' ),
            'remove_featured_image' => __( 'Remove testimonial image', 'testimonial' ),
            'use_featured_image'    => __( 'Use as testimonial image', 'testimonial' ),
            'insert_into_item'      => __( 'Insert into testimonial', 'testimonial' ),
            'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'testimonial' ),
            'items_list'            => __( 'Testimonials list', 'testimonial' ),
            'items_list_navigation' => __( 'Testimonials list navigation', 'testimonial' ),
            'filter_items_list'     => __( 'Filter testimonials list', 'testimonial' ),
        );
        $args = array(
            'label'                 => __( 'Testimonial', 'testimonial' ),
            'description'           => __( 'A testimonial / review left by a client', 'testimonial' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'thumbnail' ),
            'taxonomies'            => array( 'testimonial_category' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-testimonial',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'testimonial', $args );
    }

    /**
     * Register post type custom category
     * 
     * @return void
     */
    public static function register_category_taxonomy()
    {
        $labels = array(
            'name'                       => _x( 'Testimonial Categories', 'Taxonomy General Name', 'testimonial_category' ),
            'singular_name'              => _x( 'Testimonial Category', 'Taxonomy Singular Name', 'testimonial_category' ),
            'menu_name'                  => __( 'Categories', 'testimonial_category' ),
            'all_items'                  => __( 'All Categories', 'testimonial_category' ),
            'parent_item'                => __( 'Parent Category', 'testimonial_category' ),
            'parent_item_colon'          => __( 'Parent Category:', 'testimonial_category' ),
            'new_item_name'              => __( 'Category Name', 'testimonial_category' ),
            'add_new_item'               => __( 'Add Category', 'testimonial_category' ),
            'edit_item'                  => __( 'Edit Category', 'testimonial_category' ),
            'update_item'                => __( 'Update Category', 'testimonial_category' ),
            'view_item'                  => __( 'View Category', 'testimonial_category' ),
            'separate_items_with_commas' => __( 'Separate categories with commas', 'testimonial_category' ),
            'add_or_remove_items'        => __( 'Add or remove categories', 'testimonial_category' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'testimonial_category' ),
            'popular_items'              => __( 'Popular Categories', 'testimonial_category' ),
            'search_items'               => __( 'Search Categories', 'testimonial_category' ),
            'not_found'                  => __( 'Not Found', 'testimonial_category' ),
            'no_terms'                   => __( 'No categories', 'testimonial_category' ),
            'items_list'                 => __( 'Categories list', 'testimonial_category' ),
            'items_list_navigation'      => __( 'Categories list navigation', 'testimonial_category' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'testimonial_category', array( 'testimonial' ), $args );
    }
}
