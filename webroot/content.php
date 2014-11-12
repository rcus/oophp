<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Connect to the Contentclass with connections to the database
$content = new CContent($herbert['db']);

// If someone has logged in, get username
$user = isset($_SESSION['auth']) ? $_SESSION['auth']->GetAcronym() : null;

// Get all content
/*
$sql = '
  SELECT *, (published <= NOW()) AS available
  FROM Content;
';
$res = $content->ExecuteSelectQueryAndFetchAll($sql);
*/
//$res = $content->GetAllContent();

// Put results into a list
$pages = null;
$posts = null;
$trash = null;
foreach($content->GetAllContent() AS $key => $val) {
    $li = "<li>".
        "(" . ($val->deleted ? "{$val->type}" : (!$val->available ? "inte " : null) . "publicerad") ."): ".
        htmlentities($val->title, null, 'UTF-8').
        " (".
            ($user ? "<a href='content_delete.php?id={$val->id}'>".($val->deleted ? "återställ" : "ta bort")."</a>" : "").
            (($user && !$val->deleted) ? " <a href='content_edit.php?id={$val->id}'>redigera</a> " : "").
            (!$val->deleted ? "<a href='" . $content->getUrlToContent($val) . "'>visa</a>" : "").
        ")".
        "</li>\n";
    if ($val->deleted) {
        $trash .= $li;
    }
    elseif ($val->type == 'page') {
        $pages .= $li;
    }
    elseif ($val->type == 'post') {
        $posts .= $li;
    }
}
$items = ($pages ? "<p>Sidor</p>\n<ul>\n" . $pages . "</ul>\n" : "").
    ($posts ? "<p>Blogginlägg <a href='content_post.php'>Visa alla</a></p>\n<ul>\n" . $posts . "</ul>\n" : "").
    ($trash ? "<p>Papperskorgen</p>\n<ul>\n" . $trash . "</ul>\n" : "");
$links = $user ? "<p><a href='content_add.php'>Lägg till innehåll</a> | <a href='content_reset.php'>Återställ databas</a></p>" : null;

// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Visa allt innehåll";
$herbert['debug'] = $content->Dump();

$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>
{$links}
{$items}
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
