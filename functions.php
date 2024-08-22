<?php
//to add featured image
require_once('lib/add-post-types.php');
require_once('lib/add-meta-boxes.php');
require_once('lib/add-custom-taxnomy.php');
require_once('lib/add-style.php');
add_theme_support('post-thumbnails');
add_image_size('custom-size', 400, 400);
