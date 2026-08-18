<?php
/** Process card. @package Estatein */
?><article class="process"><div class="process__label"><?php echo esc_html( sprintf( __( 'Step %s', 'estatein' ), $args['number'] ?? '' ) ); ?></div><div class="process__body"><h3><?php echo esc_html( $args['title'] ?? '' ); ?></h3><p><?php echo esc_html( $args['description'] ?? '' ); ?></p></div></article>

