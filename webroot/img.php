<?php
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php');

// Prepare page content
$imgsrc = "<img src='image/movie/kopps.jpg'>";
$tagimg = htmlentities($imgsrc);

// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Visa bild";
$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
{$tagimg}<br/>
{$imgsrc}
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
