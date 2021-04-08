<?php
get_header(); ?>


<?php if (have_rows('header_page')) : ?>
    <?php while (have_rows('header_page')) : the_row(); ?>
        <?php $afbeelding = get_sub_field('afbeelding'); ?>
        <section class="advocaat-header">
            <div class="container">
                <div class="advocaat-header-int d-flex align-items-end">
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <?php the_sub_field('intro_content'); ?>
                                <?php if (have_rows('socials')) : ?>
                                    <?php while (have_rows('socials')) : the_row(); ?>
                                        <ul class="socials">
                                            <li>
                                                <a href="<?php the_sub_field('mail'); ?>" target="_blank">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php the_sub_field('twitter'); ?>" target="_blank">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23 3.00005C22.0424 3.67552 20.9821 4.19216 19.86 4.53005C19.2577 3.83756 18.4573 3.34674 17.567 3.12397C16.6767 2.90121 15.7395 2.95724 14.8821 3.2845C14.0247 3.61176 13.2884 4.19445 12.773 4.95376C12.2575 5.71308 11.9877 6.61238 12 7.53005V8.53005C10.2426 8.57561 8.50127 8.18586 6.93101 7.39549C5.36074 6.60513 4.01032 5.43868 3 4.00005C3 4.00005 -1 13 8 17C5.94053 18.398 3.48716 19.099 1 19C10 24 21 19 21 7.50005C20.9991 7.2215 20.9723 6.94364 20.92 6.67005C21.9406 5.66354 22.6608 4.39276 23 3.00005V3.00005Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16 8C17.5913 8 19.1174 8.63214 20.2426 9.75736C21.3679 10.8826 22 12.4087 22 14V21H18V14C18 13.4696 17.7893 12.9609 17.4142 12.5858C17.0391 12.2107 16.5304 12 16 12C15.4696 12 14.9609 12.2107 14.5858 12.5858C14.2107 12.9609 14 13.4696 14 14V21H10V14C10 12.4087 10.6321 10.8826 11.7574 9.75736C12.8826 8.63214 14.4087 8 16 8V8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M6 9H2V21H6V9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M4 6C5.10457 6 6 5.10457 6 4C6 2.89543 5.10457 2 4 2C2.89543 2 2 2.89543 2 4C2 5.10457 2.89543 6 4 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php if (have_rows('knop')) : ?>
                                    <?php while (have_rows('knop')) : the_row(); ?>
                                        <?php $knop_link_tekst = get_sub_field('knop_link_&_tekst'); ?>
                                        <?php if ($knop_link_tekst) { ?>
                                            <a class="btn" href="<?php echo $knop_link_tekst['url']; ?>" target="<?php echo $knop_link_tekst['target']; ?>">
                                                <?php echo $knop_link_tekst['title']; ?>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 lawyer-img" <?php if ($afbeelding) { ?>style="background-image:url('<?php echo $afbeelding['sizes']['homeheader']; ?>');" <?php } ?>>
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


<?php if (have_rows('informatie_van_advocaat')) : ?>
    <?php while (have_rows('informatie_van_advocaat')) : the_row(); ?>
        <section class="lawyer-about">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12">
                        <?php the_sub_field('tekst'); ?>
                    </div>
                    <div class="col-lg-4 lawyer-inf text-lg-center text-md-left offset-lg-0 offset-0">
                        <?php $tel = get_sub_field('telefoonnummer'); ?>
                        <?php $mail = get_sub_field('e-mailadres'); ?>
                        <?php if ($mail) { ?><a href="mailto:<?php the_sub_field('e-mailadres'); ?>" class="small"><?php the_sub_field('e-mailadres'); ?></a><?php } ?>
                        <?php if ($tel) { ?>
                            <a href="tel:<?php the_sub_field('telefoonnummer'); ?>" class="btn tel-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.9999 16.92V19.92C22.0011 20.1985 21.944 20.4742 21.8324 20.7294C21.7209 20.9845 21.5572 21.2136 21.352 21.4019C21.1468 21.5901 20.9045 21.7335 20.6407 21.8227C20.3769 21.9119 20.0973 21.9451 19.8199 21.92C16.7428 21.5856 13.7869 20.5342 11.1899 18.85C8.77376 17.3147 6.72527 15.2662 5.18993 12.85C3.49991 10.2412 2.44818 7.271 2.11993 4.18001C2.09494 3.90347 2.12781 3.62477 2.21643 3.36163C2.30506 3.09849 2.4475 2.85669 2.6347 2.65163C2.82189 2.44656 3.04974 2.28271 3.30372 2.17053C3.55771 2.05834 3.83227 2.00027 4.10993 2.00001H7.10993C7.59524 1.99523 8.06572 2.16708 8.43369 2.48354C8.80166 2.79999 9.04201 3.23945 9.10993 3.72001C9.23656 4.68007 9.47138 5.62273 9.80993 6.53001C9.94448 6.88793 9.9736 7.27692 9.89384 7.65089C9.81408 8.02485 9.6288 8.36812 9.35993 8.64001L8.08993 9.91001C9.51349 12.4136 11.5864 14.4865 14.0899 15.91L15.3599 14.64C15.6318 14.3711 15.9751 14.1859 16.3491 14.1061C16.723 14.0263 17.112 14.0555 17.4699 14.19C18.3772 14.5286 19.3199 14.7634 20.2799 14.89C20.7657 14.9585 21.2093 15.2032 21.5265 15.5775C21.8436 15.9518 22.0121 16.4296 21.9999 16.92Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <?php the_sub_field('telefoonnummer'); ?>
                            </a>
                        <?php } ?>
                        <svg class="anchor" width="236" height="321" viewBox="0 0 236 321" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.1">
                                <path d="M118.749 146.424C98.212 146.424 80.7276 139.399 66.296 125.348C51.8644 111.112 44.6486 93.7336 44.6486 73.2121C44.6486 52.6905 51.8644 35.4043 66.296 21.3535C80.7276 7.11784 98.212 0 118.749 0C139.472 0 156.956 7.11784 171.202 21.3535C185.634 35.4043 192.85 52.6905 192.85 73.2121C192.85 93.7336 185.634 111.112 171.202 125.348C156.956 139.399 139.472 146.424 118.749 146.424ZM118.749 102.053C126.89 102.053 133.551 99.3724 138.731 94.011C144.097 88.6495 146.78 81.7165 146.78 73.2121C146.78 64.7076 144.097 57.7747 138.731 52.4132C133.551 47.0517 126.89 44.371 118.749 44.371C110.793 44.371 104.133 47.0517 98.7671 52.4132C93.5865 57.7747 90.9962 64.7076 90.9962 73.2121C90.9962 81.7165 93.5865 88.6495 98.7671 94.011C104.133 99.3724 110.793 102.053 118.749 102.053Z" fill="#20AFFF" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M95.6757 295.506L95.6757 123.421H146.703L146.703 295.506L95.6757 295.506Z" fill="#20AFFF" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M63.7838 155.289H172.216V199.903H63.7838V155.289Z" fill="#20AFFF" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M49.6842 199.903C49.6842 238.623 80.2702 270.012 118 270.012C155.73 270.012 186.316 238.623 186.316 199.903H236C236 266.783 183.17 321 118 321C52.8304 321 0 266.783 0 199.903H49.6842Z" fill="#20AFFF" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php $post_type = get_post_type(get_the_ID()); ?>
<?php $loop = new WP_Query(array(
    'post_type' => $post_type,
    'posts_per_page' => 9,
    'order' => 'DESC',
    'orderby' => 'rand'
)); ?>
<?php if ($loop->have_posts()) : ?>
    <section class="related-lawyers">
        <div class="container">
            <div class="row">
                <div class="offset-md-0 offset-lg-1 col-lg-8 col-md-10 d-flex align-items-center order-lg-1">
                    <h2><?php _e('Onze andere <b>advocaten</b>', 'hvo'); ?></h2>
                </div>
                <div class="col-md-2 d-flex justify-content-lg-end justify-content-start align-items-center order-lg-2 order-3">
                    <div class="lawyer-dots"></div>
                </div>
                <div class="offset-lg-1 col-lg-10 order-lg-3 order-2">
                    <div class="lawyers lawyers-carousel">
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <?php setup_postdata($post); ?>
                            <?php $profielfoto = get_field('profielfoto'); ?>
                            <a href="<?php the_permalink(); ?>" class="lawyer d-flex align-items-end" style="background-image:url(<?php echo $profielfoto['sizes']['large']; ?>);">
                                <span><?php the_title(); ?></span>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="lawyer-int offset-lg-2 col-lg-8">
                    <div class="col-md-11">
                        <?php the_sub_field('informatie'); ?>
                        <?php $button = get_sub_field('button'); ?>
                        <?php if ($button) { ?>
                            <a href="<?php echo $button['url']; ?>" class="btn">
                                <?php echo $button['title']; ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function() {
            jQuery('.lawyers').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoPlay: false,
                dots: true,
                appendDots: '.lawyer-dots',
                accessibility: false,
                prevArrow: jQuery('.prev-slide'),
                nextArrow: jQuery('.next-slide'),
                responsive: [{
                        breakpoint: 1560,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            })
        });
    </script>
<?php endif; ?>

<?php get_footer(); ?>