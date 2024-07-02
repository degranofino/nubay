	</div>

	<footer id="footer">

		<div class="footer_left">
			<ul class="menu_footer">
				<li><a href="<?php echo get_permalink(3); ?>"><?php _e('Política de privacidad','gloria'); ?> </a></li>
				<li><a href="<?php echo get_permalink(13); ?>"><?php _e('Política de Cookies','gloria'); ?></a></li>
				<li><a href="<?php echo get_permalink(12); ?>"><?php _e('Aviso Legal','gloria'); ?></a></li>
			</ul>
		</div>

		<div class="footer_right mt-4 mt-md-0 ml-md-5">
			<a href="https://weplan.global/" target="_blank">
				Marketing & Design,
				<img src="<?php bloginfo( 'template_url' ); ?>/img/logo_weplan.svg" alt="" class="ml-2">
			</a>
		</div>

	</footer>

	<?php wp_footer(); ?>

</body>

</html>