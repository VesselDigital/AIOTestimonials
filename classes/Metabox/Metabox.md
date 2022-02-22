# Metabox\Metabox Class

This is the base class for metaboxes created by the plugin.

## Functions

### ```__construct(): \AIOTestimonials\Metaboxes\Metabox```
Called on the creation of the metabox and adds an action to the `add_meta_boxes` hook to register the current metabox and also adds a `save_post` hook to save the metabox data on post save.

### ```add_meta_boxes():void ```
Adds the metabox to the post edit screen using WordPress function: (`add_meta_box`).

### ```meta_box_callback(\WP_Post $post): void```
Called to display the metabox, first off displays the description (if one is set in the child class) then generates the form fields using the [\AIOTestimonials\Metaboxes\Metabox::field_generator()](classes/Metaboxes/Metabox.md#field_generator) function.

#### Arguments
- ``$post`` WP_Post (Required) 

### ```field_generator(\WP_Post $post): void```
Generates the form fields for the metabox based on the fields set in the child class `meta_fields` variable.

#### Arguments
- ``$post`` WP_Post (Required) 

### ```format_rows(string $label, string $input): string```
Formats the setting rows for the metabox.

#### Arguments
- ``$label`` string (Required) - Used for the input's label
- ``$input`` string (Required) - Used for the input's type

### ```save_fields(int $post_id): void```
Saves the post meta data to the database.

#### Arguments
- ``$post_id`` integer (Required) - Used to update a post's data with the ID
