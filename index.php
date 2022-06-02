<?php
/**
 * This class is calls the required pages through the controller
 * @author William Wittig
 * @version 1.0
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the necessary files
require_once('vendor/autoload.php');

// Start the session
session_start();

// Test DataLayer class
$dataLayer = new DataLayer();

// Create instance of the base class
$f3 = Base::instance();

// Creating an instance of the controller class
$con = new Controller($f3);

// Define a default route
// Home page rendering
$f3->route('GET /', function()
{
	// Displaying the page
    global $con;
	$con->home();
});

$f3->route('GET|POST /personalInfo', function()
{
	// Displaying the page
	global $con;
    $con->personalInfo();
});

$f3->route('GET|POST /profile', function()
{
	// Displaying the page
	global $con;
	$con->profile();
});

$f3->route('GET|POST /interests', function($f3)
{
	// Displaying the page
	global $con;
	$con->interests();
});

$f3->route('GET|POST /profileSummary', function()
{
	global $con;
	$con->profileSummary();
});

// Run fat free
$f3->run();