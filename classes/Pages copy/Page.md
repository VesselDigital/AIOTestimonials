# Pages\Page Class

This is the base class for an admin page for the plugin

## Variables
```php
    /**
     * The pages title
     * 
     * @var string
     */
    public $title;

    /**
     * The pages slug
     * 
     * @var string
     */
    public $slug;
```

## Functions

### ```__construct(): \AIOTestimonials\Pages\Page```
Registers the admin page.

### ```register_menu(): void```
Actually registers the submenu page under the testimonial post type.