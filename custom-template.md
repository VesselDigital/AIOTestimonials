# Custom Templates
Adding your custom templates to the plugin is designed to be as straightforward for developers as possible.

For an example of using custom templates you are able to take a look at the ones we have included in the plugin here: [https://github.com/VesselDigital/AIOTestimonials/tree/main/templates/shortcodes](https://github.com/VesselDigital/AIOTestimonials/tree/main/templates/shortcodes).

## Loading in your theme

When loading a shortcode the plugin first tries to check if there is a template file in your theme, if the file does not exist it will be loaded from the plugin. All template files will need to be stored in the following directory:
```/wp-content/themes/[your-theme]/aiotestimonials/```

The following filenames are checked:
- ```single-testimonial.php```
- ```testimonial-list.php```
- ```testimonial-list-filters.php```
 
You do not need to recreate them all if you do not wish to customise certain layouts, but, please note the testimonial list and list list filters will load in the single testimonial template by default but this can be changed within the template file itself. The random testimonial shortcode also loads in the single testimonial template.

## Using your own CSS

To use your own CSS for your templates you will just need to set the theme attribute to custom when using the shortcode, for example:
```[testimonial_list theme="custom"]```
The above will only output the HTML of the testimonial with no CSS.