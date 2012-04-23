<?php get_header(); ?>
					
					<!--Begin Main Content Area-->

						<div id="main-body">
							<!--Begin Left Column-->
							<!--End Left Column-->
							<!--Begin Main Column-->
							<div id="maincol" style="width: <?php echo $content_width; ?>px">
								<div class="padding">
									<div id="breadcrumbs">
										<div class="moduletable">
											<span class="breadcrumbs pathway"><a href="<?php bloginfo('url'); ?>" class="pathway"><?php _e('Home'); ?></a>&nbsp;&nbsp;//&nbsp;&nbsp;<?php the_title(); ?></span></div><!-- .moduletable -->
									</div><!-- #breadcrumbs -->	
									<div id="main-content">
										<div id="maincontent-block" style="margin-left:0;">
											<div id="page">
												<div class="main-article">
													<div class="buttonheading">
													</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php /* ?>
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			<div class="clr"></div>
		</div>
<?php */ ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<!-- <div class="ribbon png">
						<span class="bold_month"><?php the_time('M') ?></span><br />
						<span class="ribbon_day"><?php the_time('d/y') ?></span>

			</div> -->

			<div class="single_meta">
				<div class="single_title_wrapper">
                                 <span class="archive_title"><?php the_title(); ?></span></div>
                        </div>
				<div class="clr"></div>

			<div class="entry">
<?php /* ?>
				<div class="single_meta">
					<?php _re('Last Updated on'); ?> <?php the_modified_date('l, j F o h:i'); ?><br />
					<?php _re('Written by'); ?> <?php the_author(); ?><br />
					<?php the_time('l, j F o h:i'); ?>
				</div>
<?php */ ?>

<?php 
if ( in_category(97) ) {
$large = get_post_meta($post->ID, 'large', TRUE);
if(!$large){ $large = get_post_meta($post->ID, 'fb_mainimg_url', TRUE); }
if($large) {
?>
<img style="display: none;" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $large; ?>&w=650&h=290&zc=1&q=75">
<?php } 
}?>
							<?php $thumb = get_post_meta($post->ID, 'thumb', TRUE); ?>
							<?php if($thumb) { ?>
								<div class="feature-thumb" style="margin-bottom:10px; float: right;"><img class="feature" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $thumb ?>&amp;w=115&amp;h=85&amp;zc=1&amp;q=75"/>
								</div>
							<?php } ?>
							<?php the_content(); ?>
							
				<div class="clr" style="margin-bottom: 50px;"></div>


				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<?php if ( has_tag() ) : ?>

				<div class="meta_archive"><span class="grey_archive_text"><?php the_tags(__('Tags: '), ', ', ''); ?></span></div>
				
				<?php endif; ?>
<br /><br />
<?php 
if ( in_category(39) ) {
include('disc.php'); 
}
?>

				<p class="postmetadata alt" style="display: none;">
					<small>
																			
																				<?php _re('This entry was posted'); ?>
																				<?php /* This is commented, because it requires a little adjusting sometimes.
																				You'll need to download this plugin, and follow the instructions:
																				http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
																				/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
																				<?php _re('on'); ?> <?php the_time('l, F jS, Y') ?> <?php _re('at'); ?> <?php the_time() ?>
																				<?php _re('and is filed under'); ?> <?php the_category(', ') ?>.
																				<?php _re('You can follow any responses to this entry through the'); ?> <?php post_comments_feed_link('RSS 2.0'); ?> <?php _re('feed'); ?>.
																			<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
																				// Both Comments and Pings are open ?>
																				<?php _re('You can'); ?> <a href="#respond"><?php _re('leave a response'); ?></a>, <?php _re('or'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _re('trackback'); ?></a> <?php _re('from your own site.'); ?>

																				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
																				// Only Pings are Open ?>
																				<?php _re('Responses are currently closed, but you can'); ?> <a href="<?php trackback_url(); ?> " rel="trackback"><?php _re('trackback'); ?></a> <?php _re('from your own site.'); ?>

																				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
																				// Comments are open, Pings are not ?>
																				<?php _re('You can skip to the end and leave a response. Pinging is currently not allowed.'); ?>

																				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
																				// Neither Comments, nor Pings are open ?>
																				<?php _re('Both comments and pings are currently closed.'); ?>

																				<?php } edit_post_link(_r('Edit this entry'),'','.'); ?>

																						</small>
				</p>



			</div>

		</div>
<div class="moduletable" style="margin-left: 20px;">												


</div>


		<br />
	<a name="comments"></a>

	<?php // comments_template(); ?>

	<?php endwhile; else: ?>

		<span class="attention"><?php _re('Sorry, no posts matched your criteria.'); ?></span>

<?php endif; ?>
	</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clr"></div>
								
<?php //MODULO NORMALE NEWS ?>										
											
						<div id="mainmodules2" class="spacer w99">
							<div class="block last" style="width: 655px">
															
								<div class="mainblock-module rokmodtools-more-news-main-page">
									<div class="mainblock-mod">
										<div class="mainblock-mod2">
											<div class="mainblock-title-container">
												<div class="content-tools">
													<h3 class="module-title"><span class="bg">
													<?php echo get_option('mixx_previous_issues_title'); ?>
													<?php //echo get_cat_name(get_option('mixx_more_news_cat_id')); ?>
													</span></h3>
													<div class="close-handle"></div>
													<div class="tools-handle"></div>
													</div>
											</div>
											<div class="module">
												<div class="morenews-outer">
													
													<?php $i = 1; ?>
													
													<?php query_posts('cat=-39,-'.get_option('mixx_more_news_cat_id').'&posts_per_page=4&showposts=4&offset=5&orderby=date&order=DESC'); ?>
													<?php while (have_posts()) : the_post(); ?>
													
													<div class="morenews-block-<?php echo $i; ?>">
														
														<?php $thumb = get_post_meta($post->ID, 'thumb', TRUE); ?>
														<?php if(!$thumb) $thumb = get_post_meta($post->ID, 'fb_mainimg_url', TRUE); ?>
														<?php if($thumb) { ?>
														<a href="<?php the_permalink(); ?>"><img class="morenews-img" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $thumb ?>&amp;w=122&amp;h=80&amp;zc=1&amp;q=75" /></a>
														<?php }?>
														<br />
														<span class="highlight-bold highlight-grey" style="margin-bottom:-8px;display:block;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br />
														
														<?php remove_filter('the_content', 'wpautop'); ?>
														
														<span class="more_news_excerpt"><?php the_excerpt_rereloaded('10','') ?></span>
														
														<?php //if(preg_match("/\<\!\-\-more\-\-\>/", $post->post_content)) { ?>
														
														<a class="readon" href="<?php the_permalink(); ?>"><span class="readon-full"><?php _re('Leggi'); ?></span></a>
														
														<?php //} ?>
														
														<?php add_filter('the_content', 'wpautop'); ?>
														
													</div>
													<?php $i++; ?>
													
													<?php endwhile;?>
												
													</div>
																										
													<div class="clr">	
												</div>				
											</div> <!-- .module -->
										</div>
									</div>

									<div class="mainblock-mod-bottom">
										<div class="mainblock-mod-bottom2">
											<div class="mainblock-mod-bottom3"></div>
										</div>
									</div>
								
													<div style="float: right;">
													<a href="http://www.fm-world.it/category/fm_world/"><i>Leggi tutte le news dal mondo della radio</i></a>
													</div>	
								
									</div>
						
						</div>
						</div>
										<div class="clr"></div>
										<br />
<?php //MODULO NORMALE NEWS ?>										
							
						<div id="mainmodules2" class="spacer w99">
							<div class="block last" style="width: 655px">
															
								<div class="mainblock-module rokmodtools-more-news-main-page">
									<div class="mainblock-mod">
										<div class="mainblock-mod2">
											<div class="mainblock-title-container">
												<div class="content-tools">
													<h3 class="module-title"><span class="bg">
													<?php echo get_option('mixx_previous_issues_title'); ?>
													<?php //echo get_cat_name(get_option('mixx_more_news_cat_id')); ?>
													</span></h3>
													<div class="close-handle"></div>
													<div class="tools-handle"></div>
													</div>
											</div>
											
											<div class="module">
												<div class="morenews-outer">
													
													<?php $i = 1; ?>
													
													<?php query_posts('cat='.get_option('mixx_more_news_cat_id').'&posts_per_page=4&showposts=4&offset=5&orderby=date&order=DESC'); ?>
													<?php while (have_posts()) : the_post(); ?>
													
													<div class="morenews-block-<?php echo $i; ?>">
														
														<?php $thumb = get_post_meta($post->ID, 'thumb', TRUE); ?>
														<?php if(!$thumb) $thumb = get_post_meta($post->ID, 'fb_mainimg_url', TRUE); ?>
														<?php if($thumb) { ?>
														<a href="<?php the_permalink(); ?>"><img class="morenews-img" alt="<?php the_title(); ?>" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $thumb ?>&amp;w=122&amp;h=80&amp;zc=1&amp;q=75" /></a>
														<?php }?>
														<br />
														<span class="highlight-bold highlight-grey" style="margin-bottom:-8px;display:block;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br />
														
														<?php remove_filter('the_content', 'wpautop'); ?>
														
														<span class="more_news_excerpt"><?php the_excerpt_rereloaded('10','') ?></span>
														
														<?php //if(preg_match("/\<\!\-\-more\-\-\>/", $post->post_content)) { ?>
														
														<a class="readon" href="<?php the_permalink(); ?>"><span class="readon-full"><?php _re('Leggi'); ?></span></a>
														
														<?php //} ?>
														
														<?php add_filter('the_content', 'wpautop'); ?>
														
													</div>
													<?php $i++; ?>
													
													<?php endwhile;?>
												
													</div>
																										
													<div class="clr">	
												</div>				
											</div> <!-- .module -->
										</div>
									</div>

									<div class="mainblock-mod-bottom">
										<div class="mainblock-mod-bottom2">
											<div class="mainblock-mod-bottom3"></div>
										</div>
									</div>
								
													<div style="float: right;">
													<a href="http://www.fm-world.it/category/fm_world/"><i>Leggi tutte le news dal mondo della radio</i></a>
													</div>	
								</div>
			
							</div>
							</div>
										<div class="clr"></div>
										<br />
								
								
								
								
							</div>
							<!--End Main Column-->
							
							<?php if (get_option('mixx_right_active') == "true") { ?>
							
								<?php get_sidebar('page'); ?>
								
							<?php } ?>	
								
							<div class="clr"></div>
						</div>
						<!-- Begin Bottom Main Modules -->
						<!-- End Bottom Main Modules -->
						<!--End Main Content Area-->
							
<?php get_footer(); ?>
