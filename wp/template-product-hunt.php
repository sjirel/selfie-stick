<?php
/*
	=================================================
	Selfiestick - Product Hunt Template
	Template Name: Product Hunt
	=================================================
*/
get_header(); ?>





    <div id="hero" class="scroll-point">
        <div class="coupon-promo">
            <div class="coupon-wrap">
                <?php the_content(); ?>
                </div>
            </div>
        <?php query_posts('page_id=7'); while (have_posts()) : the_post(); ?>
        <div class="flexslider banner-slider">
            <?php
            // check if the repeater field has rows of data
            if( have_rows('banner-slider') ){
                ?>
                <ul class="slides">
                    <?php
                    while ( have_rows('banner-slider') ) : the_row();
                        $bannerImage = get_sub_field('banner_image');
                        $bannerTitle = get_sub_field('banner_title');
                        $bannerText = get_sub_field('banner_text');
                        ?>
                        <li> <img src="<?php echo $bannerImage ; ?>" />
                            <div class="wrapper">
                                <div class="banner-details">
                                    <h2><?php echo $bannerTitle ; ?></h2>
                                    <p><?php echo $bannerText ; ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }?>
        </div>
        <a href="#content-block-1" class="banner-link"> Learn More</a> </div>
    <!-- #hero -->
    <div id="content-block-1" class="group" >
        <div class="wrapper">
            <div class="title-group">
                <?php if(get_field('panel_first_heading')){
                    echo'<h3>'.get_field('panel_first_heading').'</h3>';
                }?>
                <?php if(get_field('panel_first_description')){
                    echo'<p>'.get_field('panel_first_description').'</p>';
                }?>
            </div>
            <div class="showcase">
                <figure id="stick-unsretched">
                    <?php
                    $imageOne = get_field('first_image');
                    ?>
                    <img src="<?php echo $imageOne ; ?>" alt="selfie stick unstretched"> </figure>
                <figure id="stick-sretched">
                    <?php
                    $imageTwo = get_field('second_image');
                    ?>
                    <img src="<?php echo $imageTwo ; ?>" alt="selfie stick stretched"> </figure>
                <div class="features-carousel">
                    <?php
                    if( have_rows('features_slider') ){
                        ?>
                        <ul class="slides">
                            <?php
                            $counter=0;
                            while ( have_rows('features_slider') ) : the_row();
                                $featureTitle = get_sub_field('feature_title');
                                $counter++;
                                ?>
                                <li class="item-<?php echo $counter;?>"> <?php echo $featureTitle ;?> </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php }?>
                </div>
            </div>
            <div class="flexslider features-slider">
                <?php
                if( have_rows('features_slider') ){
                    ?>
                    <ul class="slides">
                        <?php
                        while ( have_rows('features_slider') ) : the_row();
                            $featureTitle = get_sub_field('feature_title');
                            $featureDescription = get_sub_field('feature_description');
                            ?>
                            <li>
                                <h4><?php echo $featureTitle ;?></h4>
                                <p><?php echo $featureDescription ;?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php }?>
            </div>
            <div class="features-control">
                <?php
                // check if the repeater field has rows of data
                if( have_rows('features_slider') ){
                    ?>
                    <ul class="slides">
                        <?php
                        while ( have_rows('features_slider') ) : the_row();
                            $featureTitle = get_sub_field('feature_title');
                            ?>
                            <li> <?php echo $featureTitle ;?> </li>
                        <?php endwhile; ?>
                    </ul>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- #content-block-1 -->
    <?php
    $panelSecondHeading = get_field('panel_second_heading');
    $panelSecondDescription = get_field('panel_second_description');
    $parralaxBackground = get_field('parallax_background');
    ?>
    <div id="content-block-2" class="group" style="background-image:url('<?php echo $parralaxBackground ;?>')" data-bottom-top="background-position: 0 0%;" data-top-bottom="background-position: 0 100%;" data-anchor-target="#content-block-2">
        <?php
        $panelSecondHeading = get_field('panel_second_heading');
        $panelSecondDescription = get_field('panel_second_description');
        $parralaxBackground = get_field('parallax_background');
        ?>
        <img src="<?php bloginfo( 'template_url' ); ?>/images/selfie-middle-banner.jpg" alt="<?php $panelSecondHeading ;?>" class="placeholder">
        <div class="block-2-cnt">
            <h4>
                <?php echo $panelSecondHeading ;?>
            </h4>
            <p>
                <?php echo $panelSecondDescription ;?>
            </p>
            <a class="next-section" href="#content-block-3"></a> </div>
    </div>
    <!-- #content-block-2 -->
    <div id="content-block-3">
        <div class="wrapper">
            <?php
            $panelThirdHeading = get_field('panel_third_heading');
            $panelThirdDescription = get_field('panel_thrid_description');
            $modelOneImage = get_field('model_1_image');
            $modelOneDesc = get_field('model_1_description');
            $modelTwoImage = get_field('model_2_image');
            $modelTwoDesc = get_field('model_2_description');
            ?>
            <div class="title-group">
                <h3><?php echo $panelThirdHeading; ?></h3>
                <p><?php echo $panelThirdDescription; ?></p>
            </div>
            <div class="models-showcase group">
                <div class="col-1 col"> <img src="<?php echo $modelOneImage; ?>" alt="Selfie Stick Model 1">
                    <div class="model-desc">
                        <h5>Model 1</h5>
                        <p><?php echo $modelOneDesc; ?></p>
                    </div>
                </div>
                <div class="col-2 col"> <img src="<?php echo $modelTwoImage; ?>" alt="Selfie Stick Model 2">
                    <div class="model-desc">
                        <h5>Model 2</h5>
                        <p><?php echo $modelTwoDesc;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #content-block-3 -->
    <div id="content-block-4">
        <div class="wrapper">
            <?php
            $panelFourthHeading = get_field('panel_fourth_heading');
            $panelFourthDescription = get_field('panel_fourth_description');
            $youtubeVideoId = get_field('youtube_video_id');
            ?>
            <div class="title-group">
                <h3><?php echo $panelFourthHeading; ?></h3>
                <p><?php echo $panelFourthDescription; ?></p>
            </div>
            <div class="video-holder">
                <iframe width="922" height="540" src="//www.youtube.com/embed/<?php echo $youtubeVideoId; ?>" frameborder="0" allowfullscreen></iframe>
            </div>

        </div>
    </div>
    <!-- #content-block-4 -->
    <div id="content-block-5">
        <div class="wrapper">


            <div id="insta-feed">
                <span class="instagram-icon">twitter</span>
                <p>We hope you love the Selfie Stick as much as we do! Remember to tag #Minisuitselfiestick in that perfect selfie or group photos!</p>
                <?php echo do_shortcode('[enjoyinstagram_mb_grid]'); ?> </div>

        </div>
    </div>
    <div id="content-block-6">
        <div class="wrapper">
            <?php  get_sidebar(); ?>
        </div>
    </div>

    <div class="btn-section">
        <?php
        $btnLink = get_field('button_link');
        ?>
        <a target="_blank" class="btn" href="<?php echo $btnLink ; ?>">Buy now</a> </div>


<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>
