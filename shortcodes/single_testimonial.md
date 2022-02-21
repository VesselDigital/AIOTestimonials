# Single Testimonial Shortcode

This shortcode will display a single testimonial of your choosing.

## Shortcode
```[single_testimonial id='1']```

## Attributes
| Attribute | Description                       | Type    | Default | Required |
|-----------|-----------------------------------|---------|---------|----------|
| id        | The id of the testimonial to show | integer | NULL    | yes      |

## Examples
`[single_testimonial id='1']`

## Template file name
`single-testimonial.php`

## Variables available
Please check the class references for available functions.

```php
/**
 * @var \AIOTestimonials\Classes\Testimonial $testimonial
 */
$testimonial;

/**
 * @var \AIOTestimonials\Shortcodes\SingleTestimonial $this
 */
$this;
```