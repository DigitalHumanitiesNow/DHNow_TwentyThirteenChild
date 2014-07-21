<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="featured-post">
				<?php _e( 'Featured post', 'twentytwelve' ); ?>
			</div>
		<?php endif; ?>
		
		<header class="entry-header2">
			<?php the_post_thumbnail('featured-image'); ?>
			
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title2"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class="entry-title2">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php endif; // is_single() ?>
			
		</header><!-- .entry-header -->

		<div class="header_meta">
			By <?php the_author() ?> | <?php echo get_the_date() ?>
		</div>

		<?php if ( is_single() ) : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php else : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_single() ) : 
			$chief = get_post_meta($post->ID, 'editor-in-chief', true);
			$large = get_post_meta($post->ID, 'editors-at-large', true);
				if (!empty($chief)) : ?>
					<div class="editors">
					<p>This content was selected for <em>Digital Humanities Now</em> by Editor-in-Chief <?php echo $chief ?> based on nominations by Editors-at-Large <?php echo $large ?>. </p>
					</div>
			<?php endif; ?>
		<?php endif; ?>
<!--
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
<!--		<?php else : ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
<!--		<?php endif; ?>
-->		
	</article><!-- #post -->
