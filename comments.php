<?php 
//hide this if a passsword is required
if( post_password_required() ){
	return;
} ?>

<section class="comments">	
	<h3><?php comments_number(); ?> on this post</h3>
	<ol>
		<?php wp_list_comments( array(
				'type' 				=> 'comment',
				'avatar_size' 		=> 70,
		) ); ?>
	</ol>

	<div class="pagination">
		<?php previous_comments_link(); ?>
		<?php next_comments_link(); ?>
	</div>
</section>

<section class="comment-form">	
	<?php comment_form(); ?>
</section>	

<?php $pings = mmc_pings_count();
if( $pings ){ ?>
<section class="trackbacks">
	<h3><?php echo $pings == 1 ? '1 Site links' : "$pings Sites link" ; ?> to this post</h3>	
		<ol>
		<?php wp_list_comments( array(
				'type' 				=> 'pings',
				'short_ping' 		=> true,
		) ); ?>
	</ol>
</section>
<?php } ?>