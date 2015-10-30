
<?php get_header(); ?>


<div class="contentWrapper mainWrapper">
     <div class="xColumnView">

        <?php get_sidebar(); ?>
        
        <article class="pageContentViewItem pageStyle">

        	<script>
        	/* lets the heading of the pages 'Über uns', 'Kinderdörfer' und 'Unterstützen' disappear for responsive Design  */
        	var maxScreenWidth = 768;
        	var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

	    		if (width > maxScreenWidth || document.title != 'Über uns' || document.title != 'Kinderdörfer' || document.title != 'Unterstützen') {
	    			document.write("<h1><?php wp_reset_query(); the_title(); ?></h1>");
	    		}
	    	</script>

            <?php the_content(); ?>
         </article>
     </div>
 </div>





<?php get_footer(); ?>