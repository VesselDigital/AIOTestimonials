<?php
namespace AIOTestimonials\Pages;
/**
 * Average score control page class
 */

class AverageScore extends Page
{

    /**
     * The pages title
     * 
     * @var string
     */
    public $title = "Testimonial Average Score";

    /**
     * Menu title
     * 
     * @var string
     */
    public $menu_title = "Average Score";

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
        global $aiotestimonials;
        $current_rating = \AIOTestimonials\Classes\AverageScore::getScore();
        $last_recalc = \AIOTestimonials\Classes\AverageScore::getLastRecalculation();
        
        include_once AIO_TESTIMONIALS_PATH . "templates/pages/average-score.php";
    }

}
