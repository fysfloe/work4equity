<?php

function print_projects( $atts, $content = "" ) {
  $attr = shortcode_atts([
    'categories' => '',
  ]);

  $args = array(
  	'posts_per_page'   => 5,
  	'offset'           => 0,
  	'category'         => !empty($attr['categories']) ? $attr['categories'] : '',
  	'orderby'          => 'date',
  	'order'            => 'DESC',
  	'post_type'        => 'project',
  	'post_status'      => 'publish',
  	'suppress_filters' => true
  );

  $projects = get_posts( $args );

  ob_start();

  global $post;

  ?>

  <ul id="projects">

    <?php
    foreach ( $projects as $post ) : setup_postdata( $post ); ?>

    	<li>
    		<a href="<?php the_permalink(); ?>">
          <figure>
            <?php the_post_thumbnail() ?>
            <figcaption>
              <h3><?php the_title() ?></h3>
              <div class="project-description">
                <?php the_excerpt() ?>
              </div>
            </figcaption>
          </figure>
        </a>
    	</li>

    <?php endforeach;
    wp_reset_postdata();
    ?>

  </ul>

  <?php

  return ob_get_clean();
}
add_shortcode( 'projects', 'print_projects' );
