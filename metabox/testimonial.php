<?php

namespace AIOTestimonials\Metabox;

use AIOTestimonials\PostType\Testimonial;

class TestimonialDetailsMetaBox extends Metabox
{

    /**
     * List of post types to which the meta box is to be added
     * 
     * @var array
     */
    public $screen = array(
        'testimonial',
    );

    /**
     * Fields that the meta box is to contain
     * 
     * @var array
     */
    public $meta_fields = array(
        array(
            'label' => 'Clients Name',
            'id' => 'testimonial_client_name',
            'type' => 'text',
        ),

        array(
            'label' => 'Clients Email Address',
            'id' => 'testimonial_client_email',
            'type' => 'email',
        ),

        array(
            'label' => 'Clients Title / Company / Website',
            'id' => 'testimonial_client_title',
            'type' => 'text',
        ),

        array(
            'label' => 'Product / Service / Location',
            'id' => 'testimonial_product',
            'type' => 'text',
        ),

        array(
            'label' => 'Rating',
            'id' => 'testimonial_rating',
            'type' => 'number',
        ),

        array(
            'label' => 'Review',
            'id' => 'testimonial_review',
            'type' => 'wysiwyg',
        )

    );

    /**
     * Meta box title
     * 
     * @var string
     */
    public $meta_title = "Testimonial Details";

    /**
     * Meta security none name
     * 
     * @var string
     */
    public $meta_security = "Testimonial_Data";

    /**
     * Meta box description
     * 
     * @var string
     */
    public $meta_description = 'Enter the testimonial\'s details.';

    /**
     * New instance of the class
     * 
     * @return \AIOTestimonials\TestimonialDetailsMetaBox
     */
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save_fields'));
    }

}
