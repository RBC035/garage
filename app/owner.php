<?php

	class Owner
	{

		protected $firstName;
		protected $lastName;
		protected $phoneNumber;
		protected $ID;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		private $ownerID;
		
		function __construct($firstName, $lastName, $phoneNumber, $ID)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->firstName = trim($firstName);
			$this->lastName = trim($lastName);
			$this->phoneNumber = trim($phoneNumber);
			$this->ID = trim($ID);
		}

		protected function ownerCheck(){
			$first01 = $this->firstName[0];
			$second01 = $this->firstName[1];
			$first02 = $this->lastName[0];
			$second02 = $this->lastName[1];

			$numbers = "12341234567890123455678901234561234123456789785678901234567890";
			$sub =  substr(str_shuffle($numbers), 0,6);
			$this->ownerID = strtoupper($first01.$second01.$first02.$second02).$sub;
			$select = $this->con->prepare("select * from owner where ownerID = ? ");
			$select->execute(array($this->ownerID));
			if ($select->rowCount() > 0) {
				echo "yupo rejea kusajili mwengine";
			} else {
				$this->createOwner();
			}
		}

		protected function updateOwner(){
			$update = $this->con->prepare("update owner set firstName = ? , lastName = ? , phoneNumber = ? where ownerID = ? ");
			if ($update->execute([$this->firstName, $this->lastName, $this->phoneNumber , $this->ID])) {
				if (isset($_SESSION['user']) && $_SESSION['user']  === "admin"){
					echo "<script> alert('Successfully owner details updated '); </script> .<script>window.location='../a.manage-owner.php'</script>";
				} else {
					echo "<script> alert('Successfully information changed '); </script> .<script>window.location='../o.account.php'</script>";
				}
			} else {
				if (isset($_SESSION['user']) && $_SESSION['user']  === "admin"){
					echo "<script> alert('Something wrong please try again '); </script> .<script>window.location='../a.manage-owner.php'</script>";
				} else {
					echo "<script> alert('Something wrong on change information, Please try again later '); </script> .<script>window.location='../o.account.php'</script>";
				}
			}
		}

		private function createOwner(){
			$query = $this->con->prepare("insert into owner values (?,?,?,?) ");
			if ($query->execute([$this->ownerID, $this->firstName, $this->lastName, $this->phoneNumber])){

				$st = "Owner";
				$ps = password_hash($this->ownerID, PASSWORD_DEFAULT);
				$sql = $this->con->prepare("insert into userlog values (:id,:ps,:st)");
				$sql->execute(array('id' => $this->ownerID, 'ps'=> $ps, 'st' => $st));
				echo "<script> alert('Successfully owner registered '); </script> .<script>window.location='../a.manage-owner.php'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../a.add-owner.php'</script>";
			}
		}
	}

	class Password
	{
		protected $oldPassword;
		protected $newPassword;
		protected $confirmPassword;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		
		function __construct($oldPassword, $newPassword, $confirmPassword)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->oldPassword = trim($oldPassword);
			$this->newPassword = trim($newPassword);
			$this->confirmPassword = trim($confirmPassword);
		}

		protected function modifyPassword(){
			$this->passwordVerify();
		}

		protected function adminPassword(){
			$user = $this->con->prepare("select * from userlog where username = ?");
            $user->execute([$_SESSION['user']]);
            $row = $user->fetch(PDO::FETCH_OBJ);

			if (password_verify($this->oldPassword, $row->password)){
				if ($this->newPassword === $this->confirmPassword) {
					$hash = password_hash($this->newPassword, PASSWORD_DEFAULT);
					$update = $this->con->prepare("update userlog set password = ? where username = ? ");
					if ($update->execute([$hash, $_SESSION['user']])) {
						echo "<script> alert('Successfully password changed'); </script> .<script>window.location='../a.change-password.php'</script>";
					} else {
						echo "<script> alert('Something wrong please try again later'); </script> .<script>window.location='../a.change-password.php'</script>";
					}
				} else {
					echo "<script> alert('New password does not match to confirm password'); </script> .<script>window.location='../a.change-password.php'</script>";
				}
			} else {
				echo "<script> alert('Old password does not match, please try again'); </script> .<script>window.location='../a.change-password.php'</script>";
			}
		}

		protected function customerPassword(){
			$user = $this->con->prepare("select * from userlog where username = ?");
            $user->execute([$_SESSION['user']]);
            $row = $user->fetch(PDO::FETCH_OBJ);

			if (password_verify($this->oldPassword, $row->password)){
				if ($this->newPassword === $this->confirmPassword) {
					$hash = password_hash($this->newPassword, PASSWORD_DEFAULT);
					$update = $this->con->prepare("update userlog set password = ? where username = ? ");
					if ($update->execute([$hash, $_SESSION['user']])) {
						echo "<script> alert('Successfully password changed'); </script> .<script>window.location='../c.change-password.php'</script>";
					} else {
						echo "<script> alert('Something wrong please try again later'); </script> .<script>window.location='../c.change-password.php'</script>";
					}
				} else {
					echo "<script> alert('New password does not match to confirm password'); </script> .<script>window.location='../c.change-password.php'</script>";
				}
			} else {
				echo "<script> alert('Old password does not match, please try again'); </script> .<script>window.location='../c.change-password.php'</script>";
			}
		}

		private function passwordVerify(){
			$user = $this->con->prepare("select * from userlog where username = ?");
            $user->execute([$_SESSION['user']]);
            $row = $user->fetch(PDO::FETCH_OBJ);

			if (password_verify($this->oldPassword, $row->password)){
				if ($this->newPassword === $this->confirmPassword) {
					$hash = password_hash($this->newPassword, PASSWORD_DEFAULT);
					$update = $this->con->prepare("update userlog set password = ? where username = ? ");
					if ($update->execute([$hash, $_SESSION['user']])) {
						echo "<script> alert('Successfully password changed'); </script> .<script>window.location='../o.change-password.php'</script>";
					} else {
						echo "<script> alert('Something wrong please try again later'); </script> .<script>window.location='../o.change-password.php'</script>";
					}
				} else {
					echo "<script> alert('New password does not match to confirm password'); </script> .<script>window.location='../o.change-password.php'</script>";
				}
			} else {
				echo "<script> alert('Old password does not match, please try again'); </script> .<script>window.location='../o.change-password.php'</script>";
			}
		}
	}