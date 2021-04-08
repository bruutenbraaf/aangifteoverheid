<?php
get_header(); ?>
<?php $currentArchive  = get_post_type(get_the_ID()); ?>

<?php if (have_rows('header_page')) : ?>
    <?php while (have_rows('header_page')) : the_row(); ?>
        <?php $afbeelding = get_field("advocaten_archive_afbeelding", "option"); ?>
        <section class="page-header">
            <div class="container">
                <div class="page-header-int d-flex align-items-end" <?php if ($afbeelding) { ?>style="background-image:url('<?php echo $afbeelding['sizes']['homeheader']; ?>');" <?php } ?>>
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <?php the_field('' . $currentArchive . '_archive_intro', 'option') ?>
                                <?php if (have_rows('knop')) : ?>
                                    <?php while (have_rows('knop')) : the_row(); ?>
                                        <?php $knop = get_field('' . $currentArchive . '_archive_btn', 'option'); ?>
                                        <?php if ($knop) { ?>
                                            <a href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>">
                                                <?php echo $knop['title']; ?>
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

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php if (1 == $paged) { ?>
    <?php $intro_tekst = get_field("advocaten_archive_tekst", "option"); ?>
    <?php if ($intro_tekst) { ?>
        <section class="overview">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-2 col-lg-8 text-center">
                        <?php echo $intro_tekst; ?>
                        <?php $knopinf = get_field('' . $currentArchive . '_archive_tekst_btn', 'option'); ?>
                        <?php if ($knopinf) { ?>
                            <a class="btn" href="<?php echo $knopinf['url']; ?>" target="<?php echo $knopinf['target']; ?>"><?php echo $knopinf['title']; ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>


<?php if (have_posts()) : ?>
    <section class="lawyers-large overview-lawyers">
        <div class="container">
            <div class="row lawyers-row overview-lawyer-row">
                <div class="offset-lg-1 col-lg-10 col-12">
                    <div class="row">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php $profielfoto = get_field('profielfoto'); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="lawyer d-flex align-items-end" style="background-image:url(<?php echo $profielfoto['sizes']['large']; ?>);">
                                    <div class="lawyer-int ">
                                        <span><?php the_title(); ?></span>
                                        <div class="info">
                                            <?php if (have_rows('socials')) : ?>
                                                <?php while (have_rows('socials')) : the_row(); ?>
                                                    <ul>
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
                                            <a href="<?php the_permalink(); ?>" class="btn">
                                                <?php _e('Lees meer', 'hvo'); ?>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (paginate_links()) { ?>
    <section class="pagenumbers">
        <div class="container">
            <div class="row d-flex">
                <div class="offset-lg-1 col-lg-10 d-flex justify-content-between">
                    <?php previous_posts_link('<span class="btn prev">Toon vorige</span>'); ?>
                    <div class="numbers d-flex align-items-center">
                        <?php echo paginate_links(array(
                            'prev_next' => false
                        )); ?>
                    </div>
                    <?php next_posts_link('<span class="btn next">Toon volgende</span>', $loop->max_num_pages); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>