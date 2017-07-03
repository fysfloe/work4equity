<?php
add_action( 'after_setup_theme', 'w4e_add_image_sizes' );
function w4e_add_image_sizes() {
  add_image_size( 'expert-profile', 460, 460, array('center', 'center') );
}
