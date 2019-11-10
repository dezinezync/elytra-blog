<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        if ( is_single() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } elseif ( elytra_is_frontpage() ) {
            the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
        } else {
            the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
        }

        if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
                elytra_edit_link();
			echo '</div><!-- .entry-meta -->';
		};
    ?>

    <?php if ( has_post_thumbnail() && '' !== get_the_post_thumbnail() && is_single() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

    <div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elytra' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'elytra' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		elytra_entry_footer();
        echo '<div class="entry-meta">';
        elytra_posted_on();
        echo '</div>';
	}
    else {
        echo '<div class="entry-meta">';
        echo elytra_time_link();
        echo '</div>';
    }
	?>
</article><!-- #post-<?php the_ID(); ?> -->
