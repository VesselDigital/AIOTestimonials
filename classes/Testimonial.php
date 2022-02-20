<?php
namespace AIOTestimonials\Classes;
/**
 * Testimonial Post Type
 */

class Testimonial
{

    /**
     * Testimonial Post
     * 
     * @var \WP_Post
     */
    protected $post;

    /**
     * Testimonial title
     * 
     * @var string
     */
    public $title;

    /**
     * Client's Name
     * 
     * @var string
     */
    public $client_name;

    /**
     * Client's Email Address
     * 
     * @var string
     */
    public $client_email;

    /**
     * Client's Title / Company / Website
     * 
     * @var string
     */
    public $client_title;

    /**
     * Product / Service / Location reviewed
     * 
     * @var string
     */
    public $product;

    /**
     * Testimonial Rating
     * 
     * @var int
     */
    public $rating;

    /**
     * Testimonial Content
     * 
     * @var string
     */
    public $content;

    /**
     * Render settings
     * 
     * @var array
     */
    public $render_settings = [
        "show_image" => true,
        "show_title" => true,
        "show_client_name" => true,
        "show_client_title" => true,
        "show_client_email" => true,
        "show_product" => true,
        "show_date" => true,
        "show_rating_as_stars" => true,
    ];

    /**
     * New Testimonial Instance
     * 
     * @param \WP_Post $post
     * @param array $render_settings
     * 
     * @return \AIOTestimonials\Classes\Testimonial
     */
    function __construct(\WP_Post $post, array $render_settings = []){
        $this->render_settings = array_merge($this->render_settings, $render_settings);
        $this->post = $post;

        $this->title = $this->post->post_title;

        $this->client_name = get_post_meta($this->post->ID, 'testimonial_client_name', true);
        $this->client_email = get_post_meta($this->post->ID, 'testimonial_client_email', true);
        $this->client_title = get_post_meta($this->post->ID, 'testimonial_client_title', true);
        $this->product = get_post_meta($this->post->ID, 'testimonial_product', true);
        $this->rating = get_post_meta($this->post->ID, 'testimonial_rating', true);
        $this->content = get_post_meta($this->post->ID, 'testimonial_review', true);
    }


    /**
     * Get Testimonial Post
     * 
     * @return \WP_Post
     */
    public function get_post()
    {
        return $this->post;
    }

    /**
     * Get Testimonial Title
     * 
     * @return string
     */
    public function get_title()
    {
        return $this->title;
    }

    /**
     * Get Client's Name
     * 
     * @return string
     */
    public function get_client_name()
    {
        return $this->client_name;
    }

    /**
     * Get Client's Email Address
     * 
     * @return string
     */
    public function get_client_email()
    {
        return $this->client_email;
    }

    /**
     * Get the client's gravatar
     * 
     * @param int $size
     * @return string
     */
    public function get_client_gravatar(int $size = 250)
    {

        $avatar_id = "00000000000000000000000000000000";
        if($this->get_client_email()) {
            $avatar_id = md5(strtolower(trim($this->get_client_email())));
        }
        return "https://www.gravatar.com/avatar/" . $avatar_id . "?s=" . $size;

    }

    /**
     * Get Client's Title / Company / Website
     * 
     * @return string
     */
    public function get_client_title()
    {
        return $this->client_title;
    }

    /**
     * Get Product / Service / Location reviewed
     * 
     * @return string
     */
    public function get_product()
    {
        return $this->product;
    }

    /**
     * Get Testimonial Rating
     * 
     * @return int
     */
    public function get_rating()
    {
        return $this->rating;
    }

    /**
     * Get Testimonial rating as stars
     * 
     * @param bool $echo
     * @return void
     */
    public function get_rating_as_stars(bool $echo = false) {
        $rating = $this->get_rating();

        $stars = '<div class="aiotestimonials-rating">';
        // Fill in the stars
        for($i = 0; $i < $rating; $i++) {
            $stars .= '<span class="dashicons dashicons-star-filled"></span>';
        }
        // Fill in the rest of the stars
        for($x = 0; $x < (5 - $rating); $x++) {
            $stars .= '<span class="dashicons dashicons-star-empty"></span>';
        }
        $stars .= '</div>';

        if($echo) {
            echo $stars;
        } else {
            return $stars;
        }
    }

    /**
     * Get Testimonial Content
     * 
     * @return string
     */
    public function get_content()
    {
        return $this->content;
    }

    /**
     * Get publish date
     * 
     * @return \DateTime
     */
    public function get_publish_date()
    {
        return new \DateTime($this->post->post_date);
    }

    /**
     * Get Testimonial Schema JSON
     * 
     * @param bool $echo
     * @return string
     */
    public function get_ld_json(bool $echo = false)
    {

        $json = [
            "@context" => "http://schema.org",
            "@type" => "Review",
            "itemReviewed" => [
                "@type" => "Organization",
                "name" => $this->get_product()
            ],
            "author" => [
                "@type" => "Person",
                "name" => $this->get_client_name()
            ],
            "reviewRating" => [
                "@type" => "Rating",
                "ratingValue" => $this->get_rating(),
                "bestRating" => 5,
                "worstRating" => 0
            ],
            "name" => $this->get_title(),
            "reviewBody" => $this->get_content()
        ];

        if($echo) {
            echo json_encode($json);
        } else {
            return json_encode($json);
        }
    }

    /**
     * Set the render settings
     * 
     * @param array $render_settings
     * @return \AIOTestimonials\Classes\Testimonial
     */
    public function set_render_settings(array $render_settings)
    {
        $this->render_settings = array_merge($this->render_settings, $render_settings);
        return $this;
    }

    /**
     * Render the single testimonial
     * 
     * @param bool $echo
     * @param bool $include_json
     * @return string|void
     */
    public function render(bool $echo = false, bool $include_json = true) {

        // Check if the current theme has a template for this shortcode.
        $template = locate_template("shortcodes/single-testimonial.php");
        if(!$template) {
            $template = AIO_TESTIMONIALS_PATH . "templates/shortcodes/single-testimonial.php";
        }
        
        
        ob_start();
        if($include_json) {
            $output = '<script type="application/ld+json">' . $this->get_ld_json() . '</script>';
        }
        $testimonial = $this;
        include $template;
        $output .= ob_get_clean();
        unset($testimonial);
        
        if($echo) {
            echo $output;
        } else {
            return $output;
        }
    }

    /**
     * Save Testimonial
     * 
     * @return \AIOTestimonials\Classes\Testimonial
     */
    public function save()
    {
        $this->post->post_title = $this->title;

        update_post_meta($this->post->ID, 'testimonial_client_name', $this->client_name);
        update_post_meta($this->post->ID, 'testimonial_client_email', $this->client_email);
        update_post_meta($this->post->ID, 'testimonial_client_title', $this->client_title);
        update_post_meta($this->post->ID, 'testimonial_product', $this->product);
        update_post_meta($this->post->ID, 'testimonial_rating', $this->rating);
        update_post_meta($this->post->ID, 'testimonial_review', $this->content);

        wp_update_post($this->post);

        return $this;
    }
}
