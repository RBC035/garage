<?php

	class Garage
	{
		protected $garageName;
		protected $region;
		protected $district;
		protected $shehia;
		protected $street;
		protected $phoneNumber;
		protected $ID;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		private $garageID;
		
		function __construct($garageName, $region, $district, $shehia, $street, $phoneNumber, $ID)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->garageName = trim($garageName);
			$this->region = trim($region);
			$this->district = trim($district);
			$this->shehia = trim($shehia);
			$this->street = trim($street);
			$this->phoneNumber = trim($phoneNumber);
			$this->ID = trim($ID);
		}

		protected function createGarage(){

			$this->garageID = strtoupper(uniqid());

			$query = $this->con->prepare("insert into garage values (?,?,?,?,?,?,?,?,?,?) ");
			if ($query->execute([$this->garageID, $this->garageName, $this->region, $this->district, $this->shehia, $this->street, $this->phoneNumber, $_SESSION['user'], date('Y-m-d H:i:s'), "Enable"])){
				echo "<script> alert('Successfully garage registered '); </script> .<script>window.location='../o.manage-garage.php'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../o.add-garage.php'</script>";
			}
		}

		protected function updateGarage(){

			$update = $this->con->prepare("update garage set garageName = ? , region = ? , district = ?, shehia = ?, street = ?, officeNumber = ?  where garageID = ? ");
			if ($update->execute([$this->garageName, $this->region, $this->district , $this->shehia, $this->street, $this->phoneNumber, $this->ID])) {
				echo "<script> alert('Successfully garage info changed '); </script> .<script>window.location='../o.manage-garage.php'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later '); </script> .<script>window.location='../o.manage-garage.php'</script>";
			}
		}
	}