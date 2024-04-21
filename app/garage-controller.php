<?php
	include_once 'main-garage.php';
	include_once 'garage.php';


	class Signin extends Login
	{
		
		function __construct($username, $password)
		{
			parent::__construct($username, $password);
		}

		public function login()
		{
			if ($this->Username() == false) 
			{
				echo "<script> alert('Please fill username'); </script> .<script>window.location='../'</script>";
				exit();
			}
			if ($this->Password() == false) 
			{
				echo "<script> alert('Please fill password'); </script> .<script>window.location='../'</script>";
				exit();
			}

			$this->usernameChecked();
		}

		private function Username()
		{
			$result ;
			if (empty($this->username)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function Password()
		{
			$result ;
			if (empty($this->password)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function usernameChecked()
		{
			 $this->passwordVerify();
		}
	}

	/**
	 * 
	 */
	class GarageController extends Garage
	{
		
		function __construct($garageName, $region, $district, $shehia, $street, $phoneNumber, $ID)
		{
			parent::__construct($garageName, $region, $district, $shehia, $street, $phoneNumber, $ID);
		}

		public function addGarage(){
			if ($this->garageName() == false) 
			{
				echo "<script> alert('Please fill garage name'); </script> .<script>window.location='../o.add-garage.php'</script>";
				exit();
			}

			if ($this->region() == false) 
			{
				echo "<script> alert('Please select region'); </script> .<script>window.location='../o.add-garage.php'</script>";
				exit();
			}

			if ($this->district() == false) 
			{
				echo "<script> alert('Please select district'); </script> .<script>window.location='../o.add-garage.php'</script>";
				exit();
			}

			if ($this->shehia() == false) 
			{
				echo "<script> alert('Please select shehia'); </script> .<script>window.location='../o.add-garage.php'</script>";
				exit();
			}

			if ($this->street() == false) 
			{
				echo "<script> alert('Please fill garage street'); </script> .<script>window.location='../o.add-garage.php'</script>";
				exit();
			}

			if ($this->phoneNumber() == false) 
			{
				echo "<script> alert('Please fill phone number'); </script> .<script>window.location='../o.add-garage.php'</script>";
				exit();
			}

			$this->createGarage();
		}

		public function modifyGarage(){
			$this->updateGarage();
		}

		private function shehia()
		{
			$result ;
			if ($this->shehia == "NULL") 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ; 
		}

		private function district()
		{
			$result ;
			if ($this->district == "NULL") 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function garageName()
		{
			$result ;
			if (empty($this->garageName)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function region()
		{
			$result ;
			if ($this->region == "NULL") 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function street()
		{
			$result ;
			if (empty($this->street)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function phoneNumber()
		{
			$result ;
			if (empty($this->phoneNumber)) 
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