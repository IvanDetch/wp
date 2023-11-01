<?php
/**
 * The Single Post content template file.
 *
 * @package ThinkUpThemes
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="breadcrumbs">
			<?php echo wpcourses_breadcrumb( ' / ' ); ?>
			
			<div class="container">
				<div class="row-info-title">
					<div class="br-title-page"><?php the_title(); ?></div>
					<div class="date-single-post"><?php the_date('j F Y'); ?></div>		
				</div>
			</div>
		</div>

		<div class="entry-content">
			<div class="row">
				<div class="to_single_news-col">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'melos' ), 'after'  => '</div>', ) ); ?>
				</div>
				<div class="to_single_news-col-2">
					<?php /* Sidebar */ thinkup_sidebar_html(); ?>
				</div>
			</div>
		</div><!-- .entry-content -->

		</article>

		<div class="clearboth"></div>
