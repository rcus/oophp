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

// Restore the database to its original settings
$sql      = 'movies.sql';
$mysql    = '/usr/bin/mysql';
$host     = 'localhost';
$login    = 'userbth';
$password = 'passwordbth';
$output = null;
 
if(isset($_POST['restore']) || isset($_GET['restore'])) {
    $cmd = "$mysql -h{$host} -u{$login} -p{$password} < $sql 2>&1";
    $res = exec($cmd);
    $output = "<p>Databasen är återställd</p>";
}


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Återställ filmdatabas";

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
<form method=post>
<input type=submit name=restore value='Återställ databasen'/>
<output>{$output}</output>
</form>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);