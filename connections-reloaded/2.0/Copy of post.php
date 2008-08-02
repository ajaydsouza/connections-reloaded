<p class="post-date"><?php the_time('D j M Y'); ?></p>
<div class="post-info">
	<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<?php if(!is_single()) { ?>
	<p><?php _e('Posted by '); ?><?php the_author(); ?><?php _e(' under '); ?><?php the_category(', '); ?><?php edit_post_link(' (edit this)'); ?>
	<br/>
	<?php comments_popup_link('No Comments', '1 Comment', '[%] Comments'); ?></p>
	<?php } ?>
</div>
<div class="post-content">
	<?php the_content(); ?>
	<div class="post-info">
		<?php wp_link_pages(); ?>											
	</div>
	<?php if(is_single()) { ?>
	<div class="postmeta">
		<h2><?php _e('Post Details: '); ?></h2>
		<div id="archivedentry">
			<dl>
			<dt><strong><?php _e('Post Date :'); ?></strong></dt>
			<dd><?php the_time('l, M jS, Y'); _e(' at '); the_time() ?></dd>
			<dt><strong><?php _e('Category :'); ?></strong></dt>
			<dd><?php the_category(' and '); ?></dd>
			<?php if (function_exists('the_tags')) { ?>
				<dt><strong><?php _e('Tags :'); ?></strong></dt>
				<dd><?php the_tags('',', ' , ''); ?></dd>
			<?php } ?>
			
			<dt><strong><?php _e('Do More :'); ?></strong></dt>
			<dd><?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) 
				{
					// Both Comments and Pings are open 
					_e('You can <a href="#respond">leave a response</a>');
					if(!(function_exists('ht_trackback_url')))
					{
						_e(' or a <a href="'); trackback_url(display); _e('">trackback</a> from your own site.');
					}
				}
				elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status))
				{
					// Only Pings are Open 
					_e('Responses are currently closed'); 
					if(!(function_exists('ht_trackback_url')))
					{
						_e(', but you can <a href="'); trackback_url(display); _e('">trackback</a> from your own site.');
					}
				}
				elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status))
				{
					// Comments are open, Pings are not
					_e('You can skip to the end and leave a response. Pinging is currently not allowed.');
				}
				elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status))
				{
					// Neither Comments, nor Pings are open
					_e('Both comments and pings are currently closed.');
				}
				edit_post_link(' Edit this entry.','',''); ?>
			</dd>
			</dl>
		</div>
	</div>
	<?php } ?>
	<!--
		<?php trackback_rdf(); ?>
	-->
	<div class="post-footer">&nbsp;</div>
</div>