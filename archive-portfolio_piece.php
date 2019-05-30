<?php get_header(); //include header.php ?>
		<main class="content">
			<h1 class="content-title"><?php post_type_archive_title(); ?></h1>
			<?php 
			//begin "The Loop." Check to see if any posts were found
			if( have_posts() ){ 
				while( have_posts() ){
					the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('overlay'); ?>>
				<?php the_post_thumbnail('large'); //featured image ?>

				<h2 class="entry-title"> 
					<a href="<?php the_permalink(); ?>"> 
						<?php the_title(); ?> 
					</a>
				</h2>
								
			</article>
			<!-- end post -->
			<?php 
				} //end while
			?>
			
			<section class="pagination">
				<?php mmc_pagination(); ?>
			</section>

			<?php
			} //end if there are posts
			else{
				echo 'Sorry, no posts to show';
			} ?>
		</main>
		<!-- end #content -->

<?php get_footer(); ?>

