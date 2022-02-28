<?php
namespace AIOTestimonials\Classes;
/**
 * Average Score Helpers
 */

class AverageScore
{

    /**
     * The option name saves the average score
     */
    static protected $score_option_name = "aiotestimonials_average_score";

    /**
     * Generate the average score
     * 
     * @return float
     */
    public static function generate()
    {

        global $wpdb;

        // Get the database table names
        $post_meta = $wpdb->prefix . "postmeta";
        $posts = $wpdb->prefix . "posts";

        // Get the rating meta key
        $rating_meta = "testimonial_rating";

        $score = $wpdb->get_var("
            SELECT AVG(meta_value) as 'rating'
            FROM {$posts_meta}, {$posts}
            WHERE `{$post_meta}`.`post_id`=`{$posts}`.`ID` 
            AND `{$posts}`.`post_type`='testimonial' 
            AND `{$posts}`.`post_status`='publish'
            AND `{$post_meta}`.`meta_key`='{$rating_meta}'
        ");

        return $score;

    }

    /**
     * Set cached score and return it.
     * 
     * @return float
     */
    public static setScore() 
    {
        $score = self::generate();
        update_option(self::$score_option_name, $score);

        return $score;
    }

    /**
     * Get the score
     * 
     * @return float
     */
    public static getScore()
    {
        $current_score = get_option(self::$score_option_name, -1);
        if($current_score < 0)
        {
            $current_score = self::setScore();
        }

        return $current_score;
    }

}
