# Shortcodes\TestimonialList Class

This is the Testimonial List class, which handles fetching and displaying a list of testimonials, this inherits from the [\AIOTestimonials\Shortcodes\Shortcode](classes/Shortcodes/Shortcode.md) class.


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
public $shortcode = "testimonial_list";

/**
 * Current page?
 * 
 * @var int
 */
public $page = 1;

```

## Functions

### ```build_query_args(): array```
Handles the generation of a [\AIOTestimonials\Classes\TestimonialQuery](classes/Classes/TestimonialQuery.md) arguments array to fetch testimonials based on the arguments supplied to the shortcode.

### ```render(): string```
Gets the generated arguments and fetches the testimonials to display. Finally attempts to locate the `testimonial-list.php` in either the theme or the plugin directory and generates the HTML of the list and returns it as a string