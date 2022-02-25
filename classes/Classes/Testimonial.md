# Classes\Testimonial Class

This function acts as a Testimonial Model for a WP_Post testimonial. It includes some helper functions that make it easy to update and render the specific testimonial as well as fetch certain data related to the testimonial such as, client's name, review itself, rating and more.

## Variables
```php
    /**
     * Testimonial Post
     * 
     * @var \WP_Post
     */
    protected $post;

    /**
     * Testimonial title
     * 
     * @var string
     */
    public $title;

    /**
     * Client's Name
     * 
     * @var string
     */
    public $client_name;

    /**
     * Client's Email Address
     * 
     * @var string
     */
    public $client_email;

    /**
     * Client's Title / Company / Website
     * 
     * @var string
     */
    public $client_title;

    /**
     * Product / Service / Location reviewed
     * 
     * @var string
     */
    public $product;

    /**
     * Testimonial Rating
     * 
     * @var int
     */
    public $rating;

    /**
     * Testimonial Content
     * 
     * @var string
     */
    public $content;

    /**
     * Render settings
     * 
     * @var array
     */
    public $render_settings = [
        "show_image" => true,
        "show_title" => true,
        "show_client_name" => true,
        "show_client_title" => true,
        "show_client_email" => true,
        "show_product" => true,
        "show_date" => true,
        "show_rating_as_stars" => true,
    ];
```

## Functions

### ```__construct(\WP_Post $post, array $render_settings = []): \AIOTestimonials\Classes\Testimonial```
Called on creation of the new Testimonial instance, *this does not create a new testimonial post*!
You are required to pass in a WP_Post of the testimonial post type which the class will then load all required meta data.

Optionally you can pass in the render settings, based on the settings listed under the variables heading. All other settings will be ignored.

### ```get_post(): \WP_Post```
Simply returns the WordPress post instance of the testimonial.

### ```get_title(): string```
Gets the testimonial's title

### ```get_client_name(): string```
Gets the testimonial client's name

### ```get_client_email(): string```
Gets the testimonial client's email address

### ```get_client_gravatar(int $size = 250): string```
Gets the testimonial client's gravatar URL, returns a default avatar if no email is set.
Pass in the `$size` integer to set the images size, by default you will get an image that is 250x250px

### ```get_client_title(): string```
Gets the testimonial client's title / company / website

### ```get_product(): string```
Gets the product / service or location that was reviewed

### ```get_rating(): float```
Gets the rating that was left as a number

### ```get_rating_as_stars(bool $echo = false): string|void```
Gets the rating that was left as HTML using the build-in WordPress dashicons stars.

Set the `$echo` variable to either display the stars when the function is called or get the HTML returned as a string. By default you will get the HTML string.

### ```get_content(): string```
Gets the testimonial content

### ```get_publish_date(): \DateTime```
Gets the testimonial's date it was published as a PHP DateTime instance [see here for formatting.](https://www.php.net/manual/en/datetime.format.php#refsect1-datetime.format-parameters)

### ```get_ld_json(bool $echo = false): string|void```
Gets the JSON-LD for the review, this helps improve SEO. This function does not automatically wrap the JSON in script tags.

Set the `$echo` variable to either display the stars when the function is called or get the HTML returned as a string. By default you will get the HTML string.

### ```set_render_settings(array $render_settings): \AIOTestimonials\Classes\Testimonial```
Merges the settings provided with the default settings. All other settings other than the ones listed under the variables will be ignored.


### ```render(bool $echo = false, bool $include_json = true): string|void ```
Generates the HTML for the testimonial using the `single-testimonial.php` template file and either returns it as a string or echo's it out.

You can also set whether to include the JSON (wrapped in `<script>` tags) in your HTML code. This is included by default.

### ```save(): \AIOTestimonials\Classes\Testimonial ```
If you have set any of the testimonials properties, such as name, content, client details, rating you can call this function to update the \WP_Post instance with this new data.