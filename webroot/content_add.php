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
if (isset($_POST['save'])) {
    // Connect to the Contentclass with connections to the database
    $content = new CContent($herbert['db']);

    if($content->AddContent()) {
        header("Refresh: 0; content.php");
    }
    else {
        $output = 'Informationen sparades EJ.<br>';
    }
}

// Prepare content and store it all in variables in the Herbert container.
$herbert['title'] = "Lägg till innehåll";

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>

<form method=post>
  <fieldset>
  <legend>Uppdatera innehåll</legend>
  <p><label>Titel:<br/><input type='text' name='title'/></label></p>
  <p><label>Url:<br/><input type='text' name='url'/></label></p>
  <p><label>Text:<br/><textarea name='data'></textarea></label></p>
  <p><label>Type:<br/><input type='text' name='type'/></label></p>
  <p><label>Filter:<br/><input type='text' name='filter'/></label></p>
  <p><label>Publiseringsdatum:<br/><input type='text' name='published'/></label></p>
  <p class=buttons><input type='submit' name='save' value='Spara'/></p>
  <output>{$output}</output>
  </fieldset>
</form>
<p><a href='content.php'>Tillbaka till innehåll</a></p>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
