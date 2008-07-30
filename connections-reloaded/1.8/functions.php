<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '', 
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>', 
	));

function widget_conrel_search() {
?>
	<li id="search">
		<h2><label for="s"><?php _e('Search:'); ?></label></h2>
		<ul>
			<li>
				<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div style="text-align:center">
						<p><input type="text" name="s" id="s" size="15" /></p>
						<p><input type="submit" name="submit" value="<?php _e('Search'); ?>" /></p>
					</div>
				</form>
			</li>
		</ul>
	</li>
<?php
}
function widget_conrel_calendar() {
?>
	<li id="calendar">
		<?php get_calendar(); ?>
	</li>
<?php
}
function widget_conrel_tags() {
  $options = get_option('widget_conrel_tags');
?>
	<li id="tags">
		<h2><?php echo $options['title'] ?></h2>
			<?php wp_tag_cloud('smallest=8&largest=22&format=list');    ?>
	</li>
<?php
}
function widget_conrel_tags_control() {
  $options = $newoptions = get_option('widget_conrel_tags');
  if ( $_POST["conrel-tags-submit"] ) {
	  $newoptions['title'] = strip_tags(stripslashes($_POST["conrel-tags-title"]));
	  if ( empty($newoptions['title']) ) $newoptions['title'] = 'Popular Tags';
  }
  if ( $options != $newoptions ) {
	  $options = $newoptions;
	  update_option('widget_conrel_tags', $options);
  }
  $title = htmlspecialchars($options['title'], ENT_QUOTES);
?>
<p><label for="conrel-tags-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="conrel-tags-title" name="conrel-tags-title" type="text" value="<?php echo $title; ?>" /></label></p>
<input type="hidden" id="conrel-tags-submit" name="conrel-tags-submit" value="1" />
<?php
}

if ( function_exists('register_sidebar_widget') )
	{
		register_sidebar_widget(__('Search'), 'widget_conrel_search');
		register_sidebar_widget(__('Calendar'), 'widget_conrel_calendar');
		register_sidebar_widget(__('Tag Cloud'), 'widget_conrel_tags');
		register_widget_control(__('Tag Cloud'), 'widget_conrel_tags_control', null, 175);
	}

?>