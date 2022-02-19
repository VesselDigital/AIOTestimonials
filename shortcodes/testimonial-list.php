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
     * Render the shortcode
     * 
     * @return string
     */
    public function render()
    {
        $args = [];

        // How many per page
        if(isset($this->args["per_page"])) {
            $args["posts_per_page"] = $this->args["per_page"];
        }
        // How many per page
        if(isset($this->args["paginate"])) {
            $this->paginate = true;
            $this->current_page = $_GET["testimonial_page"];
            
            if(isset($_GET["testimonial_page"])) {
                $this->page = $_GET["testimonial_page"];
            }
            $args["paged"] = $this->page;
        }
        // Ordering
        if(isset($this->args["order_by"])) {
            $args["orderby"] = $this->args["order_by"];
        }
        if(isset($this->args["order"])) {
            $args["order"] = $this->args["order"];
        }

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
