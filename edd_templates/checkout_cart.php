<?php
/**
 *  This template is used to display the Checkout page when items are in the cart
 */

global $post; ?>
<div class="edd_cart_container">
	<h3><?php _e( 'Order Summary', 'easy-digital-downloads' ); ?></h3>
	<table id="edd_checkout_cart" <?php if ( ! edd_is_ajax_disabled() ) { echo 'class="ajaxed"'; } ?>>
		<thead>
			<tr class="edd_cart_header_row">
				<?php do_action( 'edd_checkout_table_header_first' ); ?>
				<th class="edd_cart_item_name"><?php _e( 'Plan Name', 'easy-digital-downloads' ); ?></th>
				<th class="edd_cart_item_price"><?php _e( 'Plan Amount', 'easy-digital-downloads' ); ?></th>
				<th class="edd_cart_actions"><?php _e( 'Actions', 'easy-digital-downloads' ); ?></th>
				<?php do_action( 'edd_checkout_table_header_last' ); ?>
			</tr>
		</thead>
		<tbody>
			<?php $cart_items = edd_get_cart_contents(); ?>
			<?php do_action( 'edd_cart_items_before' ); ?>
			<?php if ( $cart_items ) : ?>
				<?php foreach ( $cart_items as $key => $item ) : ?>
					<tr class="edd_cart_item" id="edd_cart_item_<?php echo esc_attr( $key ) . '_' . esc_attr( $item['id'] ); ?>" data-download-id="<?php echo esc_attr( $item['id'] ); ?>">
						<?php do_action( 'edd_checkout_table_body_first', $item ); ?>
						<td class="edd_cart_item_name">
							<?php
								if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $item['id'] ) ) {
									echo '<div class="edd_cart_item_image">';
										echo get_the_post_thumbnail( $item['id'], apply_filters( 'edd_checkout_image_size', array( 25,25 ) ) );
									echo '</div>';
								}
								$item_title = edd_get_cart_item_name( $item );
								echo '<span class="edd_checkout_cart_item_title">' . esc_html( $item_title ) . '</span>';

								/**
								 * Runs after the item in cart's title is echoed
								 * @since 2.6
								 *
								 * @param array $item Cart Item
								 * @param int $key Cart key
								 */
								do_action( 'edd_checkout_cart_item_title_after', $item, $key );
							?>
						</td>
						<td class="edd_cart_item_price">
							<?php
							echo edd_cart_item_price( $item['id'], $item['options'] );
							do_action( 'edd_checkout_cart_item_price_after', $item );
							?>
						</td>
						<td class="edd_cart_actions">
							<?php if( edd_item_quantities_enabled() && ! edd_download_quantities_disabled( $item['id'] ) ) : ?>
								<input type="number" min="1" step="1" name="edd-cart-download-<?php echo $key; ?>-quantity" data-key="<?php echo $key; ?>" class="edd-input edd-item-quantity" value="<?php echo edd_get_cart_item_quantity( $item['id'], $item['options'] ); ?>"/>
								<input type="hidden" name="edd-cart-downloads[]" value="<?php echo $item['id']; ?>"/>
								<input type="hidden" name="edd-cart-download-<?php echo $key; ?>-options" value="<?php echo esc_attr( json_encode( $item['options'] ) ); ?>"/>
							<?php endif; ?>
							<?php do_action( 'edd_cart_actions', $item, $key ); ?>
							<a class="edd_cart_remove_item_btn" href="<?php echo esc_url( wp_nonce_url( edd_remove_item_url( $key ), 'edd-remove-from-cart-' . $key, 'edd_remove_from_cart_nonce' ) ); ?>"><?php _e( 'Remove', 'easy-digital-downloads' ); ?></a>
						</td>
						<?php do_action( 'edd_checkout_table_body_last', $item ); ?>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php do_action( 'edd_cart_items_middle' ); ?>
			<!-- Show any cart fees, both positive and negative fees -->
			<?php if( edd_cart_has_fees() ) : ?>
				<?php foreach( edd_get_cart_fees() as $fee_id => $fee ) : ?>
					<tr class="edd_cart_fee" id="edd_cart_fee_<?php echo $fee_id; ?>">

						<?php do_action( 'edd_cart_fee_rows_before', $fee_id, $fee ); ?>

						<td class="edd_cart_fee_label"><?php echo esc_html( $fee['label'] ); ?></td>
						<td class="edd_cart_fee_amount"><?php echo esc_html( edd_currency_filter( edd_format_amount( $fee['amount'] ) ) ); ?></td>
						<td>
							<?php if( ! empty( $fee['type'] ) && 'item' == $fee['type'] ) : ?>
								<a href="<?php echo esc_url( edd_remove_cart_fee_url( $fee_id ) ); ?>"><?php _e( 'Remove', 'easy-digital-downloads' ); ?></a>
							<?php endif; ?>

						</td>

						<?php do_action( 'edd_cart_fee_rows_after', $fee_id, $fee ); ?>

					</tr>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php do_action( 'edd_cart_items_after' ); ?>
		</tbody>
		<tfoot>

			<?php if( has_action( 'edd_cart_footer_buttons' ) ) : ?>
				<tr class="edd_cart_footer_row<?php if ( edd_is_cart_saving_disabled() ) { echo ' edd-no-js'; } ?>">
					<th colspan="<?php echo edd_checkout_cart_columns(); ?>">
						<?php do_action( 'edd_cart_footer_buttons' ); ?>
					</th>
				</tr>
			<?php endif; ?>

			<?php if( edd_use_taxes() && ! edd_prices_include_tax() ) : ?>
				<tr class="edd_cart_footer_row edd_cart_subtotal_row"<?php if ( ! edd_is_cart_taxed() ) echo ' style="display:none;"'; ?>>
					<?php do_action( 'edd_checkout_table_subtotal_first' ); ?>
					<th colspan="<?php echo edd_checkout_cart_columns(); ?>" class="edd_cart_subtotal">
						<?php _e( 'Subtotal', 'easy-digital-downloads' ); ?>:&nbsp;<span class="edd_cart_subtotal_amount"><?php echo edd_cart_subtotal(); ?></span>
					</th>
					<?php do_action( 'edd_checkout_table_subtotal_last' ); ?>
				</tr>
			<?php endif; ?>

			<tr class="edd_cart_footer_row edd_cart_discount_row" <?php if( ! edd_cart_has_discounts() )  echo ' style="display:none;"'; ?>>
				<?php do_action( 'edd_checkout_table_discount_first' ); ?>
				<th colspan="<?php echo edd_checkout_cart_columns(); ?>" class="edd_cart_discount">
					<?php edd_cart_discounts_html(); ?>
				</th>
				<?php do_action( 'edd_checkout_table_discount_last' ); ?>
			</tr>

			<?php if( edd_use_taxes() ) : ?>
				<tr class="edd_cart_footer_row edd_cart_tax_row"<?php if( ! edd_is_cart_taxed() ) echo ' style="display:none;"'; ?>>
					<?php do_action( 'edd_checkout_table_tax_first' ); ?>
					<th colspan="<?php echo edd_checkout_cart_columns(); ?>" class="edd_cart_tax">
						<?php _e( 'Tax', 'easy-digital-downloads' ); ?>:&nbsp;<span class="edd_cart_tax_amount" data-tax="<?php echo edd_get_cart_tax( false ); ?>"><?php echo esc_html( edd_cart_tax() ); ?></span>
					</th>
					<?php do_action( 'edd_checkout_table_tax_last' ); ?>
				</tr>

			<?php endif; ?>

			<tr class="edd_cart_footer_row">
				<?php do_action( 'edd_checkout_table_footer_first' ); ?>
				<th colspan="<?php echo edd_checkout_cart_columns(); ?>" class="edd_cart_total"><?php _e( 'Total', 'easy-digital-downloads' ); ?>: <span class="edd_cart_amount" data-subtotal="<?php echo edd_get_cart_subtotal(); ?>" data-total="<?php echo edd_get_cart_total(); ?>"><?php edd_cart_total(); ?></span></th>
				<?php do_action( 'edd_checkout_table_footer_last' ); ?>
			</tr>
		</tfoot>
	</table>
	<div class="money_back_guarantee">
		<img src="https://www.blockvisibilitywp.com/wp-content/uploads/2021/07/30-Day-Refund-Guarantee-Black.png" />
		<div>You're purchase is fully protected by our no-risk 30-day money-back guarantee.</div>
	</div>
	<div class="secure_payments">
		<p><span class="material-icons-outlined">lock</span> 100% Secure Credit Card Payments</p>
		<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 34"><title>Powered by Stripe - black</title><path d="M146,0H3.73A3.73,3.73,0,0,0,0,3.73V30.27A3.73,3.73,0,0,0,3.73,34H146a4,4,0,0,0,4-4V4A4,4,0,0,0,146,0Zm3,30a3,3,0,0,1-3,3H3.73A2.74,2.74,0,0,1,1,30.27V3.73A2.74,2.74,0,0,1,3.73,1H146a3,3,0,0,1,3,3Z"/><path d="M17.07,11.24h-4.3V22h1.92V17.84h2.38c2.4,0,3.9-1.16,3.9-3.3S19.47,11.24,17.07,11.24Zm-.1,5H14.69v-3.3H17c1.38,0,2.11.59,2.11,1.65S18.35,16.19,17,16.19Z"/><path d="M25.1,14a3.77,3.77,0,0,0-3.8,4.09,3.81,3.81,0,1,0,7.59,0A3.76,3.76,0,0,0,25.1,14Zm0,6.67c-1.22,0-2-1-2-2.58s.76-2.58,2-2.58,2,1,2,2.58S26.31,20.66,25.1,20.66Z"/><polygon points="36.78 19.35 35.37 14.13 33.89 14.13 32.49 19.35 31.07 14.13 29.22 14.13 31.59 22.01 33.15 22.01 34.59 16.85 36.03 22.01 37.59 22.01 39.96 14.13 38.18 14.13 36.78 19.35"/><path d="M44,14a3.83,3.83,0,0,0-3.75,4.09,3.79,3.79,0,0,0,3.83,4.09A3.47,3.47,0,0,0,47.49,20L46,19.38a1.78,1.78,0,0,1-1.83,1.26A2.12,2.12,0,0,1,42,18.47h5.52v-.6C47.54,15.71,46.32,14,44,14Zm-1.93,3.13A1.92,1.92,0,0,1,44,15.5a1.56,1.56,0,0,1,1.69,1.62Z"/><path d="M50.69,15.3V14.13h-1.8V22h1.8V17.87a1.89,1.89,0,0,1,2-2,4.68,4.68,0,0,1,.66,0v-1.8c-.14,0-.3,0-.51,0A2.29,2.29,0,0,0,50.69,15.3Z"/><path d="M57.48,14a3.83,3.83,0,0,0-3.75,4.09,3.79,3.79,0,0,0,3.83,4.09A3.47,3.47,0,0,0,60.93,20l-1.54-.59a1.78,1.78,0,0,1-1.83,1.26,2.12,2.12,0,0,1-2.1-2.17H61v-.6C61,15.71,59.76,14,57.48,14Zm-1.93,3.13a1.92,1.92,0,0,1,1.92-1.62,1.56,1.56,0,0,1,1.69,1.62Z"/><path d="M67.56,15a2.85,2.85,0,0,0-2.26-1c-2.21,0-3.47,1.85-3.47,4.09s1.26,4.09,3.47,4.09a2.82,2.82,0,0,0,2.26-1V22h1.8V11.24h-1.8Zm0,3.35a2,2,0,0,1-2,2.28c-1.31,0-2-1-2-2.52s.7-2.52,2-2.52c1.11,0,2,.81,2,2.29Z"/><path d="M79.31,14A2.88,2.88,0,0,0,77,15V11.24h-1.8V22H77v-.83a2.86,2.86,0,0,0,2.27,1c2.2,0,3.46-1.86,3.46-4.09S81.51,14,79.31,14ZM79,20.6a2,2,0,0,1-2-2.28v-.47c0-1.48.84-2.29,2-2.29,1.3,0,2,1,2,2.52S80.25,20.6,79,20.6Z"/><path d="M86.93,19.66,85,14.13H83.1L86,21.72l-.3.74a1,1,0,0,1-1.14.79,4.12,4.12,0,0,1-.6,0v1.51a4.62,4.62,0,0,0,.73.05,2.67,2.67,0,0,0,2.78-2l3.24-8.62H88.82Z"/><path d="M125,12.43a3,3,0,0,0-2.13.87l-.14-.69h-2.39V25.53l2.72-.59V21.81a3,3,0,0,0,1.93.7c1.94,0,3.72-1.59,3.72-5.11C128.71,14.18,126.91,12.43,125,12.43Zm-.65,7.63a1.61,1.61,0,0,1-1.28-.52l0-4.11a1.64,1.64,0,0,1,1.3-.55c1,0,1.68,1.13,1.68,2.58S125.36,20.06,124.35,20.06Z"/><path d="M133.73,12.43c-2.62,0-4.21,2.26-4.21,5.11,0,3.37,1.88,5.08,4.56,5.08a6.12,6.12,0,0,0,3-.73V19.64a5.79,5.79,0,0,1-2.7.62c-1.08,0-2-.39-2.14-1.7h5.38c0-.15,0-.74,0-1C137.71,14.69,136.35,12.43,133.73,12.43Zm-1.47,4.07c0-1.26.77-1.79,1.45-1.79s1.4.53,1.4,1.79Z"/><path d="M113,13.36l-.17-.82h-2.32v9.71h2.68V15.67a1.87,1.87,0,0,1,2.05-.58V12.54A1.8,1.8,0,0,0,113,13.36Z"/><path d="M99.46,15.46c0-.44.36-.61.93-.61a5.9,5.9,0,0,1,2.7.72V12.94a7,7,0,0,0-2.7-.51c-2.21,0-3.68,1.18-3.68,3.16,0,3.1,4.14,2.6,4.14,3.93,0,.52-.44.69-1,.69a6.78,6.78,0,0,1-3-.9V22a7.38,7.38,0,0,0,3,.64c2.26,0,3.82-1.15,3.82-3.16C103.62,16.12,99.46,16.72,99.46,15.46Z"/><path d="M107.28,10.24l-2.65.58v8.93a2.77,2.77,0,0,0,2.82,2.87,4.16,4.16,0,0,0,1.91-.37V20c-.35.15-2.06.66-2.06-1V15h2.06V12.66h-2.06Z"/><polygon points="116.25 11.7 118.98 11.13 118.98 8.97 116.25 9.54 116.25 11.7"/><rect x="116.25" y="12.61" width="2.73" height="9.64"/></svg>
	</div>
</div>
