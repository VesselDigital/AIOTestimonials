<?php
namespace AIOTestimonials\Actions;

class RunAverageScore extends Action
{

    /**
     * The action name
     * 
     * @var string
     */
    public $action = "run_average_score";

    /**
     * The base page url
     * 
     * @var string
     */
    public $base_url = "/wp-admin/edit.php?post_type=testimonial&page=average-score";

    /**
     * Handle the action
     * 
     * @return void
     */
    public function handle() {
        \AIOTestimonials\Classes\AverageScore::setScore();

        return $this->redirect( $this->base_url . '&message=success' );
    }
}
