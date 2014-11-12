<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Connect to the Pageclass with connections to the database
$page = new CPage($herbert['db']);

// If someone has logged in, get username
$user = isset($_SESSION['auth']) ? $_SESSION['auth']->GetAcronym() : null;

// Get content
$url = isset($_GET['url']) ? $_GET['url'] : "hem";
$content = $page->GetPage($url);


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = $content['title'];
$editLink = $user ? "<a href='content_edit.php?id={$content['id']}'>Uppdatera sidan</a>" : null;

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
