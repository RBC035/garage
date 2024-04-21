<?php

	include_once 'carProblem.php';

	class CarProblemController extends CarProblem
	{
		
		function __construct($problemName,$problemType, $carType, $region, $district, $shehia, $street, $description, $problemID)
		{
			parent::__construct($problemName,$problemType, $carType, $region, $district, $shehia, $street, $description, $problemID);
		}

		public function addProblem(){
			if ($this->problemName() == false) 
			{
				echo "<script> alert('Please fill car problem'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->problemType() == false) 
			{
				echo "<script> alert('Please fill car problem type'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->carType() == false) 
			{
				echo "<script> alert('Please fill car  type'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->region() == false) 
			{
				echo "<script> alert('Please select region'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->district() == false) 
			{
				echo "<script> alert('Please select district'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->shehia() == false) 
			{
				echo "<script> alert('Please select shehia'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->street() == false) 
			{
				echo "<script> alert('Please fill  street'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			if ($this->description() == false) 
			{
				echo "<script> alert('Please fill car  description'); </script> .<script>window.location='../c-index.php'</script>";
				exit();
			}

			$this->registerProblem();
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

		private function carType()
		{
			$result ;
			if (empty($this->carType)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function problemType()
		{
			$result ;
			if (empty($this->problemType)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function problemName()
		{
			$result ;
			if (empty($this->problemName)) 
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



	class SolvedProblemController extends SolvedProblem
	{
		
		function __construct($problemID,$garageID)
		{
			parent::__construct($problemID,$garageID);
		}

		public function addSolvedProblem(){
			$this->registerSolvedProblem();
		}

		public function addChecked(){
			$this->checkedProblem();
		}
	}