<?php
function my_theme_enqueue_styles() {

    $parent_style = 'twentyfifteen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
/*
function naytonpaikka_add_meta_box(){

    $screens = array('post');
    foreach ( $screens as $screen) {

        add_meta_box(
            'naytonpaikka_meta_sectionid',
            __( 'My Theme Options', 'layerswp'),
            'naytonpaikka_meta_box_callback',
            $screen,
            'normal',
            'high'
        );

    }
}
add_action( 'add_meta_boxes', 'naytonpaikka_add_meta_box');

function naytonpaikka_meta_box_callback( $post )
{
    wp_nonce_field('naytonpaikka_meta_box', 'naytonpaikka_meta_box_nonce');

    $meta = get_post_meta($post->ID);
    $options = get_option( 'your_fields' );
    $textarea = isset( $options['textarea']) ? $options['textarea'] : '';

    ?>

    <input type="hidden" name="naytonpaikka_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">


    <!-- All fields will go here -->
    <p>
        <label for="your_fields[textarea]">Textarea</label>
        <br>
        <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30"
                  style="width:500px;"><?php echo esc_textarea($textarea); ?></textarea>
    </p>
    <p>
        <label for="your_fields[textarea]">Textarea</label>
        <br>
        <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30"
                  style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
    </p>

    <?php

}
*/
?>