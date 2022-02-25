# Classes\TestimonialQuery Class

This function is a helper to fetch testimonials using \WP_Query

## Variables
```php
/**
 * Testimonial Query
 * 
 * @var \WP_Query
 */
protected $query;
```

## Functions

### ```__construct(array $args = []): \AIOTestimonials\Classes\TestimonialQuery```
When the class is created a `\WP_Query` is ran fetching all posts using the default `\WP_Query` args except only to fetch the `testimonial` post type. You can pass arguments as an array to be merged in.

### ```have_posts(): boolean```
Whether there were any testimonials actually found for the query?

### ```the_post(): void```
Wraps the `\WP_Query::the_post()` function

### ```post_count(): integer```
Get how many posts where found

### ```total_pages(): integer```
Get the total amount of pages there are (mainly if you're using pagination)

### ```as_testimonials(): \AIOTestimonials\Classes\Testimonial[]```
Get an array of testimonials initialized in the [\AIOTestimonials\Classes\Testimonial](classes/Classes/Testimonial.md) class to make it easier to render and make changes to testimonials.
*This is the preferred way of iterating over testimonials*