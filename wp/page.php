<?php get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>




		<div id="story">
       	  	<div class="title">
        		<h2><?php the_title(); ?></h2>
            <div class="cleaner"></div>
            </div>
        	<?php the_content(); ?>
        <div id="listing">
        	
            
        
        </div>
        
        </div>


<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>
