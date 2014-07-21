<?php
// Creates the Footer Widgets Left widget box
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer Widgets Left',
'id' => 'left-footer',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>'
));

// Creates the Footer Widgets Center widget box
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer Widgets Center',
'id' => 'center-footer',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>'
));

// Creates the Footer Widgets Right widget box
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer Widgets Right',
'id' => 'right-footer',
'before_widget' => '<li class="footer_list">',
'after_widget' => '</footer_list>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>'
));

// Creates the sidebar for the Editor-at-Large Corner page template
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => __( 'wiki' ),
'id' => 'wiki',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3 class="sidebar-title">',
'after_title' => '</h3>'
));

if ( function_exists ( 'add_image_size')) {
    add_image_size ('featured-image', 624, 300);
}

// Allows user to rename the post author without having to create a new user using custom fields
add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name( $name ) {
global $post;

$author = get_post_meta( $post->ID, 'guest-author', true );
 
if ( $author )
$name = $author;

return $name;
}

// Renames Image post type in new post format box
function rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Image' )
        return 'Editors Choice';
    return $safe_text; }
add_filter( 'esc_html', 'rename_post_formats' );


// Renames Image post type in posts list table
function live_rename_formats() { 
    global $current_screen;

    if ( $current_screen->id == 'edit-post' ) { ?>
        <script type="text/javascript">
        jQuery('document').ready(function() {

            jQuery("span.post-state-format").each(function() { 
                if ( jQuery(this).text() == "Image" )
                    jQuery(this).text("Editors Choice");   
            });

        });      
        </script>
<?php }
}
add_action('admin_head', 'live_rename_formats');


?>