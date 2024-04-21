<?php

	include_once 'customer.php';

	class CreateCustomer extends Customer
	{
		
		function __construct($firstName, $lastName, $phoneNumber, $ID)
		{
			parent::__construct($firstName, $lastName, $phoneNumber, $ID);
		}

		public function addCustomer(){
			if (isset($_SESSION['user']) && $_SESSION['user']  === "admin"){
				$this->adminRegister();
			} else {
				
				if ($this->firstName() == false) 
				{
					echo "<script> alert('Please fill first name'); </script> .<script>window.location='../customer-register.php'</script>";
					exit();
				}
				if ($this->lastName() == false) 
				{
					echo "<script> alert('Please fill last name'); </script> .<script>window.location='../customer-register.php'</script>";
					exit();
				}
				if ($this->phoneNumber() == false) 
				{
					echo "<script> alert('Please fill phone number'); </script> .<script>window.location='../customer-register.php'</script>";
					exit();
				}

				$this->registerCustomer();
			}


		} 

		public function modifyCustomer(){
			$this->updateCustomer();
		}

		private function adminRegister(){
			if ($this->firstName() == false) 
			{
				echo "<script> alert('Please fill first name'); </script> .<script>window.location='a.add-customer.php'</script>";
				exit();
			}
			if ($this->lastName() == false) 
			{
				echo "<script> alert('Please fill last name'); </script> .<script>window.location='a.add-customer.php'</script>";
				exit();
			}
			if ($this->phoneNumber() == false) 
			{
				echo "<script> alert('Please fill phone number'); </script> .<script>window.location='a.add-customer.php'</script>";
				exit();
			}

			$this->registerCustomer();
		}

		private function firstName()
		{
			$result ;
			if (empty($this->firstName)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function lastName()
		{
			$result ;
			if (empty($this->lastName)) 
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

		private function registerCustomer(){
			$this->customerCheck();
		}
	}
