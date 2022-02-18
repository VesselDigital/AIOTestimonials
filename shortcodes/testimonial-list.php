<?php

namespace AIOTestimonials\Shortcodes;

class TestimonialList extends Shortcode
{

    /**
     * Can this shortcode tag be changed?
     * 
     * @var boolean
     */
    protected $user_editable = true;

    /**
     * Shortcode tag
     * 
     * @var string
     */
    public $shortcode = "testimonial_list";


    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        
        // Get Testimonials
        $testimonials = $this->get_testimonials();
        
        // Check if the current theme has a template for this shortcode.
        $template = locate_template("shortcodes/testimonial-list.php");
        if(!$template) {
            $template = AIO_TESTIMONIALS_PATH . "templates/shortcodes/testimonial-list.php";
        }

        ob_start();
        include $template;
        return ob_get_clean();
    }
}
