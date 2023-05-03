# Shortcodes\SingleTestimonial Class

This is the Single Testimonial class, which handles displaying a single testimonial, this inherits from the [\AIOTestimonials\Shortcodes\Shortcode](classes/Shortcodes/Shortcode.md) class.


## Variables
```php
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
public $shortcode = "single_testimonial";
```

## Functions

### ```render(): string```
This function handles the fetching and rendering of the testimonial. It returns a string of the HTML structure of the testimonial. 
The generation of HTML itself it handled by the [\AIOTestimonials\Classes\Testimonial](classes/Classes/Testimonial.md) class, so please refer to that for available rendering methods.