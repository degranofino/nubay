<?php /* Template name: Standar */ ?>
<?php get_header(''); ?>

<div class="standar_page">
	<div class="container">
		<div class="standar_page__title">
			<span><?php the_title(); ?></span>
		</div>
		<?php the_content(); ?>
	</div>
</div>

<?php get_footer(); ?>