<?php get_header(); ?>
<div class="content-row">
    <?php get_sidebar(); ?>
    <main>
        <h2><?php echo get_queried_object()->name; ?></h2>

        <?php
        $id = get_queried_object()->term_id;
        $artikkelit = get_posts( array('category' => $id, 'numberposts' => 999));

        foreach ($artikkelit as $artikkeli):
            ?>
            <article>
                <a href="<?php echo get_permalink( $artikkeli->ID ); ?>">
                    <?php echo get_the_post_thumbnail( $artikkeli->ID, 'thumbnail'); ?>
                    <h4><?php echo $artikkeli->post_title; ?></h4>
                </a>
            </article>
        <?php endforeach; ?>
    </main>
</div>
<?php
get_footer();
?>