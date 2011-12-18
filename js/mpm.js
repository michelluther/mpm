$(document).ready( function(){
//	Initialize Form Selection Data etc...
	var project = new Mpm_hour_project();
	project.set_name("TestProjekt");
	project.alert_name();
	var project2 = new Mpm_hour_project();
	project2.set_name("TestProjekt 2");
	project2.alert_name();
	project.alert_name();
	$( "#hrs_calendar_table" ).click( function(e) {
		alert( base_url );
		var target = $(e.target);
		var trFound = false;
		while(trFound == false && target.is('tr') == false){
			var parent = target.parent();
			trFound = parent.is('tr.hrs_edit_row_init');
			target = parent;
		}
		if(trFound == true){
			target.toggleClass('highlight');
			makeTrEditable(target);
		}
	});
});

function makeTrEditable(target){
	var projectIdTd = target.children('.hrs_project_id');
	projectIdTd.empty();
	projectIdTd.append('<select><option>eins</option><option>zwei</option></select>');
}

function Mpm_hour_projects(){
	this.projectsArray = new Array();
	this.status;
	
	$.get(base_url + 'mpm/init_project_data', );
}

Mpm_hour_projects.prototype.get_project = function(id){
	return this.projectsArray[id];
} 

function Mpm_hour_project(id, name){
	this.id;
	this.name;
	this.positions;
	this.tasks;
}

Mpm_hour_project.prototype.set_name = function(name){
	this.name = name;
}

Mpm_hour_project.prototype.get_name = function(){
	return this.name;
}

Mpm_hour_project.prototype.get_positions = function(){
	return this.positions;
}