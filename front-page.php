<?php
get_header(); ?>

<?php if (have_rows('sections')) : ?>
    <?php while (have_rows('sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'hero') : ?>
            <section class="hero">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-6 d-flex align-items-center">
                            <div>
                                <?php the_sub_field('intro_tekst'); ?>
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
                                            <?php if (have_rows('download_knop')) : ?>
                                                <?php while (have_rows('download_knop')) : the_row(); ?>
                                                    <a class="small-btn" href="<?php the_sub_field('bestands_url'); ?>" target="_blanl">
                                                        <?php the_sub_field('link_tekst'); ?>
                                                    </a>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
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
                        <div class="down">
                            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 12.75L17 21.25L25.5 12.75" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'reviews') : ?>
            <?php
            $loop = new WP_Query(array(
                'post_type' => 'recensies',
            ));
            ?>
            <?php if ($loop->have_posts()) : ?>
                <section class="reviews">
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-1 col-md-3 col-sm-3 title">
                                <div class="inner">
                                    <h3><?php the_sub_field('titel'); ?></h3>
                                    <div class="review-dots dots">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-9">
                                <div class="rvws">
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <div class="review">
                                            <?php the_content(); ?>
                                            <div class="person d-flex align-items-center">
                                                <?php $image = get_the_post_thumbnail_url($post, $size = 'thumbnail'); ?>
                                                <img src="<?php echo $image ?>">
                                                <div class="details d-block flex-wrap">
                                                    <span class="name"><?php the_title(); ?></span>
                                                    <span class="detail"><?php the_field('person_details'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <script>
                jQuery(document).ready(function() {
                    jQuery('.rvws').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        fade: true,
                        dots: true,
                        appendDots: '.review-dots',
                        accessibility: false,
                        prevArrow: jQuery('.prev-slide'),
                        nextArrow: jQuery('.next-slide')
                    })
                });
            </script>
        <?php elseif (get_row_layout() == 'text-block') : ?>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-7">
                            <?php the_sub_field('Tekst'); ?>
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
                                                <a class="btn href=" <?php echo $call_to_action_knop['url']; ?>" target="<?php echo $call_to_action_knop['target']; ?>"><?php echo $call_to_action_knop['title']; ?></a>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (have_rows('download_knop')) : ?>
                                            <?php while (have_rows('download_knop')) : the_row(); ?>
                                                <a class="small-btn" href="<?php the_sub_field('bestands_url'); ?>" target="_blanl">
                                                    <?php the_sub_field('link_tekst'); ?>
                                                </a>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'punten_waarom') : ?>
            <section class="points">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-1 col-lg-10">
                            <div class="d-lg-flex flex-wrap bg">
                                <div class="col-lg-3 col-12">
                                    <h3><?php the_sub_field('titel'); ?></h3>
                                    <div class="point-dots dots">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12 point-carrousel">
                                    <?php $count = 0; ?>
                                    <?php if (have_rows('items')) : ?>
                                        <div class="point-items">
                                            <?php $count = 0; ?>
                                            <?php while (have_rows('items')) : the_row(); ?>
                                                <div class="point">
                                                    <?php
                                                    $count++ ?>
                                                    <div class="counter">
                                                        <?php echo $count; ?>.
                                                    </div>
                                                    <?php the_sub_field('content'); ?>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="arrows">
                                    <div class="prev-slide">
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.25 1.5L1.75 10L10.25 18.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="next-slide">
                                        <svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.25 18.5L9.75 10L1.25 1.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                jQuery(document).ready(function() {
                    jQuery('.point-items').slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: false,
                        fade: false,
                        dots: true,
                        appendDots: '.point-dots',
                        accessibility: false,
                        prevArrow: jQuery('.prev-slide'),
                        nextArrow: jQuery('.next-slide'),
                        adaptiveHeight: true,
                        responsive: [{
                            breakpoint: 468,
                            settings: {
                                slidesToShow: 1,
                            }
                        }]
                    })
                });
            </script>
        <?php elseif (get_row_layout() == 'partners') : ?>
            <section class="partners">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center">
                            <h3><?php the_sub_field('titel'); ?></h3>
                            <div class="partners-carrousel">
                                <?php
                                $loop = new WP_Query(array(
                                    'post_type' => 'partners',
                                ));
                                ?>
                                <?php if ($loop->have_posts()) : ?>
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <div class="partner">
                                            <?php $image = get_the_post_thumbnail_url($post, $size = 'thumbnail'); ?>
                                            <a href="<?php the_field('url_naar_website'); ?>" target="_blank">
                                                <img src="<?php echo $image ?>">
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                jQuery(document).ready(function() {
                    jQuery('.partners-carrousel').slick({
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        fade: false,
                        dots: false,
                        appendDots: '.review-dots',
                        accessibility: false,
                        arrows: false,
                        responsive: [{
                            breakpoint: 468,
                            settings: {
                                slidesToShow: 2,
                            }
                        }]
                    })
                });
            </script>
        <?php elseif (get_row_layout() == 'order-the-book') : ?>
            <section class="order">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 bg">
                            <div class="row">
                                <div class="col-md-3 offset-md-1 col-sm-3 text-center text-sm-left">
                                    <?php $afbeelding_boek = get_sub_field('afbeelding_boek'); ?>
                                    <?php if ($afbeelding_boek) { ?>
                                        <img src="<?php echo $afbeelding_boek['url']; ?>" alt="<?php echo $afbeelding_boek['alt']; ?>" />
                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-sm-8 d-flex align-items-center inner-content">
                                    <div class="inner">
                                        <?php the_sub_field('Tekst'); ?>
                                        <?php if (have_rows('call_to_action')) : ?>
                                            <div class="actions d-flex flex-lg-nowrap flex-md-wrap justify-center align-items-center">
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
                                                            <a class="btn href=" <?php echo $call_to_action_knop['url']; ?>" target="<?php echo $call_to_action_knop['target']; ?>"><?php echo $call_to_action_knop['title']; ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if (have_rows('download_knop')) : ?>
                                                        <?php while (have_rows('download_knop')) : the_row(); ?>
                                                            <a class="small-btn" href="<?php the_sub_field('bestands_url'); ?>" target="_blanl">
                                                                <?php the_sub_field('link_tekst'); ?>
                                                            </a>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>