<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Connect to the Pageclass with connections to the database
$page = new CPage($herbert['db']);

// Get content
$url = isset($_GET['url']) ? $_GET['url'] : "hem";
$content = $page->GetPage($url);
//myDump($content);

// Do it and store it all in variables in the Herbert container.
$herbert['title'] = $content['title'];
$editLink = isset($acronym) ? "<a href='edit.php?id={$content['id']}'>Uppdatera sidan</a>" : null;

$herbert['main'] = <<<EOD
<article>
<header>
<h1>{$content['title']}</h1>
</header>
 
{$content['data']}
 
<footer>
{$editLink}
</footer
</article>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
