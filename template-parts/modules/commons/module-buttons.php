<!-- Buttons -->
<?php if($buttons): ?>
    <div class="module-buttons">
        <?php foreach ($buttons as $button) { ?>
            <a class="btn <?php echo $button['style']; ?>" href="<?php echo $button['link']['url']; ?>"><?php echo $button['title']; ?></a>
        <?php } ?>
    </div>
<?php endif; ?>