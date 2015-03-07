<!-- anchor takes you to post page, not to attachment -->

<?php get_header(); ?>

  <div id="content">
    <div id="inner-content" class="">
      <main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
       <!-- THE LOOP FOR PHOTOSHOOT CATEGORY POSTS -->

        <?php  $query = new WP_Query(  array('category_name' =>  'photoshoot', 'posts_per_page'=> 1 ));
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
           //echo $post->ID ;
        ?>


        <!-- SUBLOOP FOR ALL ATTACHED IMAGES IN THE PHOTOSHOOT CAT -->
          <?php
            $args = array( 'post_type' => 'attachment', 'posts_per_page' => 5, 'post_status' =>'any', 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'order' => 'DESC' );
            $attachments = get_posts( $args );
            // $thumb_ID = get_post_thumbnail_id( $post->ID );
              if ( $attachments ) {
                $i = 0;
                foreach ( $attachments as $attachment ) {
                  if ( ++$i === 5/*$attachment->ID == $thumb_ID */) {
                    $attachmentimage=wp_get_attachment_image_src( $attachment->ID, 'seance-main' );

                  echo '<figure class="seance-main"><a href="'.esc_url(get_permalink()).'"> <img src="'.$attachmentimage[0] .  '"</a></figure>';
                  } else {
                  $attachmentimage=wp_get_attachment_image_src( $attachment->ID, 'seance-snapshots' );
                  echo '<figure class="seance-snapshots"><a href="'.esc_url(get_permalink()).'"> <img src="'.$attachmentimage[0] .  '"</a></figure>';

                  }
                }
              }
            ?>



        <?php endwhile; ?>
        <?php endif; ?>

        <!-- <h1 class="d-all">Street Style</h1> -->
        <!-- <div class="street-style-wrapper"> -->
        <div class="collage">


        <?php  $query = new WP_Query(  array('category_name' =>  'street-style', 'posts_per_page'=> 8 ));
          if ($query->have_posts()) {
            $i = 0;
            while ($query->have_posts()) : $query->the_post();

            ?>

            <!-- <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article"> -->

              <!-- <header class="article-header"> -->
              <!-- <figure class='snapshot-wrapper'> -->
              <a href="<?php echo  esc_url(get_permalink()); ?>">
                <?php if ( has_post_thumbnail() ) {
                  the_post_thumbnail('large');
                } ?>

              </a>

          <?php  endwhile; ?>

          <?php bones_page_navi(); ?>

        <?php } ?>
      </div>
      <!-- </div> -->



      <?php  $query = new WP_Query(  array('category_name' =>  'photoshoot', 'posts_per_page'=> 1, 'offset'=>1 ));
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
           //echo $post->ID ;
        ?>

        <!-- SUBLOOP FOR ALL ATTACHED IMAGES IN THE PHOTOSHOOT CAT -->
        <?php
            $args = array( 'post_type' => 'attachment', 'posts_per_page' => 5, 'post_status' =>'any', 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'order' => 'DESC' );
            $attachments = get_posts( $args );
            // $thumb_ID = get_post_thumbnail_id( $post->ID );
              if ( $attachments ) {
                $i = 0;
                foreach ( $attachments as $attachment ) {
                  if ( ++$i === 5/*$attachment->ID == $thumb_ID */) {
                    $attachmentimage=wp_get_attachment_image_src( $attachment->ID, 'seance-main' );

                  echo '<figure class="seance-main"><a href="'.esc_url(get_permalink()).'"> <img src="'.$attachmentimage[0] .  '"</a></figure>';
                  } else {
                  $attachmentimage=wp_get_attachment_image_src( $attachment->ID, 'seance-snapshots' );
                  echo '<figure class="seance-snapshots"><a href="'.esc_url(get_permalink()).'"> <img src="'.$attachmentimage[0] .  '"</a></figure>';

                  }
                }
              }
            ?>



        <?php endwhile; ?>
        <?php endif; ?>

             <!-- <div class="street-style-wrapper"> -->
        <div class="collage">

        <?php  $query = new WP_Query(  array('category_name' =>  'street-style', 'posts_per_page'=> 6, 'offset'=>6 ));
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <!-- <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article"> -->

              <!-- <header class="article-header"> -->
              <!-- <figure class='snapshot-wrapper'> -->
              <a href="<?php echo  esc_url(get_permalink()); ?>">
                <?php if ( has_post_thumbnail() ) {
                  the_post_thumbnail('large');
                } ?>
              </a>
          <?php endwhile; ?>

          <?php bones_page_navi(); ?>

        <?php endif; ?>
      </div>
      <!-- </div> -->
</main>

<?php get_sidebar(); ?>

</div>

</div>


<?php get_footer(); ?>
