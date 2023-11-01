<?php
/**
 * The template for displaying Archive-news pages.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

<?php if( have_posts() ): ?>

    <div id="container">
        <div class="breadcrumbs">
            <?php echo wpcourses_breadcrumb_arc( ' / ' ); ?>
            <div class="row-info-title">
                <div class="br-title-page"><?php echo get_the_archive_title(); ?></div>
            </div>
        </div>

        <div class="news-block-inside">
				
            <?php while( have_posts() ): the_post(); ?>

			<?php 
			$terms = get_the_terms( $post->ID, 'news_tag' );
			$term = array_shift( $terms );		
			?>
				<div class="simple-news-el <?php echo $term->name ?>">						
						
					<div class="item-badge <?php echo $term->name ?>">
							<span>
							</span>
                    </div>
                    <div class="exc-news-date"><?php the_date('j F Y'); ?></div>
                    <div class="exc-action-name"><?php the_title(); ?></div>

                    <div class="news-plitka-background"><?php echo get_the_post_thumbnail( $post->ID, 'medium'); ?></div>
                    <a class="news-plitka-el-href" href="<?php echo get_permalink(); ?>"></a>

                    <div class="clearboth"></div>

                </div>

            <?php endwhile; ?>
        </div>
    </div><div class="clearboth"></div>

    <?php the_posts_pagination(); ?>

<?php else: ?>

    <?php get_template_part( 'no-results', 'archive-news' ); ?>

<?php endif; wp_reset_postdata(); ?>

<?php get_footer() ?>