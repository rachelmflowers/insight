<header class="banner">
    <div class="nav__constant">
        <div class="container">
            <span class="contact-phone">
                <strong><span class="text">Contact us today!</span><i class="fa fa-phone"></i>
                    <a href="tel:18001234567">877.827.1414</a>
                </strong>
            </span>
            
            <a class="contact-email" href="mailto:email@email.com">
                <i class="fa fa-envelope"></i>
            </a>
            
            <a class="contact-social" href="">
                <i class="fa fa-linkedin-square"></i>
            </a>
            
            <?php get_search_form(); ?>
        </div>
    </div>
    <div class="container">
        <?php
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } else {
            ?>
            <a class="brand" href="<?= esc_url(home_url('/')); ?>">
                <?= bloginfo('name'); ?>
            </a>
            <?php
        }
        ?>
        <button type="button" class="nav-trigger dl-trigger dl-active"><i class="fa fa-reorder"></i></button>

        <?php
        if ( has_nav_menu( 'primary_navigation' ) ) :
            ?>
            <nav class="nav__primary">
                <?php wp_nav_menu( [ 'theme_location' => 'primary_navigation', 'menu_class' => 'nav' ] ); ?>
            </nav>
            <?php
        endif;

        if ( has_nav_menu( 'mobile_navigation' ) ) :
            ?>
            <nav class="nav__mobile">
                <?php wp_nav_menu( [ 'theme_location' => 'mobile_navigation', 'menu_class' => 'nav' ] ); ?>
            </nav>
            <?php
        endif;
        ?>
    </div>
</header>