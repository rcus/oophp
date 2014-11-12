<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 

// Connect to the Postclass with connections to the database
$post = new CPost($herbert['db']);

// If someone has logged in, get username
$user = isset($_SESSION['auth']) ? $_SESSION['auth']->GetAcronym() : null;

// Get content
$slug = isset($_GET['slug']) ? $_GET['slug'] : null;
$content = $post->GetPost($slug);


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = 'Bloggen';
$herbert['main'] = null;
if(isset($content[0])) {
    foreach($content as $c) {
        if($slug) {
            $herbert['title'] = "$c->title | " . $herbert['title'];
        }
        $editLink = $user ? "<a href='content_edit.php?id={$c->id}'>Uppdatera posten</a>" : null;

        $herbert['main'] .= <<<EOD
<section>
  <article>
  <header>
  <h1><a href='content_post.php?slug={$c->slug}'>{$c->title}</a></h1>
  </header>

  {$c->data}

  <footer>
  {$editLink}
  </footer>
  </article>
</section>
EOD;
    }
}
elseif($slug) {
    $herbert['main'] = "Det fanns inte en sådan bloggpost.";
}
else {
    $herbert['main'] = "Det fanns inga bloggposter.";
}


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
