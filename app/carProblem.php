<?php


	class CarProblem
	{
		protected $problemName;
		protected $problemType;
		protected $carType;
		protected $region;
		protected $district;
		protected $shehia;
		protected $street;
		protected $description;
		protected $problemID;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		
		function __construct($problemName,$problemType, $carType, $region, $district, $shehia, $street, $description, $problemID)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->problemName = trim($problemName);
			$this->problemType = trim($problemType);
			$this->carType = trim($carType);
			$this->region = trim($region);
			$this->district = trim($district);
			$this->shehia = trim($shehia);
			$this->street = trim($street);
			$this->description = trim($description);
			$this->problemID = trim($problemID);
		}

		protected function registerProblem(){
			$query = $this->con->prepare("insert into carproblem (problemName, description, typeOfCar, customerID, problemType, region, district, shehia, street, problemDate) values (?,?,?,?,?,?,?,?,?,?) ");
			if ($query->execute([$this->problemName, $this->description, $this->carType, $this->problemID, $this->problemType, $this->region, $this->district, $this->shehia,$this->street, date('Y-m-d H:i:s')])){

				$problem = $this->con->prepare("select problemID from carproblem where customerID = ? order by problemID desc ");
				$problem->execute(array($this->problemID));
				$row = $problem->fetch(PDO::FETCH_OBJ);
				$pid = $row->problemID;

				echo "<script> alert('Your problem has been recorded. Please click OK to get a help '); </script> .<script>window.location='../c.garage-help.php?id=$pid'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../c-index.php'</script>";
			}
		}
	}


	class SolvedProblem
	{

		protected $problemID;
		protected $garageID;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		
		function __construct($problemID,$garageID)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->problemID = trim($problemID);
			$this->garageID = trim($garageID);
		}

		protected function registerSolvedProblem(){
			$query = $this->con->prepare("insert into solvedproblem (problemID,garageID,solveDate,status) values (?,?,?,?) ");
			if ($query->execute([$this->problemID, $this->garageID, date('Y-m-d H:i:s'), "Solved"])){

				$update = $this->con->prepare("update carproblem set status = ?  where problemID = ? ");
				$update->execute(["Solved", $this->problemID]);

				$delete = $this->con->prepare("delete from checkedproblem where problemID = ? ");
				$delete->execute([$this->problemID]);

				echo "<script> alert('Thank you for using multi-channel management system. Your problem has been solved '); </script> .<script>window.location='../c.solved-problem.php'</script>";
			} else {
				$id = $this->problemID;
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../c.garage-help.php?id=$id'</script>";
			}
		}

		protected function checkedProblem(){
			$id = $this->problemID;
			$query = $this->con->prepare("insert into checkedproblem (problemID,garageID) values (?,?) ");
			if ($query->execute([$this->problemID, $this->garageID])){


				echo "<script> alert('Thank you for your response. Please click OK to get another help'); </script> .<script>window.location='../c.garage-help.php?edit=$id'</script>";
			} else {
				$id = $this->problemID;
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../c.garage-help.php?id=$id'</script>";
			}
		}
	}