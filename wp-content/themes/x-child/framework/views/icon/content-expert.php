<?php

// =============================================================================
// VIEWS/ICON/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Icon.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(['expert-profile']); ?>>
  <div class="entry-wrap">
    <?php x_icon_comment_number(); ?>
    <div class="x-container max width">
      <?php
      $expertProfile = [
        'post_id' => get_the_ID(),
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'featured_img' => get_the_post_thumbnail( get_the_ID(), 'expert-profile' ),
        'title' => get_the_title(),
        'position' => get_post_meta( get_the_ID(), 'position', true ),
        'headings' => [
          'info' => [
            'text' => __( 'Info', 'work4equity' ),
            'icon' => do_shortcode( '[x_icon type="info-circle"]' )
          ],
          'experience' => [
            'text' => __( 'Experience', 'work4equity' ),
            'icon' => do_shortcode( '[x_icon type="gears"]' )
          ],
          'skills' => [
            'text' => __( 'Skills', 'work4equity' ),
            'icon' => do_shortcode( '[x_icon type="flask"]' )
          ],
          'projects' => [
            'text' => __( 'Projects', 'work4equity' ),
            'icon' => do_shortcode( '[x_icon type="rocket"]' )
          ]
        ],
        'edit-icon' => do_shortcode( '[x_icon type="edit"]' ),
        'edit-text' => __( 'Edit', 'work4equity' ),
        'close-icon' => do_shortcode( '[x_icon type="times"]' ),
        'work-icon' => do_shortcode( '[x_icon type="building-o"]' ),
        'values' => [
          'info' => get_post_meta(get_the_ID(), 'info', true),
          'experience' => get_post_meta(get_the_ID(), 'experience', true),
          'skills' => get_post_meta(get_the_ID(), 'skills', true),
          'projects' => 'Yes, I did work on some.',
        ]
      ];
      wp_localize_script( 'react-bundle', 'expertProfile', $expertProfile );
      // x_get_view( 'icon', '_content', 'post-header' );
      ?>

      <div id="react-root"></div>
    </div>
  </div>
</article>
