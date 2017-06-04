<?php

function print_projects( $atts, $content = "" ) {
  $attr = shortcode_atts([
    'categories' => '',
  ]);

  $args = array(
  	'posts_per_page'   => 10,
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
    $i = 0;
    foreach ( $projects as $post ) : setup_postdata( $post ); ?>

    	<li>
    		<a href="<?php the_permalink(); ?>">
          <figure>
            <?php if($i % 2 === 0) : print_project_thumbnail() ?>
            <?php else : print_project_info(); endif; ?>
            <span class="project-icon">
              <span>
                <?php echo do_shortcode( '[x_icon type="rocket"]' ); ?>
              </span>
              <?php // echo do_shortcode( '[x_icon type="plus-circle"]' ); ?>
            </span>
            <?php if($i % 2 === 0) : print_project_info() ?>
            <?php else : print_project_thumbnail(); endif; ?>
          </figure>
        </a>
    	</li>

    <?php
    $i++;
    endforeach;
    wp_reset_postdata();
    ?>

  </ul>

  <?php

  return ob_get_clean();
}
add_shortcode( 'projects', 'print_projects' );

function print_project_thumbnail() {
  ?>
  <div class="project-img-wrap">
    <?php the_post_thumbnail( 'full' ) ?>
  </div>
  <?php
}

function print_project_info() {
  ?>
  <figcaption>
    <h3><?php the_title() ?></h3>
    <ul class="categories">
      <?php foreach( get_the_terms( $post, 'project_category' ) as $category ) : ?>
        <li class="<?php echo $category->slug ?>">
          <span><?php echo $category->name ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="project-description">
      <?php the_excerpt() ?>
      <p><strong><?php _e( 'by', 'work4equity' ) ?>:</strong> Company<?php echo get_post_meta( get_the_ID(), 'company', true ); ?></p>
    </div>
    <div class="project-meta">
      <?php
      $remaining_days = calc_remaining_days(get_post_meta( get_the_ID(), 'end-date', true ));
      $date_progress = calc_date_progress($remaining_days, get_post_meta( get_the_ID(), 'start-date', true ), get_post_meta( get_the_ID(), 'end-date', true ));
      ?>
      <div class="end-date" style="width: <?php echo $date_progress ?>%;">
        <?php __( printf( '%s days remaining', $remaining_days ), 'work4equity' ); ?>
      </div>
      <div class="date-progress" style="width: <?php echo $date_progress ?>%;"></div>
    </div>
  </figcaption>
  <?php
}

function calc_remaining_days( $end_date ) {
  $end_date = new DateTime( $end_date );
  $today = new DateTime();
  $diff = $end_date->diff($today);

  return $diff->days;
}

function calc_date_progress( $remaining_days, $start_date, $end_date ) {
  $start_date = new DateTime( $start_date );
  $end_date = new DateTime( $end_date );
  $timespan = $end_date->diff($start_date);

  return $remaining_days / $timespan->days * 100;
}

function print_user_menu() {
  wp_nav_menu( ['theme_location' => 'user_menu'] );
}
add_shortcode( 'usermenu', 'print_user_menu' );
