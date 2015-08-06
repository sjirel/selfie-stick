<?php
/*
	=================================================
	Mount Barker - Default Blog Template
	=================================================
*/
get_header(); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-post' ); ?> role="article">
            <h2 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<div class="post-content">
				<?php if(has_post_thumbnail()) {?> 
					<figure class="alignleft left-mar-mid shadow-effect">
						<a href="<?php the_permalink();?>">
							<?php the_post_thumbnail('blog-thumb');?>
						</a>
				   </figure>
					
               	<?php }; ?> 
				<div class="txt-area">
					<div class="post-meta"><?php the_time( 'F j, Y' ) ?> | <?php printf(__('Categories: %s'), get_the_category_list(', ')); ?></div>
				<?php the_excerpt(); ?>
			<a href="<?php the_permalink();?>">Read More</a>
				</div>
			</div>
			
		</article>
		<?php endwhile; endif; ?>
		<div class="page-nav">
			<div class="alignleft"><?php next_posts_link( '&laquo; Older Entries' ) ?></div>
			<div class="alignright"><?php previous_posts_link( 'Newer Entries &raquo;' ) ?></div>
		</div> 



<?php get_footer(); ?>