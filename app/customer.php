<?php 


	class Customer
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
		private $customerID;
		
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

		protected function customerCheck(){
			$first01 = $this->firstName[0];
			$second01 = $this->firstName[1];
			$first02 = $this->lastName[0];
			$second02 = $this->lastName[1];

			$numbers = "12341234567890123455678901234561234123456789785678901234567890";
			$sub =  substr(str_shuffle($numbers), 0,4);
			$this->customerID = strtoupper($first01.$second01.$first02.$second02).$sub;
			
			$select = $this->con->prepare("select * from customer where customerID = ? ");
			$select->execute(array($this->customerID));
			if ($select->rowCount() > 0) {
				echo "yupo rejea kusajili mwengine";
			} else {
				if (isset($_SESSION['user']) && $_SESSION['user']  === "admin"){
					$this->ACustomerRegister();
				} else {
					$this->customerRegister();
				}
			}
 
		}

		protected function updateCustomer(){

			$update = $this->con->prepare("update customer set firstName = ? , lastName = ? , phoneNumber = ? where customerID = ? ");
			if ($update->execute([$this->firstName, $this->lastName, $this->phoneNumber , $this->ID])) {
				if (isset($_SESSION['user']) && $_SESSION['user']  === "admin"){
					echo "<script> alert('Successfully customer details updated '); </script> .<script>window.location='../a.manage-customer.php'</script>";
				} else {
					echo "<script> alert('Successfully customer details updated '); </script> .<script>window.location='../c.account.php'</script>";
				}
			} else {
				if (isset($_SESSION['user']) && $_SESSION['user']  === "admin"){
					echo "<script> alert('Something wrong please try again '); </script> .<script>window.location='../a.manage-customer.php'</script>";
				} else {
					echo "<script> alert('Something wrong please try again'); </script> .<script>window.location='../c.account.php'</script>";
				}
			}
		}

		private function customerRegister(){
			$query = $this->con->prepare("insert into customer values (?,?,?,?,?) ");
			if ($query->execute([$this->customerID, $this->firstName, $this->lastName, $this->phoneNumber, date('Y-m-d H:i:s')])){

				$st = "Customer";
				$ps = password_hash($this->customerID, PASSWORD_DEFAULT);
				$sql = $this->con->prepare("insert into userlog values (:id,:ps,:st)");
				$sql->execute(array('id' => $this->customerID, 'ps'=> $ps, 'st' => $st));
				header("location:../customer-register.php?userID=$this->customerID");
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../customer-register.php'</script>";
			}
		}

		private function ACustomerRegister(){
			$query = $this->con->prepare("insert into customer values (?,?,?,?,?) ");
			if ($query->execute([$this->customerID, $this->firstName, $this->lastName, $this->phoneNumber, date('Y-m-d H:i:s')])){

				$st = "Customer";
				$ps = password_hash($this->customerID, PASSWORD_DEFAULT);
				$sql = $this->con->prepare("insert into userlog values (:id,:ps,:st)");
				$sql->execute(array('id' => $this->customerID, 'ps'=> $ps, 'st' => $st));
				echo "<script> alert('Successfully customer registered '); </script> .<script>window.location='../a.manage-customer.php'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../a.add-customer.php'</script>";
			}
		}
	}