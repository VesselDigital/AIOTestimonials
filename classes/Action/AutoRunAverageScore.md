# Actions\AutoRunAverageScore Class

This is the class that gets called when a testimonial is saved (updated or published) to update the average score.

## Variables
```php
    /**
     * Is Native WordPress Action
     * 
     * @var boolean
     */
    public $is_native = true;

    /**
     * The action name
     * 
     * @var string
     */
    public $action = "save_post"; 
```

## Functions

### ```handle(): void```
Verifies the post being saved is of the `testimonial` type and then calls the [\AIOTestimonials\Classes\AverageScore::setScore()](classes/Classes/AverageScore.md) function to update the average score.