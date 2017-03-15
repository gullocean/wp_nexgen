<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<!-- <div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div> --><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="prd_detl">
					<h3><?php the_title(); ?></h3>
					<?php if(get_field('product_code')){ ?>
					<p>Code: <?php the_field('product_code'); ?></p>
					<?php } ?>
					<?php the_content(); ?>
					</div>
					   <div class="prd_detl_rit">
							<div class="round_icon_bx2 prodtls_holder">
								<div class="pro_dtls_img_holder">
									<?php
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
									if ($image) : ?>
									<a rel="lightbox" href="<?php echo $image[0]; ?>"><img src="<?php echo $image[0]; ?>" alt="" /></a>
									<?php endif; ?>
									
								</div>
								<h5> <?php the_title(); ?> </h5>
								<a rel="lightbox" href="<?php echo $image[0]; ?>" class="lightlink">View larger image</a>
								<div class="red_anc5">
									<a href="<?php echo get_permalink('403');?>?pid=<?php echo $post->ID;?>">Enquire Now</a>
								</div>
								<?php if(get_field('pdf_file')){ ?>
								<div class="icon_acn4">
									<a target="_blank" href="<?php the_field('pdf_file'); ?>">Download Brochure</a>
								</div>
								<?php } ?>
							</div>
					   </div>
			<?php if(get_field('related_product_category')){ ?>	   
					   <div class="related">
							<h2><span>Related Products</span></h2>
							<p><strong> View our available handsets below</strong></p>
						</div>
					 
					 <?php
				//$no_of_post = get_field('num_of_post');
				$get_category = get_field('related_product_category');
				global $post;
				$args = array( 'category' => $get_category );
				$myposts = get_posts( $args );
				//$myposts = get_posts('numberposts=3&category=.$get_category');
				//print_r($myposts);
				foreach( $myposts as $post  ) :
					setup_postdata($post);
					$getContent = get_the_content();
					$getContent = apply_filters('<p>'.the_content.'</p>', $getContent);
					$getContent = str_replace(']]>', ']]&gt;', $getContent); ?> 
					 
					 
					<div class="col-sm-4">
					<div class="round_icon_bx2 product_full_holder">
						<div class="product_holder">
						<?php
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						if ($image) : ?>
						<a href="<?php the_permalink() ?>"><img src="<?php echo $image[0]; ?>" alt="" />
						<div class="rolloverlayer"> </div></a>
						<?php endif; ?>
						</div>
						<h5> <?php the_title(); ?> </h5>
						<div class="icon_acn">
							<a href="<?php the_permalink() ?>">Find out more</a>
						</div>
					</div>
					</div>
					<?php endforeach; wp_reset_postdata(); }
				?>
					
					
					

					<div class="entry-utility">
						<?php //twentyten_posted_in(); ?>
						<?php //edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<!-- <div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div> --><!-- #nav-below -->

				<?php //comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
