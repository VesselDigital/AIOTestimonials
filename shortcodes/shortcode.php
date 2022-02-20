<?php

namespace AIOTestimonials\Shortcodes;

class Shortcode
{

    /**
     * Can this shortcode tag be changed?
     * 
     * @var boolean
     */
    protected $user_editable = false;

    /**
     * Shortcode arguments
     * 
     * @var array
     */
    public $args = [];

    /**
     * New instance of the class
     * 
     * @return \AIOTestimonials\Shortcodes\Shortcode
     */
    public function __construct()
    {
        $this->register_shortcode();
    }
    
    /**
     * Register shortcode within WordPress
     * 
     * @return void
     */
    private function register_shortcode() {
        if($this->user_editable) {
            $this->shortcode = get_option('testimonial_shortcode_' . $this->shortcode, $this->shortcode);
        }

        add_shortcode($this->shortcode, array($this, 'handle_shortcode'));
    }



    /**
     * Handle shortcode
     * 
     * @param  array $atts
     * @return void
     */
    public function handle_shortcode($atts) {
        $this->args = $atts;

        $style = "simple";
        if(isset($atts["theme"])) {
            $style = $atts["theme"];
        }

        $this->load_styles($style);
        return $this->render();
    }

    /**
     * Fetch testimonial
     * 
     * @param int $id
     * @param array $args
     * @param bool $as_wp_post
     * @return \AIOTestimonials\Classes\Testimonial|\WP_Post|boolean
     */
    protected function single_testimonial($id, $args = [], $as_wp_post = false) {
        $default_args = array(
            'post_type' => 'testimonial',
            'post_status' => 'publish',
            'p' => $id
        );
        $query_args = array_merge($default_args, $args);

        $query = new \WP_Query($query_args);
        if(!$query->have_posts()) {
            return false;
        }
        if($as_wp_post) {
            return $query->posts[0];
        } else {
            return new \AIOTestimonials\Classes\Testimonial($query->posts[0]);
        }
    }

    /**
     * Fetch testimonials
     * 
     * @param array $args
     * @return \AIOTestimonials\Classes\TestimonialQuery
     */
    protected function get_testimonials($args = []) {
        $default_args = array(
            'post_status' => 'publish',
        );

        if(isset($args["orderby"]) && $args["orderby"] == "rating") {
            $args["meta_key"] = "testimonial_rating";
            $args["orderby"] = "meta_value_num";
        }

        $query_args = array_merge($default_args, $args);

        $query = new \AIOTestimonials\Classes\TestimonialQuery($query_args);       
        return $query;
    }

    /**
     * Build the render settings array
     * 
     * @return array
     */
    protected function get_render_settings() {
        /**
         * Valid render settings:
         * 
         * show_image
         * show_title
         * show_client_name
         * show_client_title
         * show_client_email
         * show_product
         * show_rating_as_stars
         * show_date
         */

        $render_settings = [];
        if(isset($this->args["show_image"])) {
            $render_settings["show_image"] = $this->args["show_image"];
        }
        if(isset($this->args["show_title"])) {
            $render_settings["show_title"] = $this->args["show_title"];
        }
        if(isset($this->args["show_client_name"])) {
            $render_settings["show_client_name"] = $this->args["show_client_name"];
        }
        if(isset($this->args["show_client_title"])) {
            $render_settings["show_client_title"] = $this->args["show_client_title"];
        }
        if(isset($this->args["show_client_email"])) {
            $render_settings["show_client_email"] = $this->args["show_client_email"];
        }
        if(isset($this->args["show_product"])) {
            $render_settings["show_product"] = $this->args["show_product"];
        }
        if(isset($this->args["show_rating_as_stars"])) {
            $render_settings["show_rating_as_stars"] = $this->args["show_rating_as_stars"];
        }
        if(isset($this->args["show_date"])) {
            $render_settings["show_date"] = $this->args["show_date"];
        }

        return $render_settings;
    }

    /**
     * Load in the styles required
     * 
     * @param string $theme
     * @return void
     */
    protected function load_styles($theme = "simple") {
        if($theme != "custom") {
            wp_enqueue_style( 'dashicons' ); 
        }
        switch($theme) {
            case "simple":
                wp_enqueue_style("aiotestimonials-testimonial-simple");
                break;
            default:
                break;
        }
    }

    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render() {
        return '';
    }

}
