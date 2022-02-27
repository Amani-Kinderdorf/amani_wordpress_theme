<footer class="contentWrapper footerWrapper">
	<span><b>Amani Kinderdorf e.V.</b></span>
	<ul class="footerMenu">
		<?php wp_nav_menu(array('menu' => 'footerMenu', 'container' => '', 'items_wrap' => '%3$s', 'before' => '')); ?>
	</ul>
	<ul>
		<li>
			<a href="https://www.facebook.com/Amani.Kinderdorf" target="_blank" class="iconLink">
				<svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
					<path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"></path>
				</svg>
				Facebook
			</a>
		</li>
		<li>
			<a href="https://www.instagram.com/amanikinderdorf/" target="_blank" class="iconLink">
				<svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="60px" height="60px">
					<path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z"/>
				</svg>
				Instagram
			</a>
		</li>
	</ul>
</footer>

<script>
	function searchButtonClicked() {
		if (document.getElementById('searchField').value.length > 0) {
			document.getElementById('searchForm').submit();
		}
		document.getElementById('searchSection').classList.toggle('inputHidden', false);
		document.getElementById('searchField').focus();
	}

	function changeVisibility(value) {
		document.getElementById('searchSection').classList.toggle('inputHidden', value);
	}

	function toggleMobileMenu(el) {
		el.nextElementSibling.classList.toggle('sideBarPageTreeItems--visible');
		el.classList.toggle('sideBarPageTreeHeading--visible');
		return false;
	}
</script>

<?php if (WP_DEBUG == true) : ?>
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
