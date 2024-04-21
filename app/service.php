<?php


	class Service
	{
		protected $serviceName;
		protected $serviceType;
		protected $garadeID;
		protected $description;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		private $row;
		
		function __construct($serviceName, $serviceType, $garadeID, $description)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->serviceName = trim($serviceName);
			$this->serviceType = trim($serviceType);
			$this->garadeID = trim($garadeID);
			$this->description = trim($description);

			$service = $this->con->prepare("select * from service where serviceID = ?  ");
            $service->execute([$this->garadeID]);
            $this->row = $service->fetch(PDO::FETCH_OBJ);
		}

		protected function registerService(){
			$query = $this->con->prepare("insert into service (serviceName,serviceType,decription,garageID) values (?,?,?,?) ");
			if ($query->execute([$this->serviceName, $this->serviceType, $this->description, $this->garadeID])){

				echo "<script> alert('Successfully service registered '); </script> .<script>window.location='../o.manage-service-g.php?id=$this->garadeID'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../o.add-service.php?id=$this->garadeID'</script>";
			}
		}

		protected function updateService(){
			$id = $this->row->garageID;
			$update = $this->con->prepare("update service set serviceName = ? , serviceType = ? , decription = ? where serviceID = ? ");
			if ($update->execute([$this->serviceName, $this->serviceType, $this->description , $this->garadeID])) {
				echo "<script> alert('Successfully Service info changed '); </script> .<script>window.location='../o.manage-service-g.php?id=$id'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later '); </script> .<script>window.location='../o.manage-service-g.php?id=$id'</script>";
			}
		}

		protected function deleteService(){
			$id = $this->row->garageID;
			$update = $this->con->prepare("delete from service  where serviceID = ? ");
			if ($update->execute([$this->garadeID])) {
				echo "<script> alert('Successfully Service info deleted '); </script> .<script>window.location='../o.manage-service-g.php?id=$id'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later '); </script> .<script>window.location='../o.manage-service-g.php?id=$id'</script>";
			}
		}
	}


	class Shehia
	{
		protected $shehiaName;
		protected $shehiaID;

		private $host ;
		private $server;
		private $pass;
		private $dbname;
		private $con;
		private $dsn;
		
		function __construct($shehiaName, $shehiaID)
		{
			$this->host = "localhost";
			$this->server = "root";
			$this->pass = "";
			$this->dbname = "garage";

			$this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
			$this->con = new PDO($this->dsn, $this->server, $this->pass);

			$this->shehiaName = trim($shehiaName);
			$this->shehiaID = trim($shehiaID);

		}

		protected function registerShehia(){
			$query = $this->con->prepare("insert into shehia (shehiaName,districtName) values (?,?) ");
			if ($query->execute([$this->shehiaName, $this->shehiaID])){

				echo "<script> alert('Successfully shehia registered '); </script> .<script>window.location='../a.view-shehia.php?id=$this->shehiaID'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later. '); </script> .<script>window.location='../a.add-shehia.php?id=$this->shehiaID'</script>";
			}
		}

		protected function updateShehia(){
			$shehia = $this->con->prepare("select * from shehia where shehiaID = ?  ");
            $shehia->execute([$this->shehiaID]);
            $this->row = $shehia->fetch(PDO::FETCH_OBJ);
            $district =  $this->row->districtName;

			$update = $this->con->prepare("update shehia set shehiaName = ?  where shehiaID = ? ");
			if ($update->execute([$this->shehiaName, $this->shehiaID])) {
				echo "<script> alert('Successfully shehia info changed '); </script> .<script>window.location='../a.view-shehia.php?id=$district'</script>";
			} else {
				echo "<script> alert('Something wrong please try again later '); </script> .<script>window.location='../a.add-shehia.php?edit=$district'</script>";
			}
		}
	}