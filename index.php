<!--
Author: William Wittig
Filename: index.php
Version: 1.0
Description: This is the controller for the dating site
-->

<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create instance of the base class
$f3 = Base::instance();

session_start();

// Define a default route
// Home page rendering
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /personalInfo', function() {
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

$f3->route('POST /profile', function() {
    // var_dump($_POST);
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['genderOptions'] = $_POST['genderOptions'];
    $_SESSION['phoneNum'] = $_POST['phoneNum'];

    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('POST /interests', function() {
    // var_dump($_POST);
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seekingOptions'] = $_POST['seekingOptions'];
    $_SESSION['bio'] = $_POST['bio'];

    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('POST /profileSummary', function() {
    $view = new Template();

    // var_dump($_POST);
    $indoorInterests = "None";
    if (!empty($_POST['indoorInterests'])) {
        $indoorInterests = implode(", ", $_POST['indoorInterests']);
    }
    $_SESSION['indoorInterests'] = $indoorInterests;

    $outdoorInterests = "";
    if (!empty($_POST['outdoorInterests'])) {
        $outdoorInterests = implode(", ", $_POST['outdoorInterests']);
    }
    $_SESSION['outdoorInterests'] = $outdoorInterests;

    echo $view->render('views/profileSummary.html');
});

// Run fat free
$f3->run();