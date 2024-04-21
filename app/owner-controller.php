<?php

	include_once 'owner.php';

	class OwnerControlller extends Owner
	{
		
		function __construct($firstName, $lastName, $phoneNumber, $ID)
		{
			parent::__construct($firstName, $lastName, $phoneNumber, $ID);
		}

		public function addOwner(){

			if ($this->firstName() == false) 
			{
				echo "<script> alert('Please fill first name'); </script> .<script>window.location='../a.add-owner.php'</script>";
				exit();
			}
			if ($this->lastName() == false) 
			{
				echo "<script> alert('Please fill last name'); </script> .<script>window.location='../a.add-owner.php'</script>";
				exit();
			}
			if ($this->phoneNumber() == false) 
			{
				echo "<script> alert('Please fill phone number'); </script> .<script>window.location='../a.add-owner.php'</script>";
				exit();
			}

			$this->registerOwner();
		}

		public function modifyOwner(){
			$this->updateOwner();
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

		private function registerOwner(){
			$this->ownerCheck();
		}
	}


	class ChangePassword extends Password
	{
		
		function __construct($oldPassword, $newPassword, $confirmPassword)
		{
			parent::__construct($oldPassword, $newPassword, $confirmPassword);
		}

		public function updatePassword(){
			if ($_SESSION['role'] === "Admin") {
				
				if ($this->oldPassword() == false) 
				{
					echo "<script> alert('Please fill old password'); </script> .<script>window.location='../a.change-password.php'</script>";
					exit();
				}
				if ($this->newPassword() == false) 
				{
					echo "<script> alert('Please fill new password'); </script> .<script>window.location='../a.change-password.php'</script>";
					exit();
				}
				if ($this->confirmPassword() == false) 
				{
					echo "<script> alert('Please fill confirm password'); </script> .<script>window.location='../a.change-password.php'</script>";
					exit();
				}

				$this->adminPassword();

			} else if ($_SESSION['role'] === "Owner") {
				
				if ($this->oldPassword() == false) 
				{
					echo "<script> alert('Please fill old password'); </script> .<script>window.location='../o.change-password.php'</script>";
					exit();
				}
				if ($this->newPassword() == false) 
				{
					echo "<script> alert('Please fill new password'); </script> .<script>window.location='../o.change-password.php'</script>";
					exit();
				}
				if ($this->confirmPassword() == false) 
				{
					echo "<script> alert('Please fill confirm password'); </script> .<script>window.location='../o.change-password.php'</script>";
					exit();
				}

				$this->modifyPassword();
			} else {
				
				if ($this->oldPassword() == false) 
				{
					echo "<script> alert('Please fill old password'); </script> .<script>window.location='../c.change-password.php'</script>";
					exit();
				}
				if ($this->newPassword() == false) 
				{
					echo "<script> alert('Please fill new password'); </script> .<script>window.location='../c.change-password.php'</script>";
					exit();
				}
				if ($this->confirmPassword() == false) 
				{
					echo "<script> alert('Please fill confirm password'); </script> .<script>window.location='../c.change-password.php'</script>";
					exit();
				}

				$this->customerPassword();
			}
			
		}

		private function oldPassword()
		{
			$result ;
			if (empty($this->oldPassword)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function confirmPassword()
		{
			$result ;
			if (empty($this->confirmPassword)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function newPassword()
		{
			$result ;
			if (empty($this->newPassword)) 
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