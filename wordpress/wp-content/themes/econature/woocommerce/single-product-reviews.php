<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * 
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.4.5
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

$ratings_enabled = false;

if (
	(
		function_exists('wc_review_ratings_enabled') && 
		wc_review_ratings_enabled()
	) || 
	get_option( 'woocommerce_enable_review_rating' ) === 'yes'
) {
	$ratings_enabled = true;
}

?>
<div id="reviews">
	<div id="comments">
		<?php cmsms_woocommerce_rating('cmsms-icon-star-empty', 'cmsms-icon-star-1'); ?>
		<h2>
			<?php
			$count = $product->get_review_count();
			if ( $count && $ratings_enabled ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'econature' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				esc_html_e( 'Reviews', 'econature' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<div class="cmsms_wrap_pagination">';
				paginate_comments_links( 
					apply_filters(
						'woocommerce_comment_pagination_args', 
						array(
							'prev_text' => '<span class="cmsms_prev_arrow"><span></span></span>',
							'next_text' => '<span class="cmsms_next_arrow"><span></span></span>',
							'type'      => 'list',
						)
					)
				);
				echo '</div>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'econature' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'          => have_comments() ? esc_html__( 'Add a review', 'econature' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'econature' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'econature' ),
					'comment_notes_before' => '',
					'comment_notes_after'  => '',
					'id_form'              => 'commentform',
					'id_submit'            => 'submit',
					'fields'               => array(
						'author' => '<p class="comment-form-author">' . "\n" . 
							'<label for="author">' . __( 'Name', 'econature' ) . ' <span class="required">*</span></label> ' . 
							'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" />' . 
						'</p>' . "\n", 
						'email' => '<p class="comment-form-email">' . "\n" . 
							'<label for="email">' . __( 'Email', 'econature' ) . ' <span class="required">*</span></label> ' .
							'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" />' . 
						'</p>' . "\n",
					),
					'label_submit'  => esc_html__( 'Submit', 'econature' ),
					'logged_in_as'  => '',
					'comment_field' => '',
				);

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a review.', 'econature' ), esc_url( $account_page_url ) ) . '</p>';
				}

				if ( $ratings_enabled ) {
					$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'econature' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'econature' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'econature' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'econature' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'econature' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'econature' ) . '</option>
						<option value="1">' . esc_html__( 'Very Poor', 'econature' ) . '</option>
					</select></p>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment">' . 
					'<label for="comment">' . esc_html__( 'Your Review', 'econature' ) . '</label>' . 
					'<textarea id="comment" name="comment" cols="45" rows="8" required></textarea>' . 
				'</p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'econature' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
