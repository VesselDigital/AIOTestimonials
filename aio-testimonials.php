<?php
/**
 * AIO Testimonials
 *
 * Plugin Name: AIO Testimonials
 * Plugin URI:  https://vesseldigital.co.uk/plugins/aio-testimonials/
 * Description: Your all in one testimonials plugin, easily collect and display testimonials from your clients.
 * Version:     1.0
 * Author:      VesselDigital
 * Author URI:  https://vesseldigital.co.uk/plugins
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: aio-testimonials
 * Requires at least: 5.8
 * Requires PHP: 7.4.1
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */


if(!class_exists("AIOTestimonials")) {

    define("AIO_TESTIMONIALS_PATH", plugin_dir_path(__FILE__));
    define("AIO_TESTIMONIALS_URL", plugin_dir_url(__FILE__));

    class AIOTestimonials {

        /**
         * On construction of the AIOTestimonials instance
         * 
         * @return \AIOTestimonials
         */
        function __construct()
        {
            $this->autoload();
        }

        /**
         * On activation of the plugin
         * 
         * @return \AIOTestimonials
         */
        public function init() {
            $this->register_taxonomies();
            $this->register_post_types();
            $this->register_metaboxes();
            $this->register_shortcodes();
        }


        /**
         * Autoload all classes
         * 
         * @return void
         */
        private function autoload() {
            include_once "classes/Testimonial.php";
            include_once "classes/TestimonialQuery.php";

            include_once "post-types/testimonial.php";

            include_once "metabox/metabox.php";
            include_once "metabox/testimonial.php";

            include_once "shortcodes/shortcode.php";
            include_once "shortcodes/single-testimonial.php";
            include_once "shortcodes/testimonial-list.php";
        }

        /**
         * Load and register the taxonomies
         * 
         * @return \AIOTestimonials
         */
        private function register_taxonomies() {
            //
            \AIOTestimonials\PostTypes\Testimonial::register_category_taxonomy();

            return $this;
        }

        /**
         * Load and register the post types
         * 
         * @return \AIOTestimonials
         */
        private function register_post_types() {
            //
            \AIOTestimonials\PostTypes\Testimonial::register_post_type();

            return $this;
        }

        /**
         * Load and register the metaboxes
         * 
         * @return \AIOTestimonials
         */
        private function register_metaboxes() {
            new \AIOTestimonials\Metabox\TestimonialDetailsMetaBox;

            return $this;
        }

        /**
         * Load and register the shortcodes
         * 
         * @return \AIOTestimonials
         */
        private function register_shortcodes() {
            new \AIOTestimonials\Shortcodes\SingleTestimonial;
            new \AIOTestimonials\Shortcodes\TestimonialList;

            return $this;
        }

    }


    // Init testimonials plugin
    $aiotestimonials = new AIOTestimonials();

    // Call init hooks
    add_action('init', [$aiotestimonials, 'init']);
}