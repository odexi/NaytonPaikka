<?php
/**
 * Created by PhpStorm.
 * User: Otto
 * Date: 7.2.2018
 * Time: 16:27
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <h2><?php echo get_queried_object()->name; ?></h2>
            <?php echo get_queried_object()->description; ?>

            <?php
            $id = get_queried_object()->term_id;
            $tyyppi = get_queried_object()->taxonomy;
            $alikategoriat = get_term_children( $id, $tyyppi);
            foreach ($alikategoriat as $alikategoria):
                $termi = get_term_by('id', $alikategoria, $tyyppi);
                ?>
                <article>
                    <a href="<?php echo get_term_link($alikategoria, $tyyppi); ?>">
                        <?php
                        $artikkelit = get_posts( array('category' => $termi->term_id ));
                        //print_r($artikkelit);
                        ?>
                        <h4><?php echo $termi->name; ?></h4>

                    </a>
                </article>
            <?php endforeach; ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>