# Actions\Action Class

This is the base class for an action either an internal WordPress action of a HTTP Post action from the admin panel.

## Variables
```php
    /**
     * The action name
     * 
     * @var string
     */
    public $action;

    /**
     * The base page url
     * 
     * @var string
     */
    public $base_url;

    /**
     * The action's data
     * 
     * @var array
     */
    public $data;

    /**
     * Is a native wordpress action?
     * 
     * @var boolean
     */
    public $is_native = false;
```

## Functions

### ```__construct(): \AIOTestimonials\Actions\Action```
Registers either the admin_post action which will be prefixed by "aiotestimonials_" or will hook into a native WordPress action using the `$action` variable if the `$is_native` is true.

### ```_handle(): void```
An internal action handler to verify the nonce and verify the user has the `manage_options` capability, only called if the action is a HTTP Post action and will then call `handle()`

### ```redirect(string $url): void```
A helper to manage redirecting the action, if HTTP Post.

### ```get_form(boolean $echo = false): void```
Get this actions HTTP form fields, this include the nonce, and action name. It can be accessed by using the `global $aiotestimonials` variable, eg.:
```php
global $aiotestimonials;
$form_fields = $aiotestimonials->actions["my_action"]->get_form();

// To echo fields
global $aiotestimonials;
$aiotestimonials->actions["my_action"]->get_form(true);
```

### ```handle(): void```
Handles the action, blank in this base class.