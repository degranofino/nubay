<?php /* Template name: Modules */ ?>

<?php get_header('');

// Number
$n = 1;

// Loop Modules
if(have_rows('modules')):
    while (have_rows('modules')): the_row();

        /* Get Module Variables */
        require( TEMPLATEPATH . '/template-parts/modules/variables.php' );?>

        <div id="<?php echo $config['id']; ?>" class="module <?php echo get_row_layout(); ?> module-<?php echo $n; ?> <?php echo $config_module; ?>">
            <?php /* Get Modules */ require( TEMPLATEPATH . '/template-parts/modules/modules.php' );  ?>
        </div>

    <?php
    $n++;
    endwhile;
endif; ?>

<?php get_footer(); ?>