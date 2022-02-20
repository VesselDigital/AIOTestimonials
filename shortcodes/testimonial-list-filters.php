<?php

namespace AIOTestimonials\Shortcodes;

class TestimonialListFilters extends TestimonialList
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
    public $shortcode = "testimonial_list_filters";

    /**
     * Current page?
     * 
     * @var int
     */
    public $page = 1;

    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        $args = $this->build_query_args();

        $active_filters = [
            "rating" => "All",
            "sort" => "newest"
        ];

        wp_enqueue_script("aiotestimonials-testimonials-filter");

        if(isset($_GET["testimonial_rating"]) && is_numeric($_GET["testimonial_rating"])) {
            
            $rating_args = [
                "key" => "testimonial_rating",
                "value" => $_GET["testimonial_rating"],
                "compare" => "="
            ];

            if(isset($args["meta_query"])) {
                $args["meta_query"][] = $rating_args;
            } else {
                $args["meta_query"] = [
                    "relation" => "AND",
                    $rating_args  
                ];
            }

            $active_filters["rating"] = $_GET["testimonial_rating"];
        }

        if(isset($_GET["testimonial_sort_by"])) {
            switch($_GET["testimonial_sort_by"]) {
                case "oldest":
                    $args["orderby"] = "publish_date";
                    $args["order"] = "ASC";
                    break;
                case "top":
                    $args["orderby"] = "rating";
                    $args["order"] = "DESC";
                    break;
                case "worst":
                    $args["orderby"] = "rating";
                    $args["order"] = "ASC";
                    break;
                default:
                    $args["orderby"] = "publish_date";
                    $args["order"] = "DESC";
                    break;
            }
            $active_filters["sort"] = $_GET["testimonial_sort_by"];
        }

        // Get Testimonials
        $testimonials = $this->get_testimonials($args);

        // Check if the current theme has a template for this shortcode.
        $template = locate_template("shortcodes/testimonial-list-filters.php");
        if(!$template) {
            $template = AIO_TESTIMONIALS_PATH . "templates/shortcodes/testimonial-list-filters.php";
        }

        ob_start();
        include $template;
        return ob_get_clean();
    }
}
