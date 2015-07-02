<?php
/*
    	Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing
        Copyright (C) 2009 Doug Vanderweide
        
        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program.  If not, see <http://www.gnu.org/licenses/>.
	*/
if(isset($_POST['submit'])) {
	$ok = true;
	$message = "<p><strong>There are errors with this form.</strong> Please correct the following:</p>\n<ul>\n";
	
	if(trim($_POST['yname']) == "") {
		$message .= "<li>You did not provide your name.</li>\n";
		$ok = false;
	}
	if(!preg_match('/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/', $_POST['email'])) {
		$message .= "<li>You did not enter a properly formatted e-mail address.</li>\n";
		$ok = false;
	}
	if(trim($_POST['fruit']) == "") {
		$message .= "<li>You did not select a fruit.</li>\n";
		$ok = false;
	}
	if(empty($_POST['animal'])) {
		$message .= "<li>You did not select an animal.</li>\n";
		$ok = false;
	}
	if(trim($_POST['color']) == "") {
		$message .= "<li>You did not select a color.</li>\n";
		$ok = false;
	}
	if(empty($_POST['tool'])) {
		$message .= "<li>You did not select a tool.</li>\n";
		$ok = false;
	}
	
	if(!$ok) {
		$message .= "</ul>\n";
		echo $message;
	}
	else {
		foreach($_POST as $key => $value) {
			$fields .= "$key=$value&";
		}
		rtrim($fields, "&");
		
		unset($_POST);

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, "http://www.dougv.com/demo/php_echo_form_variables/handler2.php");
		curl_setopt($ch,CURLOPT_POST, count($_POST));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
		$result = curl_exec($ch);
		curl_close($ch);
	}
}
?>
