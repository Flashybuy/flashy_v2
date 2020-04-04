<?php
$con = mysqli_connect("localhost","root","" , "newflashybuy") or die("No server found here");

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
		public function login($email,$pass)
		{
			$login = mysqli_query($this->connect(),"select * from vendor where email ='$email' and pasword ='$pass'");
			$count = mysqli_num_rows($login);
			$fetch = mysqli_fetch_array($login);
			
			if ($count>0 && $fetch[19]=="1" &&$fetch[21]=="0"&&$fetch[22]=="0" ) 
			{

				session_start();
				$_SESSION['type']='vendor';
				$_SESSION['id']=$fetch[0];
				$_SESSION['name']=$fetch[1];
				$_SESSION['img']=$fetch[20];
				$id = $_SESSION['id'];	
				$login = date("Y-m-d H:i:s");
				$ip   = $_SERVER['REMOTE_ADDR'];
				$insert = mysqli_query($this->connect(),"insert into login_log(user_id,login_time,ip) values('$id','$login','$ip')");	
				header("Location:../dashboard.php");


			}
			else
			{
				header("Location:../login.php?msg=error");

			}

		}
		public function get_bank_detail($id)
		{
			$get_detail = mysqli_query($this->connect(),"select * from bank_details where user_id = $id");
			return $get_detail;
		}

		public function get_shop_detail($id)
		{
			$get_detail = mysqli_query($this->connect(),"select * from shop_detail where user_id = $id");
			return $get_detail;
		}

		public function check_record($id)
		{
			$check = mysqli_query($this->connect(),"select * from bank_details where user_id=$id");
			$count = mysqli_num_rows($check);
			if ($count>0) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function select_vendor($id)
		{
			$select = mysqli_query($this->connect(),"select * from vendor where id = $id");
			return $select;
		}

		public function make_json($user_id)
		{
			$select = mysqli_query($this->connect(),"select * from tbl_log where user_id = $user_id");
			$log_array = array();
			$file_name = $user_id;
			while ($data = mysqli_fetch_assoc($select)) 
				{
					$json_array[] = $data;
				} 
				file_put_contents('./data.txt',json_encode($json_array));

				
		}
		public function get_image($uid)
		{
			$image = mysqli_query($this->connect(),"select profile_image from vendor where id = $uid");
			return $image;
		}
		public function view_log()
		{
			$query = mysqli_query($this->connect(),"select * from tbl_log");
			return $query;
		}
		public function login_log($id,$login_time,$ip)
		{
				
		}
		public function get_crousel()
		{
			$fetch = mysqli_query($this->connect(),"select * from tbl_slider ORDER BY order_by");
			return $fetch;
		}


		public function get_banner()
		{
			$fetch = mysqli_query($this->connect(),"select * from tbl_banner");
			return $fetch;
		}

		public function get_crousel_by_id($id)
		{
			$crousel = mysqli_query($this->connect(),"select * from tbl_slider where id = $id");
			return $crousel;
		}
		
	}

?>



