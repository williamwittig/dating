<?php

/**
 * This class controls the rendering and functionality of each page
 * @author William Wittig
 * @version 1.0
 */
class Controller
{
	private $_f3;

	/**
	 * This method constructs a controller object
	 * @param $f3
	 */
	function __construct($f3)
	{
		$this->_f3 = $f3;
	}

	/**
	 * Renders the home page
	 * @return void
	 */
	function home()
	{
		// Render home page
		$view = new Template();
		echo $view->render('views/home.html');

		// Clear the session array
		session_destroy();
	}

	/**
	 * Renders the personal info page
	 * @return void
	 */
	function personalInfo()
	{
		// If the form was posted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// ----- Validation -----
			// First name
			if (isset($_POST['fname']) && Validation::validName($_POST['fname'])) {
				$fname = $_POST['fname'];
			} else {
				$fname = "";
				$this->_f3->set('errors["fname"]', 'Please enter a first name.');
			}
			$this->_f3->set('fname', $fname);

			// Last name
			if (isset($_POST['lname']) && Validation::validName($_POST['lname'])) {
				$lname = $_POST['lname'];
			} else {
				$fname = "";
				$this->_f3->set('errors["lname"]', 'Please enter a last name.');
			}
			$this->_f3->set('lname', $lname);

			// Age
			if (isset($_POST['age']) && Validation::validAge($_POST['age'])) {
				$age = $_POST['age'];
			} else {
				$age = -1;
				$this->_f3->set('errors["age"]', 'Please enter an age.');
			}
			$this->_f3->set('age', $age);

			if (isset($_POST['genderOptions'])) {
				$genderOptions = $_POST['genderOptions'];
			} else {
				$genderOptions = "None Selected";
			}
			$this->_f3->set('genderOptions', $genderOptions);

			// Phone number
			if (isset($_POST['phoneNum']) && Validation::validPhone($_POST['phoneNum'])) {
				$phoneNum = $_POST['phoneNum'];
			} else {
				$phoneNum = "";
				$this->_f3->set('errors["phoneNum"]', 'Please enter a valid phone
				// number.');
			}
			$this->_f3->set('phoneNum', $phoneNum);

			// Creating member object
			if (isset($_POST['premium'])) {
				// Premium member
				$member = new PremiumMember([], []);
				$member->setFname($fname);
				$member->setLname($lname);
				$member->setAge($age);
				$member->setGender($genderOptions);
				$member->setPhone($phoneNum);
				$_SESSION['member'] = $member;
			} else {
				// Member
				$_SESSION['member'] = new Member($fname, $lname, $age, $genderOptions,
					$phoneNum);
			}

			// Redirect to profile summary if there are no errors
			if (empty($this->_f3->get('errors'))) {
				header('location: profile');
			}
		}
		// For templating
		$this->_f3->set('genders', DataLayer::getGenders());

		// Rendering the personal info page
		$view = new Template();
		echo $view->render('views/personalInfo.html');
	}

	/**
	 * Renders the profile page
	 * @return void
	 */
	function profile()
	{
		// If the form was posted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// ----- Validation -----
			// Email
			if (isset($_POST['email']) && Validation::validEmail($_POST['email'])) {
				$email = $_POST['email'];
			} else {
				$email = "No Email";
				$this->_f3->set('errors["email"]', 'Please enter a valid email.');
			}
			$this->_f3->set('email', $email);

			// State
			if (isset($_POST['state'])) {
				$state = $_POST['state'];
				$this->_f3->set('state', $state);
			}

			// Seeking options
			if (isset($_POST['seekingOptions'])) {
				$seekingOptions = $_POST['seekingOptions'];
			} else {
				$seekingOptions = "Not Selected";
			}
			$this->_f3->set('seekingOptions', $seekingOptions);

			// Biography
			if (isset($_POST['bio'])) {
				$bio = $_POST['bio'];
			} else {
				$bio = "Not Selected";
			}
			$this->_f3->set('bio', $bio);

			$_SESSION['member']->setEmail($email);
			$_SESSION['member']->setState($state);
			$_SESSION['member']->setSeeking($seekingOptions);
			$_SESSION['member']->setBio($bio);

			// Redirect to profile summary if there are no errors
			if (empty($this->_f3->get('errors')) && get_class($_SESSION['member']) == 'PremiumMember') {
				header('location: interests');
			} else if (empty($this->_f3->get('errors'))) {
				header('location: profileSummary');
			}
		}
		// For templating
		$this->_f3->set('genders', DataLayer::getGenders());
		$this->_f3->set('states', DataLayer::getStates());

		$view = new Template();
		echo $view->render('views/profile.html');
	}

	/**
	 * Renders the interests page
	 * @return void
	 */
	function interests()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// ----- Validation -----
			// Indoor interests
			if (!Validation::validIndoor($_POST['indoorInterests'])) {
				// Error message
				$this->_f3->set('errors["indoorInterests"]', 'An invalid outdoor interest was detected.');
			} else {
				if (!empty($_POST['indoorInterests'])) {
					// Setting session variable
					$indoorInterests = $_POST['indoorInterests'];
				} else {
					// Setting to 'None' if no indoor interests were selected
					$indoorInterests = array("None");
				}
				// Setting member attribute and putting in the hive
				$_SESSION['member']->setIndoorInterests($indoorInterests);
				$this->_f3->set('indoorInterests', $indoorInterests);
			}

			// Outdoor interests
			if (!Validation::validOutdoor($_POST['outdoorInterests'])) {
				// Error message
				$this->_f3->set('errors["outdoorInterests"]', 'An invalid outdoor interest was detected.');
			} else {
				if (!empty($_POST['outdoorInterests'])) {
					// Setting session variable
					$outdoorInterests = $_POST['outdoorInterests'];
				} else {
					// Setting to 'None' if no outdoor interests were selected
					$outdoorInterests = array("None");
				}
				// Setting member attribute and putting in the hive
				$_SESSION['member']->setOutdoorInterests($outdoorInterests);
				$this->_f3->set('outdoorInterests', $outdoorInterests);
			}

			// Redirect to profile summary if there are no errors
			if (empty($this->_f3->get('errors'))) {
				header('location: profileSummary');
			}
		}
		// For templating
		$this->_f3->set('indoorInterests', DataLayer::getIndoorInterests());
		$this->_f3->set('outdoorInterests', DataLayer::getOutdoorInterests());

		$view = new Template();
		echo $view->render('views/interests.html');
	}

	/**
	 * Renders the profile summary
	 * @return void
	 */
	function profileSummary()
	{
		$view = new Template();
		echo $view->render('views/profileSummary.html');

		session_destroy();
	}
}