<!--
    
Template name: Claim indienen

-->

<?php
get_header(); ?>



<?php if (have_rows('header_claim')) : ?>
    <?php while (have_rows('header_claim')) : the_row(); ?>
        <?php $afbeelding = get_sub_field('afbeelding'); ?>
        <section class="page-header">
            <div class="container">
                <div class="page-header-int d-flex align-items-end" <?php if ($afbeelding) { ?>style="background-image:url('<?php echo $afbeelding['sizes']['homeheader']; ?>');" <?php } ?>>
                    <div class="inner">
                        <div class="row">
                            <div class="col-8">
                                <?php $information = get_sub_field('Informatie'); ?>
                                <?php if ($information) { ?>
                                    <?php the_sub_field('Informatie'); ?>
                                <?php } else { ?>
                                    <h1><?php _e('Schade<br><b>aanmelden.</b>', 'hvo'); ?></h1>
                                <?php } ?>
                                <a class="btn" href="#claim"><?php _e('Direct schade aanmelden', 'hvo'); ?>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19 12L12 19L5 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row d-flex justify-content-start align-items-center">
                        <div class="offset-lg-1 col-lg-10">
                            <?php if (function_exists('yoast_breadcrumb')) {
                                yoast_breadcrumb('');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>


<?php if (have_rows('claim_indienen')) : ?>
    <?php while (have_rows('claim_indienen')) : the_row(); ?>
        <section class="hp-about">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="offset-md-1 col-lg-8">
                        <?php the_sub_field('informatie_tekst'); ?>
                        <?php $button = get_sub_field('knop'); ?>
                        <?php if ($button) { ?>
                            <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn"><?php echo $button['title']; ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php if (have_rows('formulier')) : ?>
            <?php while (have_rows('formulier')) : the_row(); ?>
                <section class="claim" id="claim">
                    <div class="container">
                        <div class="offset-lg-1 col-lg-8 claim-form">
                            <?php the_sub_field('titel_en_eventuele_informatie'); ?>
                            <?php $form = get_sub_field('formidable_shortcode');
                            echo do_shortcode($form); ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>


<?php if (get_field('toon_recensies') == 1) { ?>
    <?php $post_type = get_post_type(get_the_ID()); ?>
    <?php $loop = new WP_Query(array(
        'post_type' => 'recensies',
        'posts_per_page' => 9,
        'order' => 'DESC',
        'orderby' => 'rand'
    )); ?>
    <?php if ($loop->have_posts()) : ?>
        <section class="reviews">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-7">
                        <?php the_field('recensies_informatie'); ?>
                    </div>
                    <div class="offset-lg-1 col-lg-9">
                        <div class="reviews-s">
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div class="review d-flex align-items-center">
                                    <?php $profielfoto = get_field('profielfoto'); ?>
                                    <?php if ($profielfoto) { ?>
                                        <div class="avatar" style="background-image:url(<?php echo $profielfoto['sizes']['medium']; ?>)">
                                        </div>
                                    <?php } else { ?>
                                        <div class="avatar no-pic d-flex justify-content-center align-items-center">
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M33.3334 35V31.6667C33.3334 29.8986 32.631 28.2029 31.3807 26.9526C30.1305 25.7024 28.4348 25 26.6667 25H13.3334C11.5652 25 9.86955 25.7024 8.61931 26.9526C7.36907 28.2029 6.66669 29.8986 6.66669 31.6667V35" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M20 18.3333C23.6819 18.3333 26.6666 15.3486 26.6666 11.6667C26.6666 7.98477 23.6819 5 20 5C16.3181 5 13.3333 7.98477 13.3333 11.6667C13.3333 15.3486 16.3181 18.3333 20 18.3333Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    <?php } ?>
                                    <div class="information">
                                        <span class="name"><?php the_title(); ?></span>
                                        <span class="company"><?php the_field('eigenaar_bedrijf'); ?></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function() {
                            jQuery('.reviews-s').slick({
                                infinite: true,
                                slidesToShow: 3,
                                dots: false,
                                autoplay: true,
                                autoplaySpeed: 4000,
                                fade: false,
                                arrows: false,
                                accessibility: false,
                                responsive: [{
                                        breakpoint: 1560,
                                        settings: {
                                            slidesToShow: 3,
                                        }
                                    },
                                    {
                                        breakpoint: 991,
                                        settings: {
                                            slidesToShow: 2,
                                        }
                                    },
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            slidesToShow: 1,
                                        }
                                    }
                                ]
                            })
                        });
                    </script>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php } ?>
<?php get_footer(); ?>