<?php

namespace AIOTestimonials\Shortcodes;

class SingleTestimonial extends Shortcode
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
    public $shortcode = "single_testimonial";


    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        // Verify an ID has been passed.
        if(!isset($this->args["id"])) {
            return "";
        }

        $testimonial_id = $this->args['id'];
        $testimonial = $this->single_testimonial($testimonial_id);
        return $testimonial->render();
        
    }
}
