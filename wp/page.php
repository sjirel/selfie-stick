<?php
/*
	=================================================
	Selfiestick - Default Page Template
	=================================================
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-content">
    <div class="wrapper group">
        <?php the_content() ; ?>
    </div>
</div>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
