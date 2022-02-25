# Shortcodes\TestimonialListFilters Class

This is the Testimonial List with Filters class, which handles fetching and displaying a list of testimonials, this inherits from the [\AIOTestimonials\Shortcodes\TestimonialList](classes/Shortcodes/TestimonialList.md) class.


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
public $shortcode = "testimonial_list_filters";

/**
 * Current page?
 * 
 * @var int
 */
public $page = 1;

```

## Functions

### ```render(): string```
Generates the arguments using the `build_query_args` function defined in the [\AIOTestimonials\Shortcodes\TestimonialList](classes/Shortcodes/TestimonialList.md) class.
This function also enqueues the registered JS `aiotestimonials-testimonials-filter`, which handles the updating of the selcet fields and refreshing the page.
We also check if any of the select options have been changed and merge that into the `build_query_args` array that was generated previously before fetching testimonials.
Fetches the testimonials to display using the generated arguments. Finally attempts to locate the `testimonial-list-filters.php` in either the theme or the plugin directory and generates the HTML of the list and returns it as a string