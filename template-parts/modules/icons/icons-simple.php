<?php $icons = $icons[0]; ?>

<!-- MAPA -->
<div class="icons">
	<ul class="icons__list">
		<?php foreach ($icons['icon'] as $item) { ?>
			<li>
				<div>
					<img src="<?php echo $item['image']['url']; ?>" alt="">
					<div class="icon__title"><?php echo $item['title']; ?></div>
					<?php echo $item['content']; ?>
				</div>				
			</li>
		<?php }  ?>
	</ul>
</div>