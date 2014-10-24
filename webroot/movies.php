<?php
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Connect to the Movieclass with connections to the database
$movies = new CMovies($herbert['db']);

// Get parameters
parse_str($_SERVER['QUERY_STRING'], $params);
$title = isset($_GET['title']) && !empty($_GET['title']) ? htmlentities($_GET['title']) : null;
$fromYear = isset($_GET['fromYear']) && !empty($_GET['fromYear']) ? $_GET['fromYear'] : null;
$toYear = isset($_GET['toYear']) && !empty($_GET['toYear']) ? $_GET['toYear'] : null;
$genre = isset($_GET['genre']) && !empty($_GET['genre']) ? $_GET['genre'] : null;

// Create moviehandlers
$moviehandlers = null;
if (isset($_SESSION['auth']) && $_SESSION['auth']->IsAuth()) {
    $moviehandlers = "<p><a href='movies_add.php'>Lägg till ny film</a> | <a href='movies_reset.php'>Återställ databas</a></p>";
}



// Get genres
$genres = $movies->GetGenres();
$selectGenre = "<select name='genre'><option value=''>-- Välj genre --</option>" . PHP_EOL;
foreach($genres as $val) {
    $selectGenre .= "<option value='$val'" . ($val==$genre ? " selected" : "") . ">$val</option>" . PHP_EOL;
}
$selectGenre .= "</select>" . PHP_EOL;

// Create movietable
$movietable = $movies->GetTable($params);

// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Visa filmer";

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
{$moviehandlers}
<form>
<fieldset>
<legend>Sök</legend>
<p><label>Sök film: <input type='search' name='title' value='{$title}'/></label>
<label>Genre: {$selectGenre}</label>
<label>Från år: <input type='search' name='fromYear' size='6' value='{$fromYear}'/></label>
<label>Till år: <input type='search' name='toYear' size='6' value='{$toYear}'/></label>
<input type='submit' name='submit' value='Sök'/>
<a href='?'>Rensa sök</a></p>
</fieldset>
</form>
{$movietable}
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);