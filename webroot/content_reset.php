<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Check that user has logged in
$user = isset($_SESSION['auth']) ? $_SESSION['auth']->GetAcronym() : null;
isset($user) or die('Check: You must login to access this page.');

// Check if form was submitted
$output = null;
if (isset($_POST['restore'])) {
    // Connect to the Contentclass with connections to the database
    $content = new CContent($herbert['db']);

    $demo = ($_POST['demo'] === 'true');
    if ($content->CreateContentTable($demo)) {
        $output = "Databasen är nu återställd " . ($demo ? "med" : "utan") . " innehåll.";
    }
    else {
        $output = "Problem med att återställa databasen.";
    }
    $output .= "<br /><a href='content.php'>Visa allt innehåll</a>";
}

// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Återställ databasen";

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
<form method=post>
<p><select name=demo>
<option value='true'>Databas med innehåll</option>
<option value='false'>Tom databas</option>
</select>
<input type=submit name=restore value='Återställ databasen'/></p>
<output>{$output}</output>
</form>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
