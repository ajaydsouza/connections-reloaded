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
if ( function_exists('register_sidebar_widget') )
	{
		register_sidebar_widget(__('Search'), 'widget_conrel_search');
		register_sidebar_widget(__('Calendar'), 'widget_conrel_calendar');
	}

?>