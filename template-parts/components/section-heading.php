<?php
/** Section heading component. @package Estatein */
$heading_title = $args['title'] ?? '';
$description   = $args['description'] ?? '';
?>
<header class="section-heading">
	<div class="section-marker" aria-hidden="true">✦ <span>✦</span></div>
	<h2><?php echo esc_html( $heading_title ); ?></h2>
	<?php
	if ( $description ) :
		?>
		<p><?php echo esc_html( $description ); ?></p><?php endif; ?>
</header>
