<?php

if (isset($_POST['redirect_button'])) {

    wp_redirect('http://localhost/wordpress/books/');
    exit;
}
?>
<?php
get_header();
?>

<div class="error-404 not-found">
    <h1>Oops! That page can’t be found.</h1>
    <p>It looks like nothing was found at this location. You can go back to the homepage or click the button below to go
        to a specific page.</p>

    <form method="post">
        <button type="submit" name="redirect_button">Go to Books Page</button>
    </form>


</div>

<?php
get_footer();
?>