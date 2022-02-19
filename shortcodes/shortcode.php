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
     * @return \AIOTestimonials\Classes\Testimonial|\WP_Post
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
                wp_enqueue_style("aiotestimonials-testimonial-simple", AIO_TESTIMONIALS_URL . "assets/css/style-simple.css");
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
