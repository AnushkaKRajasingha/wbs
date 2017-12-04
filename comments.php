<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="section-comments">
    <div class="h2 black">Comments</div>
    <div class="comments-wrap">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : wp_list_comments( array(
					'callback' => 'wbs_custom_comment_list'
				) );
	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'wbs' ); ?></p>
	<?php
	endif;
    echo apply_filters('wbs_comment_form',array());
	?>
</div>
</div><!-- #comments -->

