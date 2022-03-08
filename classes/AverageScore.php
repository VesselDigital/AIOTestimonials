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
     * The option name saves the average score's last recalc date
     */
    static protected $score_lastrecalc_option_name = "aiotestimonials_average_score_recalc_date";

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
            FROM {$post_meta}, {$posts}
            WHERE `{$post_meta}`.`post_id`=`{$posts}`.`ID` 
            AND `{$posts}`.`post_type`='testimonial' 
            AND `{$posts}`.`post_status`='publish'
            AND `{$post_meta}`.`meta_key`='{$rating_meta}'
        ");

        if(is_null($score)) {
            return 0;
        }

        return number_format($score);

    }

    /**
     * Set cached score and return it.
     * 
     * @return float
     */
    public static function setScore() 
    {
        $score = self::generate();
        update_option(self::$score_option_name, $score);
        update_option(self::$score_lastrecalc_option_name, date("Y-m-d H:i:s"));

        return $score;
    }

    /**
     * Get the score
     * 
     * @return float
     */
    public static function getScore()
    {
        $current_score = get_option(self::$score_option_name, -1);
        if($current_score < 0)
        {
            $current_score = self::setScore();
        }


        return $current_score;
    }

    /**
     * Get the last recalculation date
     * 
     * @return \DateTime|string
     */
    public static function getLastRecalculation()
    {
        $last_date = get_option(self::$score_lastrecalc_option_name, -1);
        if($last_date < 0)
        {
            return "Never";
        }


        return \DateTime::createFromFormat("Y-m-d H:i:s", $last_date);
    }

    /**
     * Get the next recalculation date
     * 
     * @return \DateTime|string
     */
    public static function getNextRecalculation()
    {
    }

}
