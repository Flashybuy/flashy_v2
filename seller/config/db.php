<?php 
	class connection
	{
		public function connect()
		{
			$conn = mysqli_connect("localhost","root","","newflashybuy");
			return $conn;
		}
		public function db_insert($query)
		{
			$query = mysqli_query($this->connect(),$query);
			if ($query>0) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function get_cat()
		{
			$select = mysqli_query($this->connect(),"select * from categories");
			return $select;
		}
		
	}
?>