<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
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
    -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing Example 2: Passing Variables To Another Page</title>
    </head>
    <body>
        <h1>
            Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing
            <br />
            Example 2: Passing Variables To Another Page
        </h1>
		<?php
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
					$message.= "<p><a href=\"javascript:history.back()\">Go back</a> and correct your entries, please.</p>\n";
				}
				else {
					$message = "<p>Here is what you chose for form variables:<br />" . print_r($_POST, true) . "</p>\n";
					unset($_POST);
				}
				
			}
			else {
				$message = "<p><strong>You have reached this page in error.</strong> Please use the <a href=\"form.php\">proper form</a>. </p>\n";
			}
			
			echo $message;
        ?>
        <p><a href="index.php">Example 1: Using A Single Page</a></p>
        <p><a href="validate.php">Example 3: Using cUrl And A Validation Include</a></p>
        <p><a href="http://www.dougv.com/blog/2009/06/13/retaining-values-in-a-form-following-php-postback-and-clearing-form-values-after-successful-php-form-processing/">Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing</a></p>
    </body>
</html>
