# Testimonial List Shortcode

This shortcode will display a list of testimonials with no filtering options.

## Shortcode
```[testimonial_list]```

## Attributes
| Attribute | Description                                                                                     | Type        | Default      | Required |
|-----------|-------------------------------------------------------------------------------------------------|-------------|--------------|----------|
| `per_page`  | Limits the amount of testimonials to show                                                       | integer     | -1           | no       |
| `paginate`  | Enable the pagination of testimonials                                                           | boolean     | false        | no       |
| `cat`       | Only display testimonials from a testimonial category Use either the categories term_id or slug | string\|int | NULL         | no       |
| `order_by`  | Order the testimonials by a field (See WP_Query)                                                | string      | publish_date | no       |
| `order`     | Order either in ascending or descending order                                                   | ASC \| DESC | DESC         | no       |

## Examples
`[testimonial_list]`
`[testimonial_list paginate='1' per_page='5']`

## Template file name
`testimonial-list.php`

## Variables available
Please check the class references for available functions.

```php
/**
 * @var \AIOTestimonials\Classes\TestimonialQuery $testimonials
 */
$testimonials;

/**
 * @var \AIOTestimonials\Shortcodes\TestimonialList $this
 */
$this;
```