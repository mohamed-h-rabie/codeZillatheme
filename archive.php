    <?php


    /**
     * Template Name: books
     */
    get_header(); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Paginated Book Page</h1>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    // Get the current page number
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    // Query arguments
                    $args = array(
                        'post_type' => 'book',
                        'order' => 'DESC', // Corrected from 'DES'
                        'orderby' => 'date',
                        'post_status' => 'publish',
                        'posts_per_page' => 2,
                        'paged' => $paged, // Pagination
                        'meta_query' => array(
                            array(
                                'key' => 'gender',
                                'value' => 'Male',
                                'compare' => '='
                            ),
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'genre',
                                'field'    => 'name',
                                'terms'    => array('JS', 'PHP'),
                                'operator' => 'IN',
                            )
                        )
                    );

                    $posts = new WP_Query($args);
                    if ($posts->have_posts()) {
                        while ($posts->have_posts()) {
                            $posts->the_post();
                    ?>

                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" style="height: 200px; width: 100%;"
                                        src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h1><?php the_title(); ?></h1>
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

                <!-- Pagination -->
                <div class="pagination rounded-active justify-content-center mb-0">
                    <?php
                    get_next_posts_link();
                    $pagination_args = array(
                        'prev_text'     => '&laquo;',
                        'next_text'     => '&raquo;',
                        'type'          => 'list',
                        'format'        => '?paged=%#%',
                        'total'         => $posts->max_num_pages,
                        'current'       => $paged,
                    );

                    $pagination = paginate_links($pagination_args);
                    $pagination = str_replace("<ul class='page-numbers'>", '<ul class="pagination rounded-active justify-content-center mb-0">', $pagination);
                    $pagination = str_replace("<li>", '<li class="page-item">', $pagination);
                    $pagination = str_replace('<a class="page-numbers"', '<a class="page-link"', $pagination);
                    $pagination = str_replace('<a class="next page-numbers"', '<a class="page-link"', $pagination);
                    $pagination = str_replace('<a class="prev page-numbers"', '<a class="page-link"', $pagination);
                    $pagination = str_replace('<li class="page-item"><span aria-current="page" class="page-numbers current">', '<li class="page-item active"><span aria-current="page" class="page-link current">', $pagination);


                    echo $pagination;

                    ?>
                </div>

            </div>
        </div>

    </main>

    <?php get_footer(); ?>