# Pages\AverageScore Class
This is the page for the average score settings page, this inherits from the [\AIOTestimonials\Pages\Page](classes/Pages/Page.md) class.

## Variables
```php
    /**
     * The pages title
     * 
     * @var string
     */
    public $title = "Testimonial Average Score";

    /**
     * Menu title
     * 
     * @var string
     */
    public $menu_title = "Average Score";

    /**
     * The pages slug
     * 
     * @var string
     */
    public $slug = "average-score";

```

## Functions

### ```render(): void```
Fetches the current rating, and last calculated rating and then renders the template located in:
```templates/pages/average-score.php``` - this cannot be overridden in your theme as it is an admin meta box template.