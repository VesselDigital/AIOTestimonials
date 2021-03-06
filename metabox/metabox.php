<?php

namespace AIOTestimonials\Metabox;

class MetaBox
{


    /**
     * New instance of the class
     * 
     * @return \AIOTestimonials\MetaBox
     */
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save_fields'));
    }

    /**
     * Add meta box to the post types
     * 
     * @return void
     */
    public function add_meta_boxes()
    {
        foreach ($this->screen as $single_screen) {
            add_meta_box(
                $this->meta_title,
                __($this->meta_title, ''),
                array($this, 'meta_box_callback'),
                $single_screen,
                'normal',
                'default'
            );
        }
    }

    /**
     * Render the meta box
     * 
     * @param  object $post
     * @return void
     */
    public function meta_box_callback($post)
    {
        wp_nonce_field($this->meta_security . '_data', $this->meta_security . '_nonce');
        if(isset($this->meta_description)) {
            echo '<p>' . __($this->meta_description, '') . '</p>';
        }
        $this->field_generator($post);
    }

    /**
     * Generate and echo the fields
     * 
     * @param  object $post
     * @return void
     */
    public function field_generator($post)
    {

        echo '<table class="form-table"><tbody>';

        foreach ($this->meta_fields as $meta_field) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            $meta_value = get_post_meta($post->ID, $meta_field['id'], true);
            if (empty($meta_value)) {
                if (isset($meta_field['default'])) {
                    $meta_value = $meta_field['default'];
                }
            }
            switch ($meta_field['type']) {
                case "wysiwyg":
                    echo "<tr><th>{$label}</th><td>";
                    wp_editor(
                        $meta_value,
                        $meta_field["id"],
                        array(
                            'media_buttons' => false
                        )
                    );
                    echo '</td></tr>';
                    break;

                default:
                    $input = sprintf(
                        '<input %s id="%s" name="%s" type="%s" value="%s">',
                        $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['type'],
                        $meta_value
                    );
                    echo $this->format_rows($label, $input);
            }
        }
        echo '</tbody></table>';
    }

    /**
     * Formats the table rows
     * 
     * @return string
     */
    public function format_rows($label, $input)
    {
        return '<tr><th>' . $label . '</th><td>' . $input . '</td></tr>';
    }

    /**
     * Save the meta box fields to the database
     * 
     * @return void
     */
    public function save_fields($post_id)
    {
        if (!isset($_POST[$this->meta_security . '_nonce']))
            return $post_id;
        $nonce = $_POST[$this->meta_security . '_nonce'];
        if (!wp_verify_nonce($nonce, $this->meta_security . '_data'))
            return $post_id;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;
        foreach ($this->meta_fields as $meta_field) {
            if (isset($_POST[$meta_field['id']])) {
                switch ($meta_field['type']) {
                    case 'email':
                        $_POST[$meta_field['id']] = sanitize_email($_POST[$meta_field['id']]);
                        break;
                    case 'text':
                        $_POST[$meta_field['id']] = sanitize_text_field($_POST[$meta_field['id']]);
                        break;
                }
                update_post_meta($post_id, $meta_field['id'], $_POST[$meta_field['id']]);
            } else if ($meta_field['type'] === 'checkbox') {
                update_post_meta($post_id, $meta_field['id'], '0');
            }
        }
    }
}
