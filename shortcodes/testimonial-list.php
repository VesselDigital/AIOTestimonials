<?php

namespace AIOTestimonials\Shortcodes;

class TestimonialList extends Shortcode
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
    public $shortcode = "testimonial_list";

    /**
     * Current page?
     * 
     * @var int
     */
    public $page = 1;

    /**
     * Build the query arguments array
     * 
     * @return array
     */
    public function build_query_args() {
        $args = [];
         // How many per page
         if(isset($this->args["per_page"])) {
            $args["posts_per_page"] = $this->args["per_page"];
        } else {
            $args["posts_per_page"] = -1;
        }
        // Current page?
        if(isset($this->args["paginate"])) {
            $this->paginate = true;
            $this->current_page = $_GET["testimonial_page"];
            
            if(isset($_GET["testimonial_page"])) {
                $this->page = $_GET["testimonial_page"];
            }
            $args["paged"] = $this->page;
        }

        if(isset($this->args["cat"])) {
            if(is_numeric($this->args["cat"])) {
                // Query by category ID
                $args["tax_query"] = [
                    "relation" => "AND",
                    [
                        "taxonomy" => "testimonial_category",
                        "field" => "term_id",
                        "terms" => $this->args["cat"]
                    ]
                ];
            } else {
                // Query by category slug
                $args["tax_query"] = [
                    "relation" => "AND",
                    [
                        "taxonomy" => "testimonial_category",
                        "field" => "slug",
                        "terms" => $this->args["cat"]
                    ]
                ];
            }
        }

        // Ordering
        if(isset($this->args["order_by"])) {
            $args["orderby"] = $this->args["order_by"];
        }
        if(isset($this->args["order"])) {
            $args["order"] = $this->args["order"];
        }
        return $args;
    }

    /**
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        $args = $this->build_query_args();

        // Get Testimonials
        $testimonials = $this->get_testimonials($args);

        // Check if the current theme has a template for this shortcode.
        $template = locate_template("shortcodes/testimonial-list.php");
        if(!$template) {
            $template = AIO_TESTIMONIALS_PATH . "templates/shortcodes/testimonial-list.php";
        }

        ob_start();
        include $template;
        return ob_get_clean();
    }
}
