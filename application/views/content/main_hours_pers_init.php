<h1>Projektstundenerfassung</h1>
<p>Hier ist alles drin und noch was</p>
<h2>Kalender</h2>

<script type="text/javascript">
$(function() {
	$( "#datepicker" ).datepicker();
	$( "#datepicker" ).datepicker( "option", "dateFormat", "dd.mm.yy" );
});
</script>
<form>
	<div>
		Start von: <input id="datepicker" type="text"><div class="btn_find">&nbsp;</div>
	</div>
</form>
<form>
<table id="hrs_calendar_table">
	<tr>
		<th>Datum</th>
		<th>Projektnummer</th>
		<th>Projektbezeichnung</th>
		<th>Position</th>
		<th>Stunden</th>
		<th>Beschreibung</th>
	</tr>
<?php
foreach ($calendarEntries as $calendar_entry) {
	$date = $calendar_entry->getDateString();
	$projectHour = null;
	if (array_key_exists($date, $projectHours)){
		$projectHour = $projectHours[$calendar_entry->getDateString()];
	}
	?>
	<tr id="tr_<?=$calendar_entry->getDateString()?>" class="hrs_edit_row_init">
		<td class="hrs_date"><?php echo $calendar_entry->getDateString(); ?></td>
		<td class="hrs_project_id"><?php 
		if ($projectHour != null){ 
			echo $projectHour->getProjectNumber(); 
		}?>
		</td>
		<td class="hrs_project_name"><?php 
		if ($projectHour != null){ 
			echo $projectHour->getProjectName(); 
		}?>
		</td>
		<td class="hrs_position"><?php 
		if ($projectHour != null){ 
			echo $projectHour->getPosition(); 
		}?>
		</td>
		<td class="hrs_hours"><?php 
		if ($projectHour != null){
			echo $projectHour->getHours(); 
		}?>
		</td>
		<td class="hrs_hr_description"><?php 
		if ($projectHour != null){ 
			echo $projectHour->getDescription(); 
		}?>
		</td>
		<td>
			<?php if ($projectHour != null){ ?>
			<div class="btn_delete">&nbsp;</div>
			<?php } ?>
			<div id="btn_add_<?=$calendar_entry->getDateString()?>" class="btn_add">&nbsp;</div>
		</td>
	</tr>
	<?php
	}
?>
</table>
</form>