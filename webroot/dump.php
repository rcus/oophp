<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */
// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "myDump()";

$herbert['main'] = <<<EOD
<h1>Exempel av <code>myDump()</code></h1>
<p>Denna sida använder funktionen <code>myDump()</code>. Funktionen finns i <code>/src/bootstrap.php</code>.</p>
EOD;

myDump($herbert);

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
