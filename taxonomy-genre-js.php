<?php get_header(); ?>


<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Tax Js page</h1>

            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                ?>

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">

                        <img class="card-img-top" style="height: 200px; width: 100%;"
                            src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h1>
                                <?php the_title(); ?>
                            </h1>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="<?php the_permalink(); ?>" type="button"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>



                <?php
                    } // end while
                } // end if
                ?>






            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>