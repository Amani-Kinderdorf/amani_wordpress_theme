<?php if (!is_404()):?>
<footer class="contentWrapper">
©  2015  Amani Kinderdorf e.V. | <a href="<?php echo get_page_link(85); ?>">Impressum</a>
</footer>
<?php endif; ?>

<script type="text/javascript">
    function searchButtonClicked () {
        if(document.getElementById('searchField').value.length>0)
        document.getElementById('searchForm').submit();
        else document.getElementById('searchField').focus();
    }
    function changeVisibility(value) {
        document.getElementById('searchSection').classList.toggle('inputHidden',value);
        if(value) document.getElementById('searchIcon').src = "<?php bloginfo('template_url') ?>/img/search.png"
        else document.getElementById('searchIcon').src = "<?php bloginfo('template_url') ?>/img/search_black.png"
    }
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.2.min.js"></script>
 <?php if(is_front_page()||is_home()): ?>
    <script type="text/javascript" src="<?php bloginfo('template_url')?>/js/slick.min.js"></script>
	<script type="text/javascript">	
	    $(document).ready(function(){
	       $('#slideShowContent').slick({
	        autoplay: false,
	        autoplaySpeed: 2000,  
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