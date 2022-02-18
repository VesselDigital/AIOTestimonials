<?php
/**
 * AIOTestimonials
 * 
 * This is a template file to display a single testimonial.
 * 
 * @package     AIOTestimonials
 */
?>

<div class="aiotestimonials single-testimonial">
    <div class="layout">
        <div class="testimonial-image">
            <img src="<?php echo esc_attr($testimonial->get_client_gravatar()); ?>" alt="<?php echo esc_attr($testimonial->title); ?>" />
        </div>
        <div class="testimonial-content">
            <div class="testimonial-text">
                <?php echo $testimonial->content; ?>
            </div>
            <div class="testimonial-meta">
                <div class="testimonial-client-name">
                    <?php echo esc_html($testimonial->client_name); ?>
                </div>
                <div class="testimonial-client-title">
                    <?php echo esc_html($testimonial->client_title); ?>
                </div>
                <div class="testimonial-product">
                    <?php echo esc_html($testimonial->product); ?>
                </div>
                <div class="testimonial-rating">
                    <?php $testimonial->get_rating_as_stars(true); ?>
                </div>
            </div>
        </div>
    </div>
</div>