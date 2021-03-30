<footer class="contentWrapper">
	<span>Amani Kinderdorf e.V.</span>
	<div>
	<?php wp_nav_menu( array('menu' => 'footerMenu', 'container' => '','items_wrap' => '%3$s', 'before' => '' )); ?>
	</div>
</footer>

<script type="text/javascript">
	function searchButtonClicked () {
		console.log("Searchbutton clicked")
		if(document.getElementById('searchField').value.length>0) {
			document.getElementById('searchForm').submit();
		}
		document.getElementById('searchSection').classList.toggle('inputHidden', false);
		document.getElementById('searchField').focus();
	}

	function changeVisibility(value) {
		document.getElementById('searchSection').classList.toggle('inputHidden', value);
	}
	function toggleMobileMenu(el){
		el.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible'); 
		el.classList.toggle('sideBarPageTreeHeading--visible');
		return false;
	}
</script>

<?php if(WP_DEBUG==true): ?>
	<div class="test-overlay">Sie benutzen die Testumgebung der Amani-Kinderdorf Homepage. Bitte wechseln sie zur Hauptseite unter: <a href="https://www.amani-kinderdorf.de">www.amani-kinderdorf.de</a></div>
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
