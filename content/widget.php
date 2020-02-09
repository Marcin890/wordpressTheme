<?php
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<aside class="widget-area">
    <?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			?>
    <div class="widget-column">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
    <?php
		}
		?>
</aside>
<?php endif; ?>