<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									</span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>
							<div class="cat-content">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<?php if (single_cat_title('', false) == "Photoshoot") {

								$args = array( 'post_type' => 'attachment', 'posts_per_page' => 5, 'post_status' =>'any', 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'order' => 'DESC' );
		            			$attachments = get_posts( $args );
		            			// $thumb_ID = get_post_thumbnail_id( $post->ID );
		              			if ( $attachments ) {
		              				$i = 0;
			                		foreach ( $attachments as $attachment ) {
				                		if ( ++$i === 5/*$attachment->ID == $thumb_ID*/ ) {
				                			$attachmentimage=wp_get_attachment_image_src( $attachment->ID, true );

				                  	echo '<figure class="seance-main"><a href="'.esc_url(get_permalink()).'"> <img src="'.$attachmentimage[0] .  '"</a></figure>';
				                } else {
				                  $attachmentimage=wp_get_attachment_image_src( $attachment->ID, 'seance-snapshots' );

				                  echo '<figure class="seance-snapshots"><a href="'.esc_url(get_permalink()).'"> <img src="'.$attachmentimage[0] .  '"</a></figure>';

				                }
			                }
		              	}

		              } elseif (single_cat_title('', false) == "Street Style") { ?>



	          						<a class="street-style-img" href="<?php echo  esc_url(get_permalink()); ?>">
	                				<?php if ( has_post_thumbnail() ) {
	                  				the_post_thumbnail('small');
	                				} ?>
	              				</a>


		            <?php } elseif (single_cat_title('', false) == "Portrait" || single_cat_title('', false) == "Profile" || single_cat_title('', false) == "Investigation") { ?>

						<article class="portraits" id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">
									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>


								</header>

								<section class="entry-content cf">

									<?php the_post_thumbnail( 'bones-thumb-300' ); ?>

									<?php the_excerpt(); ?>

								</section>

								<footer class="article-footer">

								</footer>

							</article>
							<?php }; ?>
							<?php endwhile; ?>
							</div>
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
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
