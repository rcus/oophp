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
    if ($content->EditContent($id)) {
        $output = 'Informationen sparades.';
    }
    else {
        $output = 'Informationen sparades EJ.';
    }
}

// Select from database
if (!($c = $content->GetContentByID($id))) {
    die('Misslyckades: det finns inget innehåll med sådant id.');
}

// Sanitize content before using it.
$title     = htmlentities($c['title'], null, 'UTF-8');
$slug      = htmlentities($c['slug'], null, 'UTF-8');
$url       = htmlentities($c['url'], null, 'UTF-8');
$data      = htmlentities($c['data'], null, 'UTF-8');
$type      = htmlentities($c['type'], null, 'UTF-8');
$filter    = htmlentities($c['filter'], null, 'UTF-8');
$published = htmlentities($c['published'], null, 'UTF-8');

// Prepare content and store it all in variables in the Anax container.
$herbert['title'] = "Uppdatera innehåll";
$herbert['debug'] = $content->Dump();

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>

<form method=post>
  <fieldset>
  <legend>Uppdatera innehåll</legend>
  <input type='hidden' name='id' value='{$id}'/>
  <p><label>Titel:<br/><input type='text' name='title' value='{$title}'/></label></p>
  <p><label>Slug:<br/><input type='text' name='slug' value='{$slug}'/></label></p>
  <p><label>Url:<br/><input type='text' name='url' value='{$url}'/></label></p>
  <p><label>Text:<br/><textarea name='data'>{$data}</textarea></label></p>
  <p><label>Type:<br/><input type='text' name='type' value='{$type}'/></label></p>
  <p><label>Filter:<br/><input type='text' name='filter' value='{$filter}'/></label></p>
  <p><label>Publiseringsdatum:<br/><input type='text' name='published' value='{$published}'/></label></p>
  <p class=buttons><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/></p>
  <output>{$output}</output>
  </fieldset>
</form>
<p><a href='content.php'>Tillbaka till innehåll</a></p>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
