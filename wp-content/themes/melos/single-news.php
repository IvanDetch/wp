<?php
/**
 * The Template for displaying all single-news posts.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', 'single-news' ); ?>

    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'melos' ), 'after'  => '</div>', ) ); ?>

<?php endwhile; wp_reset_postdata(); ?>

<?php get_footer(); ?>
