
<!-- to do: post content teaser for featured; post titles for collage at bottom of page. styling. -->
<?php get_header(); ?>

  <div id="content">
    <div id="inner-content" class="">
      <main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
        <?php $thumb_ID = get_post_thumbnail_id( $post->ID ); 
        if ( $images = get_posts(array('post_parent' => $post->ID,'post_type' => 'attachment', 'posts_per_page' => 5,'post_mime_type' => 'image'))) {
            foreach( $images as $image ) {
              $attachmenturl=wp_get_attachment_url($image->ID);
              $attachmentimage=wp_get_attachment_image( $image->ID, 'seance-snapshots' );
              $attachmentjumboimage=wp_get_attachment_image( $image->ID, 'bones-thumb-600' );
              $imageDescription = apply_filters( 'the_description' , $image->post_content );
              $imageTitle = apply_filters( 'the_title' , $image->post_title );
               
              if ($image->ID == $thumb_ID ) {
                echo '<figure class="seance-main"><a href="'.esc_url(get_permalink()).'">' . $attachmentjumboimage .  '</a></figure>'; 
              } else {

              echo '<figure class="seance-snapshots"><a href="'.esc_url(get_permalink()).'">' . $attachmentimage .  '</a></figure>'; 
              }
            } //end foreach loop over $images
            echo '<aside class="seance-desc">'
            .'<h3>'.apply_filters( 'the_title' , $post->post_title ).'</h3>'
            // echo apply_filters( 'the_excerpt', $post->excerpt);
            .the_excerpt()
            .'</aside>';
          } else {
            echo "No Image";
          } ?>

        
      
        <!-- <h1 class="d-all">Street Style</h1> -->
        <div id="street-style-wrapper" class="collage">
          
        <?php  $query = new WP_Query(  array('category_name' =>  'street style', 'posts_per_page'=> '6' )); 
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <!-- <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article"> -->

              <!-- <header class="article-header"> -->
              <!-- <figure class='snapshot-wrapper'> -->
              <a href="<?php echo  esc_url(get_permalink()); ?>">
                <?php if ( has_post_thumbnail() ) { 
                  the_post_thumbnail('medium');
                } ?>
                  
              </a>
          <?php endwhile; ?>

          <?php bones_page_navi(); ?>

          <?php else : ?>

          <article id="post-not-found" class="hentry cf">
            <header class="article-header">
              <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
            </header>
            <section class="entry-content">
              <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
            </section>
            <footer class="article-footer">
              <p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
            </footer>
          </article>

        <?php endif; ?>
      </div>
</main>

<?php get_sidebar(); ?>

</div>

</div>


<?php get_footer(); ?>
