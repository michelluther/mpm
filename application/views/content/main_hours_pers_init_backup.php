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

<table id="hours_calendar">
</table>
