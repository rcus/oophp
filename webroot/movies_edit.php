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
$id     = isset($_POST['id'])     ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$title  = isset($_POST['title'])  ? strip_tags($_POST['title']) : null;
$year   = isset($_POST['year'])   ? strip_tags($_POST['year'])  : null;
$image  = isset($_POST['image'])  ? strip_tags($_POST['image']) : null;
$genre  = isset($_POST['genre'])  ? $_POST['genre'] : array();
$save   = isset($_POST['save'])   ? true : false;
$delete = isset($_POST['delete']) ? true : false;

// Check that incoming parameters are valid
is_numeric($id) or die('Check: Id must be numeric.');
is_array($genre) or die('Check: Genre must be array.');

// Check if form was submitted
$output = null;
if($save) {
    $sql = '
        UPDATE Movie SET
            title = ?,
            year = ?,
            image = ?
        WHERE 
            id = ?
    ';
    $movies->ExecuteQuery($sql, array($title, $year, $image, $id));
    $output = 'Informationen sparades.';
}
elseif($delete) {
    $sql = 'DELETE FROM Movie2Genre WHERE idMovie = ?';
    $movies->ExecuteQuery($sql, array($id));
    $movies->SaveDebug("Det raderades " . $movies->RowCount() . " rader från databasen.");

    $sql = 'DELETE FROM Movie WHERE id = ? LIMIT 1';
    $movies->ExecuteQuery($sql, array($id));
    $movies->SaveDebug("Det raderades " . $movies->RowCount() . " rader från databasen.");

    header('Location: movies.php');
}

// Get info on the movie
$sql = 'SELECT * FROM Movie WHERE id = ?';
$params = array($id);
$res = $movies->ExecuteSelectQueryAndFetchAll($sql, $params);
 
if(isset($res[0])) {
  $movie = $res[0];
}
else {
  die('Failed: There is no movie with that id');
}

// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Redigera film";

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
<form method=post>
  <fieldset>
  <legend>Uppdatera info om film</legend>
  <input type='hidden' name='id' value='{$id}'/>
  <p><label>Titel:<br/><input type='text' name='title' value='{$movie->title}'/></label></p>
  <p><label>År:<br/><input type='text' name='year' value='{$movie->year}'/></label></p>
  <p><label>Bild:<br/><input type='text' name='image' value='{$movie->image}'/></label></p>
  <p><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/> <input type='submit' name='delete' value='Ta bort film'/></p>
  <output>{$output}</output>
  </fieldset>
</form>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);