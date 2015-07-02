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
        <title>Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing Example 3: Using cUrl And A Validation Include</title>
        <link href="../demo.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            br {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
     	<h1>
            Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing
            <br />
            Example 3: Using cUrl And A Validation Include
        </h1>
        
		<?php require_once('include.php'); ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label>Your name: <input type="text" name="yname" value="<?php echo $_POST['yname']; ?>" /></label>
            <br />
            <label>E-mail address: <textarea name="email" cols="30" rows="3"><?php echo $_POST['email']; ?></textarea></label>
            <br />
            <label>Pick a fruit:</label>
            <label><input type="radio" name="fruit" value="banana" <?php if($_POST['fruit'] == "banana") { echo "checked=\"checked\""; } ?> /> Banana</label>
            <label><input type="radio" name="fruit" value="apple" <?php if($_POST['fruit'] == "apple") { echo "checked=\"checked\""; } ?> />Apple</label>
            <br />
            <label>Choose an animal:</label>
            <label><input type="checkbox" name="animal[]" value="bear" <?php if(isset($_POST['animal'])) { foreach($_POST['animal'] as $tmp) { if($tmp == "bear") { echo "checked=\"checked\""; break; }}} ?> />Bear</label>
            <label><input type="checkbox" name="animal[]" value="dog" <?php if(isset($_POST['animal'])) { foreach($_POST['animal'] as $tmp) { if($tmp == "dog") { echo "checked=\"checked\""; break; }}} ?> />Dog</label>
            <label><input type="checkbox" name="animal[]" value="moose" <?php if(isset($_POST['animal'])) { foreach($_POST['animal'] as $tmp) { if($tmp == "moose") { echo "checked=\"checked\""; break; }}} ?> />Moose</label>
            <br />
            <label>Select a color:
                <select name="color">
                    <option value="red" <?php if($_POST['color'] == "red") { echo "selected=\"selected\""; } ?>>Red</option>
                    <option value="green" <?php if($_POST['color'] == "green") { echo "selected=\"selected\""; } ?>>Green</option>
                    <option value="blue" <?php if($_POST['color'] == "blue") { echo "selected=\"selected\""; } ?>>Blue</option>
                </select>
            </label>
            <br />
            <label>Select as many tools as you like:
                <select name="tool[]" multiple="multiple" size="5">
                    <option value="hammer" <?php if(isset($_POST['tool'])) { foreach($_POST['tool'] as $tmp) { if($tmp == "hammer") { echo "selected=\"selected\""; break; }}} ?>>Hammer</option>
                    <option value="saw" <?php if(isset($_POST['tool'])) { foreach($_POST['tool'] as $tmp) { if($tmp == "saw") { echo "selected=\"selected\""; break; }}} ?>>Saw</option>
                    <option value="screwdriver" <?php if(isset($_POST['tool'])) { foreach($_POST['tool'] as $tmp) { if($tmp == "screwdriver") { echo "selected=\"selected\""; break; }}} ?>>Screwdriver</option>
                    <option value="level" <?php if(isset($_POST['tool'])) { foreach($_POST['tool'] as $tmp) { if($tmp == "level") { echo "selected=\"selected\""; break; }}} ?>>Level</option>
                    <option value="ladder" <?php if(isset($_POST['tool'])) { foreach($_POST['tool'] as $tmp) { if($tmp == "ladder") { echo "selected=\"selected\""; break; }}} ?>>Ladder</option>
                </select>
            </label>
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
        <p><a href="index.php">Example 1: Using A Single Page</a></p>
        <p><a href="form.php">Example 2: Passing Variables To Another Page</a></p>
        <p><a href="http://www.dougv.com/blog/2009/06/13/retaining-values-in-a-form-following-php-postback-and-clearing-form-values-after-successful-php-form-processing/">Retaining Values In A Form Following PHP Postback And Clearing Form Values After Successful PHP Form Processing</a></p>
	</body>
</html>
