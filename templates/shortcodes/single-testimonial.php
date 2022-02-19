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
            <div class="testimonial-title">
                <?php echo esc_html($testimonial->title); ?>
            </div>
            <div class="testimonial-rating">
                <?php $testimonial->get_rating_as_stars(true); ?>
            </div>
            <div class="testimonial-text">
                <?php echo $testimonial->content; ?>
            </div>
            <div class="testimonial-meta">
                <?php if($testimonial->client_name): ?>
                <div class="testimonial-client-name">
                    <?php echo esc_html($testimonial->client_name); ?>
                </div>
                <?php endif; ?>
                <?php if($testimonial->client_title): ?>
                <div class="testimonial-client-title">
                    ,&nbsp;<?php echo esc_html($testimonial->client_title); ?>
                </div>
                <?php endif; ?>
                <?php if($testimonial->product): ?>
                <div class="testimonial-product">
                    <?php echo esc_html($testimonial->product); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>