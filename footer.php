<?php if (!is_404()):?>
<footer class="contentWrapper">
Amani Kinderdorf e.V.<?php wp_nav_menu( array('menu' => 'footerMenu', 'container' => '','items_wrap' => '%3$s', 'before' => '<span class="footer-seperator">|</span>' )); ?>
</footer>
<?php endif; ?>

<script type="text/javascript">
    function searchButtonClicked () {
        if(document.getElementById('searchField').value.length>0) document.getElementById('searchForm').submit();
         document.getElementById('searchField').focus();
    }
    function changeVisibility(value) {
        document.getElementById('searchSection').classList.toggle('inputHidden',value);
        if(value) document.getElementById('searchIcon').src = "<?php bloginfo('template_url') ?>/img/search.png"
        else document.getElementById('searchIcon').src = "<?php bloginfo('template_url') ?>/img/search_black.png"
    }
</script>
 <?php if(is_front_page()||is_home()): ?>
    <script type="text/javascript" src="<?php bloginfo('template_url')?>/js/slick.min.js"></script>
	<script type="text/javascript">	
	    jQuery(document).ready(function(){
	       jQuery('#slideShowContent').slick({
	        autoplay: true,
	        autoplaySpeed: 3000,  
	        infinite: true,
	        speed: 400,
	        fade: true,
	        cssEase: 'linear',
	        dots:true,
	        arrows:false
	    });
	   });
	</script>
 <?php endif; ?>

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
</body>
</html>