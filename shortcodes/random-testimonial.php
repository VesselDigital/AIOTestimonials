<?php

namespace AIOTestimonials\Shortcodes;

class RandomTestimonial extends Shortcode
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
    public $shortcode = "random_testimonial";


    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        $args = [
            "orderby" => "rand",
        ];
        $testimonial = $this->single_testimonial(-1, $args);
        if ($testimonial === false) {
            return '';
        }

       $render_settings = $this->get_render_settings();        

        return $testimonial->set_render_settings($render_settings)
            ->render();
    }
}
