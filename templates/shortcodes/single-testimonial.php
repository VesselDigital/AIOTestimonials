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
        <?php if($testimonial->render_settings["show_image"]): ?>
        <div class="testimonial-image">
            <img src="<?php echo esc_attr($testimonial->get_client_gravatar()); ?>" alt="<?php echo esc_attr($testimonial->title); ?>" />
        </div>
        <?php endif; ?>
        <div class="testimonial-content">
            <?php if($testimonial->title && $testimonial->render_settings["show_title"]): ?>
            <div class="testimonial-title">
                <?php echo esc_html($testimonial->title); ?>
            </div>
            <?php endif; ?>
            <?php if($testimonial->render_settings["show_rating_as_stars"]): ?>
            <div class="testimonial-rating">
                <?php $testimonial->get_rating_as_stars(true); ?>
            </div>
            <?php else: ?>
                <div class="testimonial-rating no-stars">
                    <?php echo esc_html($testimonial->rating); ?> / 5
                </div>
            <?php endif; ?>
            <div class="testimonial-text">
                <?php echo $testimonial->content; ?>
            </div>
            <div class="testimonial-meta">
                <?php if($testimonial->client_name && $testimonial->render_settings["show_client_name"]): ?>
                <div class="testimonial-client-name">
                    <?php echo esc_html($testimonial->client_name); ?>
                </div>
                <?php endif; ?>
                <?php if($testimonial->client_title && $testimonial->render_settings["show_client_title"]): ?>
                <div class="testimonial-client-title">
                    ,&nbsp;<?php echo esc_html($testimonial->client_title); ?>
                </div>
                <?php endif; ?>
                <?php if($testimonial->product && $testimonial->render_settings["show_product"]): ?>
                <div class="testimonial-product">
                    <?php echo esc_html($testimonial->product); ?>
                <?php endif; ?>
                </div>
                <?php if($testimonial->render_settings["show_date"]): ?>
                <div class="testimonial-date">
                    <?php echo $testimonial->get_publish_date()->format("jS M Y"); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>