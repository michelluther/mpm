<h1>Projektarbeit</h1>
<p>Dies sind Deine Projekte</p>
<?php 
	foreach ($projects as $project){
		echo '<p>' . $project->name . '</p>';
	}
?>