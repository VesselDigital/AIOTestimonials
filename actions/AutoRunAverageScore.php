<?php
namespace AIOTestimonials\Actions;

class AutoRunAverageScore extends Action
{

    /**
     * Is Native WordPress Action
     * 
     * @var boolean
     */
    public $is_native = true;

    /**
     * The action name
     * 
     * @var string
     */
    public $action = "save_post";

    /**
     * Handle the action
     * 
     * @return void
     */
    public function handle() {
        global $post; 
        if ($post->post_type != 'testimonial'){
            return;
        }

        // Update the average score
        \AIOTestimonials\Classes\AverageScore::setScore();

    }
}
