<?php
/**
 * Home Industry news
 *
 * @package everstrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $_exclude_group_one_news_post;
?>

<div class="group-news-wrapper mb-1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-12">
						<div class="section-title-wrapper">
							<h2 class="section-title"><?php echo esc_html__( 'Industry', 'everstrap' ) ?></h2>
						</div>
					</div>
				</div>

				<div class="row">
						<?php
						if ( have_posts() ) :
							$_count_posts = 0;
							while ( have_posts() ) : the_post();
								$_count_posts ++;
								$_thumb_cat                     = false;
								$_exclude_group_one_news_post[] = get_the_id();
								$_exclude_second_news_post[]    = get_the_id();
								$_post_meta                     = [];
								$_thumb_size                    = 'everstrap-list';
								$_content_limit                 = null;
								$post_class = null;


								if ( $_count_posts <= 4  ) {
									$_thumb_size = 'everstrap-squire';
									$_thumb_cat     = true;
									$_content_limit = 14;
									$post_class = "top-group-post col-md-6";
								} else {
									$post_class = "list-small news-border-bottom";
								}

								if ( $_count_posts == 5  ) : ?>
									</div>
									<div class="row">
								<?php  endif; ?>

								<?php if ( $_count_posts == 5) : ?>
									<div class="col-lg-8">
								<?php endif; ?>

								<?php if ( $_count_posts == 13) : ?>
										<div class="row">
										<div class="col-lg-8">
								<?php endif;

								/**
								 * Hook: everstrap_post_content_list
								 * ---------------------------------
								 * 1st param: thumb size
								 * 2nd param: post meta
								 * 3rd param: content limit
								 * 4th param: is thumb cat
								 **/
								?>

								<div class="<?php echo esc_attr($post_class); ?>">
									<?php
									echo do_action( 'everstrap_post_content_list', $_thumb_size, $_post_meta, $_content_limit, $_thumb_cat );
									?>
								</div>
								<?php
								if ( $_count_posts == 12) { ?>
									</div>
										<div class="col-md-4 extra-pl-30">
											<div class="sidebar sidebar-pt">
												<img src="https://via.placeholder.com/300x600.png?text=300x600+AD" alt="">
											</div>
										</div>
									</div>
									<?php echo do_shortcode( '[everstrap_ad_shortcode size="970x250"]' ); ?>

								<?php } ?>

								<?php if ( $_count_posts == 20) { ?>
									</div>
										<div class="col-md-4 extra-pl-30">
											<div class="sidebar sidebar-pt">
												<img src="https://via.placeholder.com/300x600.png?text=300x600+AD" alt="">
											</div>
										</div>
									</div>
									<?php echo do_shortcode( '[everstrap_ad_shortcode size="970x250"]' ); ?>
								<?php }

							endwhile;
							wp_reset_postdata(); ?>

										<?php
						else : ?>
							<div class="col-12"><p><?php esc_html_e( 'Post not found !', 'everstrap' ); ?></p></div><?php
						endif;
						?>
				</div>
		</div>


	</div><!-- .row -->
</div>
