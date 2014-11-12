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

// Connect to the Contentclass with connections to the database
$content = new CContent($herbert['db']);

// Get parameter and validate
$id = isset($_POST['id']) ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
is_numeric($id) or die('Check: Id must be numeric.');

// Check if form was submitted
$output = null;
if (isset($_POST['save'])) {
    if ($content->DeleteContent($id)) {
        $output = 'Ditt val är sparat.';
    }
    else {
        $output = 'Valet sparades EJ.';
    }
}

// Select from database
if (!($c = $content->GetContentByID($id))) {
    die('Misslyckades: det finns inget innehåll med sådant id.');
}

// Sanitize content before using it.
$title     = htmlentities($c['title'], null, 'UTF-8');
$checked = ($c['deleted']) ? " checked" : "";

// Prepare content and store it all in variables in the Anax container.
$herbert['title'] = "Ta bort innehåll";
$herbert['debug'] = $content->Dump();

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>

<form method=post>
  <fieldset>
  <legend>Ta bort innehåll</legend>
  <input type='hidden' name='id' value='{$id}'/>
  <p><label><input type='checkbox' name='delete' value='delete'{$checked}> Lägg inlägget "{$title}" i papperskorgen</label></p>
  <p class=buttons><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/></p>
  <output>{$output}</output>
  </fieldset>
</form>
<p><a href='content.php'>Tillbaka till innehåll</a></p>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
