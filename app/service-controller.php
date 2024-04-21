<?php

	include_once 'service.php';

	class ServiceController extends Service
	{
		
		function __construct($serviceName, $serviceType, $garadeID, $description)
		{
			parent::__construct($serviceName, $serviceType, $garadeID, $description);
		}

		public function addService(){
			if ($this->serviceName() == false) 
			{
				echo "<script> alert('Please fill service  name'); </script> .<script>window.location='../o.manage-service.php'</script>";
				exit();
			}
			if ($this->serviceType() == false) 
			{
				echo "<script> alert('Please fill service type'); </script> .<script>window.location='../o.manage-service.php'</script>";
				exit();
			}
			if ($this->description() == false) 
			{
				echo "<script> alert('Please fill description'); </script> .<script>window.location='../o.manage-service.php'</script>";
				exit();
			}

			$this->registerService();
		}

		public function modifyService(){
			$this->updateService();
		}

		public function removeService(){
			$this->deleteService();
		}

		private function serviceName()
		{
			$result ;
			if (empty($this->serviceName)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}
		private function serviceType()
		{
			$result ;
			if (empty($this->serviceType)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function description()
		{
			$result ;
			if (empty($this->description)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}
	}



	class ShehiaController extends Shehia
	{
		
		function __construct($shehiaName, $shehiaID)
		{
			parent::__construct($shehiaName, $shehiaID);
		}

		public function addShehia(){
			if ($this->shehiaName() == false) 
			{
				echo "<script> alert('Please fill shehia  name'); </script> .<script>window.location='../a.manage-district.php'</script>";
				exit();
			}

			$this->registerShehia();
		}

		public function modifyShehia(){
			$this->updateShehia();
		}

		private function shehiaName()
		{
			$result ;
			if (empty($this->shehiaName)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}


	}