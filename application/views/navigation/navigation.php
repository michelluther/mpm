<?php
	$baseURL = base_url();
	if ($navigation['data'] != null) {
		$navigationContent = $navigation['data']->get_navigationEntries();
		?>
<div id="navigation">
	<ul>
	<?php
		foreach ($navigationContent as $navigationEntry) {
			$name = $navigationEntry->get_name();
			$activity = $navigationEntry->get_activity();
			$activity_link = $baseURL . 'index.php/' . $activity;
			$cssClass = ($navigationEntry->get_is_active()) == true ? 'active' : 'inactive' ;
			?>
			<li class="<?= $cssClass ?>"><a href="<?= $activity_link ?>"><?= $name ?></a></li>
			<?php
		}
	?>
	</ul>
</div>
<?php 
	} // endif navigation['data'] = null
?>
