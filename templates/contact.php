<!--
    
Template name: Contact

!-->
<?php
get_header(); ?>

<?php if (have_rows('header_page')) : ?>
    <?php while (have_rows('header_page')) : the_row(); ?>
        <?php $afbeelding = get_sub_field('afbeelding'); ?>
        <section class="page-header">
            <div class="container">
                <div class="page-header-int d-flex align-items-end" <?php if ($afbeelding) { ?>style="background-image:url('<?php echo $afbeelding['sizes']['homeheader']; ?>');" <?php } ?>>
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <?php the_sub_field('intro_content'); ?>
                                <?php if (have_rows('knop')) : ?>
                                    <?php while (have_rows('knop')) : the_row(); ?>
                                        <?php $knop_link_tekst = get_sub_field('knop_link_&_tekst'); ?>
                                        <?php if ($knop_link_tekst) { ?>
                                            <a class="btn" href="<?php echo $knop_link_tekst['url']; ?>" target="<?php echo $knop_link_tekst['target']; ?>">
                                                <?php echo $knop_link_tekst['title']; ?>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg></a>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
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

<section class="contact">
    <div class="container">
        <div class="row">
            <?php if (have_rows('contactfomulier')) : ?>
                <div class="offset-lg-1 col-lg-6 order-lg-1 order-2">
                    <?php while (have_rows('contactfomulier')) : the_row(); ?>
                        <?php the_sub_field('informatie'); ?>
                        <?php $form = get_sub_field('formidable_shortcode');
                        echo do_shortcode($form); ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if (have_rows('contactgegevens')) : ?>
                <div class="offset-lg-1 col-lg-3 contact-inf order-lg-2 order-1">
                    <?php while (have_rows('contactgegevens')) : the_row(); ?>
                        <?php the_sub_field('titel'); ?>
                        <span class="adress"><?php the_sub_field('adres'); ?></span>
                        <?php $tel = get_sub_field('telefoonnummer'); ?>
                        <?php $mail =  get_sub_field('e-mailadres'); ?>
                        <?php if ($tel) { ?><a href="<?php echo ($tel); ?>"><?php echo $tel; ?></a><?php } ?>
                        <?php if ($mail) { ?><a href="<?php echo ($mail); ?>"><?php echo $mail; ?></a><?php } ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>