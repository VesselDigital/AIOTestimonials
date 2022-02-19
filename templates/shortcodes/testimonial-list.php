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

    <?php if($this->paginate): ?>
        <div class="pages">
            <?php
                echo paginate_links([
                    'base' => add_query_arg('testimonial_page', '%#%'),
                    'format' => '?testimonial_page=%#%',
                    'total' => $testimonials->total_pages(),
                    'current' => $this->page,
                ]);    
            ?>
        </div>
    <?php endif; ?>
</div>