<?php
/*
	=================================================
	Selfiestick - Default Page Template
	Template Name: Selfie Gallery
	=================================================
*/
get_header();
global $post;
?>
    <div class="page-content">
        <div class="wrapper group">

           <div class="main-content col">
               <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                   <div class="intro">
                           <?php the_content() ; ?>
                   </div>
               <?php endwhile; endif; ?>
               <?php
               global $wp_query;
               $args = array( 'post_type' => 'userphoto', 'order' => 'ASC' ,'showposts' => -1 );
               query_posts($args);
               while (have_posts()) : the_post();

                   ?>


                   <div class="selfie-item">

                           <h4><?php the_title(); ?></h4>
                   <?php if(has_post_thumbnail()) {?>
                       <figure class="img-holder">

                                   <?php the_post_thumbnail('full'); ?>


                            </figure>
                   <?php } ?>


                   </div>

               <?php endwhile; wp_reset_query(); ?>
           </div>
            <?php get_sidebar('page');?>
        </div>
    </div>

<?php get_footer(); ?>