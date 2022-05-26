<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the necessary files
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validation.php');

// Start the session
session_start();

// Create instance of the base class
$f3 = Base::instance();

// Creating an instance of the controller class
$con = new Controller($f3);

// Define a default route
// Home page rendering
$f3->route('GET /', function() {
	// Displaying the page
    $view = new Template();
    echo $view->render('views/home.html');

	// Clear the session array
	session_destroy();
});

$f3->route('GET|POST /personalInfo', function($f3) {
	// var_dump($_POST);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// ----- Validation -----
		// First name
		if (isset($_POST['fname']) && validName($_POST['fname'])) {
			$fname = $_POST['fname'];
		} else {
			$f3->set('errors["fname"]', 'Please enter a first name.');
		}

		// Last name
		if (isset($_POST['lname']) && validName($_POST['lname'])) {
			$lname = $_POST['lname'];
		} else {
			$f3->set('errors["lname"]', 'Please enter a last name.');
		}

		// Age
		if (isset($_POST['age']) && validAge($_POST['age'])) {
			$age = $_POST['age'];
		} else {
			$f3->set('errors["age"]', 'Please enter an age.');
		}

		// Session variables (No validation needed)
		$genderOptions = $_POST['genderOptions'];

		// Phone number
		if (isset($_POST['phoneNum']) && validPhone($_POST['phoneNum'])) {
			$phoneNum = $_POST['phoneNum'];
		} else {
			$f3->set('errors["phoneNum"]', 'Please enter a valid phone number.');
		}

		if (isset($_POST['premium'])) {
			$_SESSION['member'] = new PremiumMember("None", "None");
			$_SESSION['member']->setFname($fname);
			$_SESSION['member']->setLname($lname);
			$_SESSION['member']->setAge($age);
			$_SESSION['member']->setGender($genderOptions);
			$_SESSION['member']->setPhone($phoneNum);
		} else {
			$_SESSION['member'] = new Member($fname, $lname, $age, $genderOptions,
				$phoneNum);
		}

		// Redirect to profile summary if there are no errors
		if (empty($f3->get('errors'))) {
			header('location: profile');
		}
	}
	// For templating
	$f3->set('genders', getGenders());

	// Displaying the page
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

$f3->route('GET|POST /profile', function($f3) {
	var_dump($_SESSION["member"]);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// ----- Validation -----
		// Email
		if (isset($_POST['email']) && validEmail($_POST['email'])) {
			$_SESSION['email'] = $_POST['email'];
		} else {
			$f3->set('errors["email"]', 'Please enter a valid email.');
		}

		// Redirect to profile summary if there are no errors
		if (empty($f3->get('errors'))) {
			header('location: interests');
		}
	}
	// Session variables (No validation needed)
	$_SESSION['state'] = $_POST['state'];
	$_SESSION['seekingOptions'] = $_POST['seekingOptions'];
	$_SESSION['bio'] = $_POST['bio'];

	// For templating
	$f3->set('genders', getGenders());
	$f3->set('states', getStates());

	// Displaying the page
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('GET|POST /interests', function($f3) {
	// var_dump($_POST);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// ----- Validation -----
		// Indoor interests
		$indoorInterests = "None";
		// Creating a string
		if (isset($_POST['indoorInterests'])) {
			if (!empty($_POST['indoorInterests'])) {
				$indoorInterests = implode(", ", $_POST['indoorInterests']);
			}
		}
		// Error message
		if (!validIndoor($_POST['indoorInterests'])) {
			$f3->set('errors["indoorInterests"]', 'An invalid outdoor interest was detected.');
		}
		// Setting session variable
		$_SESSION['indoorInterests'] = $indoorInterests;

		// Outdoor interests
		$outdoorInterests = "None";
		// Creating a string
		if (isset($_POST['outdoorInterests'])) {
			if (!empty($_POST['outdoorInterests'])) {
				$outdoorInterests = implode(", ", $_POST['outdoorInterests']);
			}
		}
		// Error message
		if (!validOutdoor($_POST['outdoorInterests'])) {
			$f3->set('errors["outdoorInterests"]', 'An invalid outdoor interest was detected.');
		}
		// Setting session variable
		$_SESSION['outdoorInterests'] = $outdoorInterests;

		// Redirect to profile summary if there are no errors
		if (empty($f3->get('errors'))) {
			header('location: profileSummary');
		}
	}
	// For templating
	$f3->set('indoorInterests', getIndoorInterests());
	$f3->set('outdoorInterests', getOutdoorInterests());

	// Displaying the page
    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('GET|POST /profileSummary', function() {
	// var_dump($_SESSION);

	// Setting variables for not selected
	if (empty($_SESSION['genderOptions'])) {
		$_SESSION['genderOptions'] = "Not selected";
	}
	if ($_SESSION['state'] == "Select a state") {
		$_SESSION['state'] = "Not selected";
	}
	if (empty($_SESSION['seekingOptions'])) {
		$_SESSION['seekingOptions'] = "Not selected";
	}
	if (empty($_SESSION['bio'])) {
		$_SESSION['bio'] = "No bio found";
	}

    $view = new Template();
    echo $view->render('views/profileSummary.html');

	// Clear the session array
	session_destroy();
});

// Run fat free
$f3->run();