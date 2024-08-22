<?php get_header(); ?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
<?php
        $author_name = get_post_meta(get_the_ID(), 'author_name', true);
        $gender = get_post_meta(get_the_ID(), 'gender', true);
        $nationality = get_post_meta(get_the_ID(), 'nationality', true);
        $publish_date = get_post_meta(get_the_ID(), 'publish_date', true);

        ?>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
            <?php the_post_thumbnail('custom-size'); ?>

            <ul style="list-style: none;">
                <?php if (!empty($author_name)): ?>
                <li>Author Name : <?= $author_name ?></li>
                <?php endif; ?>
                <?php if (!empty($gender)): ?>

                <li>Author Gender : <?= $gender ?></li>
                <?php endif; ?>
                <?php if (!empty($nationality)): ?>

                <li>Author Nationality : <?= $nationality ?></li>
                <?php endif; ?>
                <?php if (!empty($publish_date)): ?>

                <li>Publish Date : <?= $publish_date ?></li>
                <?php endif; ?>


            </ul>
        </div>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </section>



</main>

<?php
    } // end while
} // end if
?>

<?php get_footer(); ?>