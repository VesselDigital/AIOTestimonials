# Shortcodes\Shortcode Class

This is the base class for shortcode created by the plugin.

## Variables
```php
/**
 * Can this shortcode tag be changed?
 * This feature is planned for a future release and has no effect as of yet.
 * 
 * @var boolean
 */
protected $user_editable = false;

/**
 * Shortcode arguments
 * 
 * @var array
 */
public $args = [];
```

## Functions

### ```php __construct(): \AIOTestimonials\Shortcodes\Shortcode```
Calls the register shortcode function to register the shortcode for use in the post editor.

### ```php register_shortcode(): void```
First checks if there is an option set for the plugin name if it's marked as user editable.
The fill option meta it will check for is `testimonial_shortcode_` followed by the default shortcode name.
Once the check and variable has been set, if needed, the shortcode will be registered with the callback being set to the [\AIOTestimonials\Shortcodes\Shortcode::handle_shortcode()](classes/Shortcodes/Shortcode.md#handle_shortcode) function.

### ```php handle_shortcode(array $atts = []): string```
Called when the shortcode is loaded in the editor. It will assign the `$atts` to the global variable `$args`.  It will then check for the theme and then begin to call the [\AIOTestimonials\Shortcodes\Shortcode::load_styles()](classes/Shortcodes/Shortcode.md#load_styles) function and finally once styles have been loaded the [\AIOTestimonials\Shortcodes\Shortcode::render()](classes/Shortcodes/Shortcode.md#render) function will be called to render the shortcode HTML.

