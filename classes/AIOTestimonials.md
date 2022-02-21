# AIOTestimonial Class

This class handles the initialization of the plugin and loads all other classes and registers styles and scripts.

## Functions

### ```php __construct(): \AIOTestimonials```
Called on the creation of the AIOTestimonials class and runs the autoload function.

### ```php init(): void```
Initializes the plugin by registering hooks, post types, taxonomies, shortcodes and registers styles and scripts.

This is called on the WordPress init action.

### ```php autoload(): void```
Runs a series of *include_once* statements to load all classes and functions.

### ```php register_taxonomies(): void```
Calls register_category_taxonomy on [\AIOTestimonials\PostTypes\Testimonial](classes/PostTypes/Testimonial.md) to register the testimonial category.

### ```php register_post_types(): void```
Calls register_post_type on [\AIOTestimonials\PostTypes\Testimonial](classes/PostTypes/Testimonial.md) to register the testimonial post type.

### ```php register_metaboxes(): void```
Creates a new [\AIOTestimonials\Metaboxes\TestimonialDetailsMetabox](classes/Metaboxes/TestimonialDetailsMetabox.md) instance, not stored in a variable as there are no functions to call on it.

### ```php register_shortcodes(): void```
Creates a series of new instances of the following classes:
- [\AIOTestimonials\Shortcodes\SingleTestimonial](classes/Shortcodes/SingleTestimonial.md)
- [\AIOTestimonials\Shortcodes\TestimonialList](classes/Shortcodes/TestimonialList.md)
- [\AIOTestimonials\Shortcodes\TestimonialListFilters](classes/Shortcodes/TestimonialListFilters.md)
- [\AIOTestimonials\Shortcodes\RandomTestimonial](classes/Shortcodes/RandomTestimonial.md)

*These aren't stored in variables because they have no available methods.*

### ```php register_styles(): void```
Registers the `style-simple.css` stylesheet for simple theme.
```php
wp_register_style("aiotestimonials-testimonial-simple", AIO_TESTIMONIALS_URL . "assets/css/style-simple.css", [], "1.0.0");
```

### ```php register_scripts(): void```
Registers the `testimonials-filter.js` javascript to handle the filters changing when the shortcode is used.
```php
wp_register_script("aiotestimonials-testimonials-filter", AIO_TESTIMONIALS_URL . "assets/js/testimonials-filter.js", [], "1.0.0", true);
```