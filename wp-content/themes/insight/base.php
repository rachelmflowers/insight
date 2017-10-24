<?php

use Roots\ Sage\ Setup;
use Roots\ Sage\ Wrapper;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
    do_action( 'get_header' );
    get_template_part( 'templates/header' );
    ?>
    <div class="wrap container" role="document">
        <nav class="nav__secondary">
            <?php
            $page_template = get_page_template_slug();
            if ( is_page() ) {
                echo wp_nav_menu( [ 'theme_location' => 'home_navigation', 'menu_class' => 'nav' ] );
            } else {
                $cat = "";
                $cats = get_the_category();
                if ($cats) {
                    $cat = strtolower($cats[0]->name);
                    echo wp_nav_menu( [ 'theme_location' => $cat . '_navigation', 'menu_class' => 'nav' ] );
                }
            } 
            ?>
        </nav>
        <!-- /.page-nav -->
        <div class="content row">
            
            <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside>
            <!-- /.sidebar -->
            <?php endif; ?>
            
            <main class="main">
                <?php include Wrapper\template_path(); ?>
            </main>
            <!-- /.main -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.wrap -->
    <?php
    do_action( 'get_footer' );
    get_template_part( 'templates/footer' );
    wp_footer();
    ?>
</body>

</html>