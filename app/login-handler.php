<?php
	include_once 'garage-controller.php';
	include_once 'customer-controller.php';
	include_once 'owner-controller.php';
	include_once 'service-controller.php';
	include_once 'carProblem-controller.php';

	if (isset($_POST['login']) && $_POST['login'] == "Signin") {
		$user = new Signin($_POST['username'], $_POST['password']);
		$user->login();
	} else if  (isset($_POST['register']) && $_POST['register'] == "Register") {
		$customer = new CreateCustomer($_POST['first'], $_POST['last'],$_POST['phone'],'ID');
		$customer->addCustomer();
	}  else if  (isset($_POST['changeCustomer']) && $_POST['changeCustomer'] == "Change") {
		$modify = new CreateCustomer($_POST['first'], $_POST['last'],$_POST['phone'],$_POST['id']);
		$modify->modifyCustomer();
	} else if  (isset($_POST['registerOwner']) && $_POST['registerOwner'] == "Register") {
		$owner = new OwnerControlller($_POST['first'], $_POST['last'],$_POST['phone'],'ID');
		$owner->addOwner();
	} else if  (isset($_POST['changeOwner']) && $_POST['changeOwner'] == "Change") {
		$modify = new OwnerControlller($_POST['first'], $_POST['last'],$_POST['phone'],$_POST['id']);
		$modify->modifyOwner();
	} else if  (isset($_POST['registerGarage']) && $_POST['registerGarage'] == "Register") {

		$garage = new GarageController($_POST['garageName'], $_POST['region'],$_POST['district'],$_POST['shehia'], $_POST['street'],$_POST['phone'],'ID');
		$garage->addGarage();
	} else if  (isset($_POST['changeGarage']) && $_POST['changeGarage'] == "Change") {

		$garage = new GarageController($_POST['garageName'], $_POST['region'],$_POST['district'],$_POST['shehia'], $_POST['street'],$_POST['phone'],$_POST['id']);
		$garage->modifyGarage();
	} else if  (isset($_POST['addService']) && $_POST['addService'] == "Register") {
		$service = new ServiceController($_POST['serviceName'], $_POST['serviceType'],$_POST['id'],$_POST['description']);
		$service->addService();
	}  else if  (isset($_POST['changeService']) && $_POST['changeService'] == "Change") {
		$modify = new ServiceController($_POST['serviceName'], $_POST['serviceType'],$_POST['id'],$_POST['description']);
		$modify->modifyService();
	}  else if (isset($_GET['serviceID']) && $_GET['serviceID'] === $_GET['serviceID']) {
		$modify = new ServiceController($_GET['serviceID'], $_GET['serviceID'],$_GET['serviceID'],$_GET['serviceID']);
		$modify->removeService();
	} else if (isset($_POST['ownerPassword']) && $_POST['ownerPassword'] === "Change password") {
		$update = new ChangePassword($_POST['old'], $_POST['new'],$_POST['confirm']);
		$update->updatePassword();
	}  else if (isset($_POST['addShehia']) && $_POST['addShehia'] === "Register") {
		$shehia = new ShehiaController($_POST['name'], $_POST['id']);
		$shehia->addShehia();
	} else if (isset($_POST['changeShehia']) && $_POST['changeShehia'] === "Change") {
		$modify = new ShehiaController($_POST['name'], $_POST['id']);
		$modify->modifyShehia();
	} else if (isset($_POST['addProblem']) && $_POST['addProblem'] === "Add car problem") {
		$problem = new CarProblemController($_POST['name'], $_POST['typeOfProblem'],$_POST['typeOfCar'], $_POST['region'],$_POST['district'],$_POST['shehia'], $_POST['street'],$_POST['description'],$_SESSION['user']);
		$problem->addProblem();
	} else if (isset($_POST['solvedProblem'])) {
		$solved = new SolvedProblemController($_POST['problemID'], $_POST['garageID']);
		$solved->addSolvedProblem();
	} else if (isset($_POST['pendingProblem'])) {
		$solved = new SolvedProblemController($_POST['problemID'], $_POST['garageID']);
		$solved->addChecked();
	} else {
		header("location:../");
	}