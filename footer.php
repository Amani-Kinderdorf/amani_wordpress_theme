<?php if (!is_404()):?>
<footer class="contentWrapper">
	<span>Amani Kinderdorf e.V.</span>
	<div>
	<?php wp_nav_menu( array('menu' => 'footerMenu', 'container' => '','items_wrap' => '%3$s', 'before' => '' )); ?>
	</div>
</footer>
<?php endif; ?>

<script type="text/javascript">
    function searchButtonClicked () {
        if(document.getElementById('searchField').value.length>0) document.getElementById('searchForm').submit();
         document.getElementById('searchField').focus();
    }
    function changeVisibility(value) {
        document.getElementById('searchSection').classList.toggle('inputHidden',value);
    }
	function toggleMobileMenu(el){
		el.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible'); 
		el.classList.toggle('sideBarPageTreeHeading--visible');
		return false;
	}
</script>

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
</body>
</html>
