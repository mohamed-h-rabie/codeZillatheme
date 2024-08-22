<?php
//Register Meta Box
function create_meta_box_publishDate()
{
    add_meta_box(
        'book-publishDate-metabox',
        'book publishDate',
        'create_meta_box_publishDate_callback',
        'book',
        'advanced',
        'high'
    );
}
add_action('add_meta_boxes', 'create_meta_box_publishDate');

//Add field
function create_meta_box_publishDate_callback($post)
{
    // Retrieve the existing value from the database
    $publish_date = get_post_meta($post->ID, 'publish_date', true);

    // Output the meta box HTML
    $outline = '<label for="publish_date" style="width:150px; display:inline-block;">Publishing Date :</label>';
    $outline .= '<input type="date" name="publish_date" id="publish_date" class="publish_date" value="' . esc_attr($publish_date) . '" style="width:300px;"/>';

    echo $outline;
}
function save_meta_box_publishDate($post_id)
{


    if (isset($_POST['publish_date'])) {
        update_post_meta($post_id, 'publish_date', sanitize_text_field($_POST['publish_date']));
    }

    // Save the publishing date

}
add_action('save_post', 'save_meta_box_publishDate');

//////////////////////////////////////////////////////////////////////////////////////////
function create_meta_boxes_details()
{
    add_meta_box(
        'book-details-metabox',       // Unique ID
        'Book Details',               // Box title
        'create_meta_boxes_details_callback', // Content callback
        'book',                       // Post type
        'advanced',                   // Context
        'high'                        // Priority
    );
}
add_action('add_meta_boxes', 'create_meta_boxes_details');

// Add fields
function create_meta_boxes_details_callback($post)
{

    // Retrieve existing values from the database
    $author_name = get_post_meta($post->ID, 'author_name', true);
    $gender = get_post_meta($post->ID, 'gender', true);
    $nationality = get_post_meta($post->ID, 'nationality', true);

    // Output fields
    echo '<label for="author_name" style="width:150px; display:inline-block;">' . esc_html__('Author Name') . '</label>';
    echo '<input type="text" name="author_name" id="author_name" value="' . esc_attr($author_name) . '" style="width:300px;" /><br><br>';

    echo '<label for="gender" style="width:150px; display:inline-block;">' . esc_html__('Gender') . '</label>';
    echo '<input type="text" name="gender" id="gender" value="' . esc_attr($gender) . '" style="width:300px;" /><br><br>';

    echo '<label for="nationality" style="width:150px; display:inline-block;">' . esc_html__('Nationality') . '</label>';
    echo '<input type="text" name="nationality" id="nationality" value="' . esc_attr($nationality) . '" style="width:300px;" />';
}

// Save the metabox data
function save_book_details_meta($post_id)
{

    // Save or update the meta fields
    if (isset($_POST['author_name'])) {
        update_post_meta($post_id, 'author_name', sanitize_text_field($_POST['author_name']));
    }
    if (isset($_POST['gender'])) {
        update_post_meta($post_id, 'gender', sanitize_text_field($_POST['gender']));
    }
    if (isset($_POST['nationality'])) {
        update_post_meta($post_id, 'nationality', sanitize_text_field($_POST['nationality']));
    }
}
add_action('save_post', 'save_book_details_meta');