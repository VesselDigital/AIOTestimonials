<?php
namespace AIOTestimonials\Pages;
/**
 * Average score control page class
 */

class AverageScore
{

    /**
     * The pages title
     * 
     * @var string
     */
    public $title = "Testimonial Average Score";

    /**
     * The pages slug
     * 
     * @var string
     */
    public $slug = "average-score";


    /**
     * Render the average score page
     * 
     * @return void|string
     */
    public function render()
    {
        $current_rating = \AIOTestimonials\Classes\AverageScore::getScore();

        include_once AIO_TESTIMONIALS_PATH . "templates/pages/average-score.php";
    }

}
