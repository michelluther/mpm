<?php

$this->load->view('header');

if ($banner['view'] != null) {
	$this->load->view('banner/' . $banner['view'], $banner['data'] );
}

if ($navigation['view'] != null){
	$this->load->view('navigation/' . $navigation['view'], $navigation['data']);
}
?>
<div id="content_wrapper"><?php 
if($msg != null ){
	$this->load->view('system_feedback', $msg);
}
?>
<div id="content">
<?php
$this->load->view('content/' . $content['view'], $content['data']);
?>
</div>
</div>
<?php
$this->load->view('footer/' . $footer['view'], $footer['data']);