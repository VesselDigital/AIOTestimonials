<?php

/**
 * AIOTestimonials
 * 
 * This is a template file to display a single testimonial.
 * 
 * @package     AIOTestimonials
 */
?>

<div class="aiotestimonials testimonial-list testimonial-list-filters">

    <div class="testimonials-filter-head">
        <div class="total-reviews">
            <?php echo $testimonials->post_count(); ?> <?php _e('Reviews', 'aio-testimonials'); ?>
        </div>
        <div class="filters">
            <label>
                <?php _e('Show ratings', 'aio-testimonials'); ?>
                <select name="testimonial_rating" class="testimonial-select">
                    <option value="All"><?php _e('All reviews', 'aio-testimonials'); ?></option>
                    <?php for($i = 1; $i <= 5; $i ++): ?>
                        <option value="<?php echo esc_attr($i); ?>"<?php if($i == $active_filters["rating"]) echo " selected"; ?>><?php echo esc_html($i); ?> <?php _e('Star reviews only', 'aio-testimonials'); ?></option>
                    <?php endfor; ?>
                </select>
            </label>
            <label>
                <?php _e('Sort by', 'aio-testimonials'); ?>
                <select name="testimonial_sort_by" class="testimonial-select">
                    <option value="newest"<?php if("newest" == $active_filters["sort"]) echo " selected"; ?>><?php _e('Show newest first', 'aio-testimonials'); ?></option>
                    <option value="oldest"<?php if("oldest" == $active_filters["sort"]) echo " selected"; ?>><?php _e('Show oldest first', 'aio-testimonials'); ?></option>
                    <option value="top"<?php if("top" == $active_filters["sort"]) echo " selected"; ?>><?php _e('Top rated first', 'aio-testimonials'); ?></option>
                    <option value="worst"<?php if("worst" == $active_filters["sort"]) echo " selected"; ?>><?php _e('Worst rated first', 'aio-testimonials'); ?></option>
                </select>
            </label>
        </div>
    </div>

    <?php
    if ($testimonials->have_posts()) {
        foreach ($testimonials->as_testimonials() as $testimonial) {
            /**
             * @var \AIOTestimonials\Classes\Testimonial $testimonial
             */
            $testimonial->set_render_settings($this->get_render_settings())->render(true);
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