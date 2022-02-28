<?php
namespace AIOTestimonials\Pages;
/**
 * Pages base page class
 */

class Page
{

    /**
     * The pages title
     * 
     * @var string
     */
    public $title;

    /**
     * The pages slug
     * 
     * @var string
     */
    public $slug;


    /**
     * On new page created
     * 
     * @return void
     */
    public function __construct()
    {
        add_submenu_page(
            "edit.php?post_type=testimonial",
            $this->title,
            $this->title,
            "manage_options",
            $this->slug,
            [$this, "render"]
        );
    }

}
