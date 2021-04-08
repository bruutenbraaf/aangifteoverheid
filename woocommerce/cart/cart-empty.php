<?php

/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

wc_print_notices();

/**
 * @hooked wc_empty_cart_message - 10
 */
do_action('woocommerce_cart_is_empty');

if (wc_get_page_id('shop') > 0) : ?>

	<?php $pageID = get_option('page_on_front');  ?>
	<?php if (have_rows('sections', $pageID)) : ?>
		<?php while (have_rows('sections', $pageID)) : the_row(); ?>
			<?php if (get_row_layout() == 'hero') : ?>
				<section class="hero">
					<div class="container">
						<div class="row">
							<div class="offset-lg-1 col-lg-6 d-flex align-items-center">
								<div>
									<h1><?php _e('Uw winkelmand is nog leeg', 'ao'); ?></h1>
										<?php if (have_rows('call_to_action')) : ?>
											<div class="actions d-flex justify-center align-items-center">
												<?php while (have_rows('call_to_action')) : the_row(); ?>
													<?php if (get_sub_field('maak_bestelknop') == 1) { ?>
														<?php $hoofdproduct = get_field('hoofdproduct', 'option'); ?>
														<?php if ($hoofdproduct) : ?>
															<?php foreach ($hoofdproduct as $post) :  ?>
																<?php setup_postdata($post); ?>
																<?php $product = wc_get_product($post); ?>
																<a class="button product_type_simple add_to_cart_button ajax_add_to_cart addCart" href="<?php echo $product->add_to_cart_url() ?>" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>">
																	<svg width=" 25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M6.5 2.5L3.5 6.5V20.5C3.5 21.0304 3.71071 21.5391 4.08579 21.9142C4.46086 22.2893 4.96957 22.5 5.5 22.5H19.5C20.0304 22.5 20.5391 22.2893 20.9142 21.9142C21.2893 21.5391 21.5 21.0304 21.5 20.5V6.5L18.5 2.5H6.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M3.5 6.5H21.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																		<path d="M16.5 10.5C16.5 11.5609 16.0786 12.5783 15.3284 13.3284C14.5783 14.0786 13.5609 14.5 12.5 14.5C11.4391 14.5 10.4217 14.0786 9.67157 13.3284C8.92143 12.5783 8.5 11.5609 8.5 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
																	</svg>
																	<?php the_sub_field('bestelknop_tekst'); ?>
																</a>
															<?php endforeach; ?>
															<?php wp_reset_postdata(); ?>
														<?php endif; ?>
													<?php } else { ?>
														<?php $call_to_action_knop = get_sub_field('call_to_action_knop'); ?>
														<?php if ($call_to_action_knop) { ?>
															<a class="btn" href="<?php echo $call_to_action_knop['url']; ?>" target="<?php echo $call_to_action_knop['target']; ?>"><?php echo $call_to_action_knop['title']; ?></a>
														<?php } ?>
													<?php } ?>
													<a class="small-btn" href="<?php echo get_home_url(); ?>"><?php _e('Keer terug naar homepagina', 'ao'); ?></a>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-4 text-right d-none d-sm-block">
								<?php $afbeelding = get_sub_field('afbeelding'); ?>
								<?php if ($afbeelding) { ?>
									<img class="hero-img" src="<?php echo $afbeelding['sizes']['large']; ?>" alt="<?php echo $afbeelding['alt']; ?>" />
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

<?php endif; ?>