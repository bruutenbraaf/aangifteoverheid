<?php

function hvo_scripts()
{
	// Scripts
	wp_enqueue_script('jquery', get_template_directory_uri() . '/bootstrap/js/jquery.min.js', array(), '1.0.0', true);
	wp_enqueue_script('bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);

	// Slick
	wp_enqueue_script('slickslider', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);

	// Scrollmagic
	wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js', array(), '1.0.0', true);
	wp_enqueue_script('ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '1.0.0', true);
	wp_enqueue_script('AnimationGsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('addIndicators', get_template_directory_uri() . '/js/debug.addIndicators.min.js', array(), '1.0.0', true);

	// Custom
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);

	// CSS
	wp_enqueue_style('bootcss', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'hvo_scripts');



/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

?>
	<a class="cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>">
		<span class="count"><?php echo sprintf(WC()->cart->get_cart_contents_count(), WC()->cart->get_cart_contents_count()); ?></span>
		<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M8.62499 21.0833C9.15426 21.0833 9.58332 20.6543 9.58332 20.125C9.58332 19.5957 9.15426 19.1667 8.62499 19.1667C8.09572 19.1667 7.66666 19.5957 7.66666 20.125C7.66666 20.6543 8.09572 21.0833 8.62499 21.0833Z" stroke="#050D51" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M19.1667 21.0833C19.6959 21.0833 20.125 20.6543 20.125 20.125C20.125 19.5957 19.6959 19.1667 19.1667 19.1667C18.6374 19.1667 18.2083 19.5957 18.2083 20.125C18.2083 20.6543 18.6374 21.0833 19.1667 21.0833Z" stroke="#050D51" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M0.958344 0.958344H4.79168L7.36001 13.7904C7.44764 14.2316 7.68767 14.628 8.03807 14.91C8.38848 15.1921 8.82693 15.342 9.27668 15.3333H18.5917C19.0414 15.342 19.4799 15.1921 19.8303 14.91C20.1807 14.628 20.4207 14.2316 20.5083 13.7904L22.0417 5.75001H5.75001" stroke="#050D51" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</a>
<?php
	$fragments['a.cart'] = ob_get_clean();
	return $fragments;
}

// Menu's
function register_my_menus()
{
	register_nav_menus(
		array(
			'main_menu' => __('Hoofd Menu'),
			'socket' => __('Socket Menu'),
		)
	);
}
add_action('init', 'register_my_menus');



// Menu button
add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

function my_wp_nav_menu_items($items, $args)
{

	// get menu
	$menu = wp_get_nav_menu_object($args->menu);


	// modify primary only
	if ($args->theme_location == 'main_menu') {

		// vars
		$knop = get_field('menu_knop', $menu);


		// prepend logo
		$menu_knop = "<li class='btn-navigation'><a href=" . $knop['url'] . " class='nav-btn'>" . $knop['title'] . "</a></li>";


		// append html
		$items = $items . $menu_knop;
	}


	// return
	return $items;
}


// Img sizes

add_image_size('homeheader', 1400, 420, true);


// Widgets

function arphabet_widgets_init()
{

	register_sidebar(array(
		'name'          => 'Footer een',
		'id'            => 'footer_1',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer twee',
		'id'            => 'footer_2',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer drie',
		'id'            => 'footer_3',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}

add_action('widgets_init', 'arphabet_widgets_init');


// Option pages

acf_add_options_page(array(

	'page_title' 	=> 'Hoofd product',
	'menu_title' 	=> 'Hoofd product',
	'menu_slug' 	=> 'hoofdproduct',
	'capability' 	=> 'edit_posts',
	'icon_url' => 'dashicons-cart',
	'position' => 1

));

function change_view_cart($params, $handle)
{
	switch ($handle) {
		case 'wc-add-to-cart':
			$params['i18n_view_cart'] = ""; //chnage Name of view cart button
			$params['cart_url'] = ""; //change URL of view cart button
			break;
	}
	return $params;
}
add_filter('woocommerce_get_script_data', 'change_view_cart', 10, 2);



add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_phone']);
	return $fields;
}
