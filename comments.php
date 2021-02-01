<?php
/**
 * The template for displaying comments
 *
 * Ideally this would all be configured in the FSE, but that is not currently
 * available
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package outermost
 */

/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

// You can start editing here -- including this comment!
if ( have_comments() ) :
	?>
	<h2 class="comments-title"><?php esc_html_e( 'Comments', 'outermost' ); ?></h2>

	<?php the_comments_navigation(); ?>

	<ol class="comment-list"><?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?></ol>

	<?php
	the_comments_navigation();

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'outermost' ); ?></p>
		<?php
	endif;

endif; // Check for have_comments().

comment_form();
