<?php get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>




		<div id="story">
       	  	<div class="title">
        		<h2><?php the_title(); ?></h2>
            	<p><?php the_time('jS F Y') ?></p>
            <div class="cleaner"></div>
            </div>
        	<?php the_content(); ?>
        <div id="listing">
        	 <?php posts_nav_link(); ?>
            
        
        </div>
        
        </div>


<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>
