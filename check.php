<?php
	
	session_start();

	
	
	if(isset($_REQUEST['submit']))
	{
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$gender = $_REQUEST['gender'];
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		$bloodgroup = $_REQUEST['select'];
		$ssc = $_REQUEST['ssc'];
		$hsc = $_REQUEST['hsc'];
		$bsc = $_REQUEST['bsc'];
		$msc = $_REQUEST['msc'];
		$photo = $_REQUEST['browse'];

		$init = substr($name,0,1);
		
		function name_check($n)
		{
			$valid = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','.','-',' '];
			$str = str_split($n,1);
			$flag = 0;
	
			for($i=0; $i<count($str); $i++)
			{
				for($j=0; $j<count($valid); $j++)
				{
					if($str[$i] == $valid[$j])
					{
						$flag++;
					}
				}
			}

			if($flag == strlen($n))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function email_check($e)
		{
			$str = explode('@',$e);
			$str2 = explode('.',$e);
			$str3 = explode(' ',$e);

			if(strlen($str[0])>0 && strlen($str[1])>0)
			{
				if(strlen($str2[0])>0 && strlen($str2[1])>0)
				{
					if(!isset($str3[1]))
					{
						return true;
					}
					else 
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		function date_check($d,$m,$y)
		{
			if($d>=1 && $d<=31 && $m>=1 && $m<=12 && $y>=1900 && $y<=2016)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		if(empty(trim($name)))
		{
			echo "Name field cannot be empty!";
		}
		else if($init == '.' || $init == '-')
		{
			echo "Name field must begin with a letter!";
		}
		else if(!name_check($name))
		{
			echo "Invalid input! Name Field can only contain lower & upper case alphabets, dot & dash.";
		}
		else if(str_word_count($name) < 2)
		{
			echo "Name field must contain two words!";
		}
		else if(empty(trim($email)))
		{
			echo "Email field cannot be empty!";
		}
		else if(!email_check($email))
		{
			echo "Invalid email!";
		}
		else if(empty($gender))
		{
			echo "Gender field cannot be empty!";
		}
		else if(empty($day) || empty($month) || empty($year))
		{
			echo "Date fields cannot be empty!";
		}
		else if(!date_check($day,$month,$year))
		{
			echo "Invalid Date!";
		}
		else if(empty($bloodgroup))
		{
			echo "Please select your bloodgroup.";
		}
		else if(empty($ssc) && empty($hsc) && empty($bsc) && empty($msc))
		{
			echo "Please select atleast one degree field.";
		}
		else if(empty($photo))
		{
			echo "Picture field cannot be empty!";
		}
		else
		{
			$_SESSION['name'] = $name;
			header("location: Home.php");
		}
	}
	else
	{
		header("location: form.php");
	}
?>