<?php while (have_posts()) : the_post(); ?>
  <li <?php post_class(); ?>><?php the_title(); ?></li>
<?php endwhile; ?>
