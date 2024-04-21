<?php

	session_start();

	/**
	 * 
	 */
	class Login
	{
		protected $username;
		protected $password;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;

		function __construct($username, $password){
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->username = trim($username);
			$this->password = trim($password);
		}

		protected function passwordVerify(){
			$user = $this->con->prepare("select * from userlog where username = ? ");
			$user->execute(array($this->username));
			if ($user->rowCount() > 0) {
				$fetch = $user->fetch(PDO::FETCH_OBJ);
				if (password_verify($this->password, $fetch->password)) {
					$_SESSION['user'] = $fetch->username;
					$_SESSION['role'] = $fetch->status;

					if ($_SESSION['role'] == 'Admin') 
					{
						header("location:../a-index.php");
					}
					if ($_SESSION['role'] == 'Customer') 
					{
						header("location:../c-index.php");
					}
					if ($_SESSION['role'] == 'Owner') 
					{
						header("location:../o-index.php");
					} else {
						echo "<script> alert('Un define user detals'); </script> .<script>window.location='../'</script>";
					}
				} else {
					echo "<script> alert('Password was not recognize. Please try again'); </script> .<script>window.location='../'</script>";
				}
			} else {

				echo "<script> alert('Username was not recognize. Please try again'); </script> .<script>window.location='../'</script>";
			}
		}
	}