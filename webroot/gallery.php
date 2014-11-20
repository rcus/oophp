<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */
// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php');
$herbert['stylesheets'][] = 'css/figure.css'; 
$herbert['stylesheets'][] = 'css/gallery.css'; 
$herbert['stylesheets'][] = 'css/breadcrumb.css'; 

// Create a gallery object
$gallery = new CGallery(require 'gallery_config.php');

// Get incoming parameters
$path = isset($_GET['path']) ? $_GET['path'] : null;

// Get the breadcrumb
$breadcrumb = $gallery->getBreadcrumb($path);

// Read and present a single image or all images in the current directory
$gallery = $gallery->getGallery($path);

// Prepare content and store it all in variables in the Herbert container.
$herbert['title'] = "Ett galleri";
$herbert['main'] = <<<EOD
<h1>{$herbert['title']}</h1>

$breadcrumb

$gallery

EOD;



// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
