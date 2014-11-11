<?php
/**
 * Config-file for Herbert. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Herbert paths.
 *
 */
define('HERBERT_INSTALL_PATH', __DIR__ . '/..');
define('HERBERT_THEME_PATH', HERBERT_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(HERBERT_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Herbert variable.
 *
 */
$herbert = array();


/**
 * Site wide settings.
 *
 */
$herbert['lang'] = 'sv';
$herbert['title_append'] = ' | Herbert';

$herbert['header'] = <<<EOD
<a href='./' class='sitelogo'><img src='img/me.png' alt='Me Logo'/></a>
<span class='sitetitle'>It's all about me</span>
<span class='siteslogan'>Min me-sida i kursen Databaser och Objektorienterad PHP-programmering</span>
EOD;

$herbert['menu'] = array(
  'callback' => 'modifyNavbar',
  'items' => array(
    'home' => array('text'=>'HEM', 'url'=>'./', 'class'=>null),
    'report' => array('text'=>'REDOVISNING', 'url'=>'report.php', 'class'=>null),
    'pig' => array('text'=>'KASTA GRIS', 'url'=>'pig.php', 'class'=>null),
    'movies' => array('text'=>'FILMER', 'url'=>'movies.php', 'class'=>null),
    'admin' => array('text'=>'LOGGA ' . ((isset($_SESSION['auth']) && $_SESSION['auth']->IsAuth()) ? 'UT' : 'IN'), 'url'=>'admin.php', 'class'=>null),
    'source' => array('text'=>'KÄLLKOD', 'url'=>'source.php', 'class'=>null),
  )
);

$herbert['footer'] = <<<EOD
<footer>
	<p>© 2014 Marcus Törnroth | <a href='https://github.com/rcus/oophp'>GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></p>
</footer>
EOD;


/**
 * Settings for the database.
 *
 */
$herbert['db']['dsn']            = 'mysql:host=localhost;dbname=matg12;'; //blu-ray.student.bth.se
$herbert['db']['username']       = 'userbth'; //matg12
$herbert['db']['password']       = 'passwordbth';
$herbert['db']['driver_options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");


/**
 * Theme related settings.
 *
 */
$herbert['stylesheets'] = array('css/style.css');
$herbert['favicon']    = 'favicon.ico';


/**
 * Settings for JavaScript.
 *
 */
$herbert['modernizr'] = 'js/modernizr.js';
$herbert['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'; // Set to null to disable jQuery 
$herbert['javascript_include'] = array();
//$herbert['javascript_include'] = array('js/main.js'); // To add extra javascript files


/**
 * Google analytics.
 *
 */
$herbert['google_analytics'] = null; // Enter your Google Analytics ID 'UA-XXXXXXXX-X'
