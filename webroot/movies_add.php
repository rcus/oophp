<?php
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Auth needed
if (!(isset($_SESSION['auth']) && $_SESSION['auth']->IsAuth())) {
    header('Location: admin.php');
}

// Connect to a MySQL database using PHP PDO
$movies = new CMovies($herbert['db']);

// Get parameters 
$title  = isset($_POST['title'])  ? strip_tags($_POST['title']) : null;
$add = isset($_POST['add']) ? true : false;

// Check if form was submitted
if($add) {
    $sql = 'INSERT INTO Movie (title) VALUES (?)';
    $movies->ExecuteQuery($sql, array($title));
    $movies->SaveDebug();
    header('Location: movies_edit.php?id=' . $movies->LastInsertId());
    exit;
}


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Lägg till film";

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
<form method=post>
  <fieldset>
  <legend>Lägg till film</legend>
  <p><label>Titel:<br/><input type='text' name='title'/></label></p>
  <p><input type='submit' name='add' value='Lägg till'/></p>
  </fieldset>
</form>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);