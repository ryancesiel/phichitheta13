<?php get_header(); ?>  

	<!-- Section Category -->
	<div class="sub-header">
		<div class="w-container">
			<div class="category"><?php echo get_the_title( $post->post_parent ); ?></div>
		</div>
		<div class="breadcrumbs">
			<div class="w-container">
				<a href="<?php echo home_url(); ?>" title="Home">Home</a> > 
				<?php if (isSubPage()) { ?><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php echo get_the_title($post->post_parent) ?>"><?php echo get_the_title($post->post_parent) ?></a> > <?php } ?> 
				<a href="<?php echo get_permalink($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>"><?php echo get_the_title($post->ID) ?></a>
			</div>
		</div>
	</div>


	<!-- Sub Navigation + Content -->
	<div class="w-container">
		<ul class="sub-nav">
			<?php 
				# Check the navigation depth to decide what is the parent
				if (isSubPage()) {
					$parent = $post->post_parent;
				} else {
					$parent = $post->ID;
				}
				wp_list_pages(array('child_of' => $parent, 'title_li' => '', 'link_before' => '<div class="right-caret" style="float:right; margin-top:6px;"></div>')); 
			?> 
		</ul>
		<div class="content">
			<div class="content-header"><?php the_title(); ?></div>
			<div class="content-body">
			<?php while ( have_posts() ) : the_post(); ?>  
				<?php the_content('Read More'); ?> 
			<?php endwhile; ?> 
			<div class="clearboth"></div>
			<ul class="pages"></ul>
			</div>
		</div>
		<div class="clearboth"></div>
	</div>
 
<?php get_footer(); ?>