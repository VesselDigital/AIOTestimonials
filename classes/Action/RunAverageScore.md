# Actions\RunAverageScore Class

This is the class that gets called when the admin calls the Update Now button on the average score settings page.

## Variables
```php
    /**
     * The action name
     * 
     * @var string
     */
    public $action = "run_average_score";

    /**
     * The base page url
     * 
     * @var string
     */
    public $base_url = "/wp-admin/edit.php?post_type=testimonial&page=average-score";
```

## Functions

### ```handle(): void```
Calls the [\AIOTestimonials\Classes\AverageScore::setScore()](classes/Classes/AverageScore.md) function to update the average score and redirects back to the average score settings page.