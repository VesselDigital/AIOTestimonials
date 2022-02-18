<?php
namespace AIOTestimonials\Classes;
/**
 * Testimonial Query
 * 
 */

class TestimonialQuery
{

    /**
     * Testimonial Query
     * 
     * @var \WP_Query
     */
    protected $query;

    

    /**
     * New Testimonial Query
     */
    function __construct($args = [])
    {
        $query_arys = [
            "post_type" => "testimonial"
        ];
        $merged_args = array_merge($query_arys, $args);
        $this->query = new \WP_Query($merged_args);
    }
    
    /**
     * Have posts?
     * 
     * @return bool
     */
    public function have_posts()
    {
        return $this->query->have_posts();
    }

    /**
     * The post
     * 
     * @return void
     */
    public function the_post()
    {
        $this->query->the_post();
    }

    /**
     * Post count
     * 
     * @return int
     */
    public function post_count()
    {
        return $this->query->post_count;
    }

    /**
     * Get testimonials as testimonial class
     * 
     * @return \AIOTestimonials\Classes\Testimonial[]
     */
    public function as_testimonials()
    {
        $testimonials = [];
        while($this->have_posts()) {
            $this->the_post();
            $testimonials[] = new Testimonial($this->query->post);
        }
        return $testimonials;
    }

}
