<?php

namespace AIOTestimonials\Shortcodes;

class TestimonialAverageScore extends Shortcode
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
    public $shortcode = "testimonial_average_score";


    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        return \AIOTestimonials\Classes\TestimonialAverageScore::getScore();
    }
}
