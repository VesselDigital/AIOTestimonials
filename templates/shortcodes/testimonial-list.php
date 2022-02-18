<?php

/**
 * AIOTestimonials
 * 
 * This is a template file to display a single testimonial.
 * 
 * @package     AIOTestimonials
 */
?>

<div class="aiotestimonials testimonial-list">

    <?php
    if ($testimonials->have_posts()) {
        foreach ($testimonials->as_testimonials() as $testimonial) {
            /**
             * @var \AIOTestimonials\Classes\Testimonial $testimonial
             */
            $testimonial->render(true, true);
        }
    }
    ?>
</div>