<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

$response_data  = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format


$Lottoname= $_REQUEST['lotto_name'];
$lotoNumber= substr($Lottoname,0,6);
$lotoYear = substr($Lottoname,7,2);
$lotoRound = substr($Lottoname,10,2);
$lotoSet = substr($Lottoname,13,2);


$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];


$lottodate =   $_REQUEST['lotto_date'];
$lottotype =   $_REQUEST['lotto_type'];

	
if(empty($fileName))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = 'uploads/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path

	/*	if(!file_exists($upload_path . $fileName))
		{*/
			// check file size '5MB'
			if($fileSize < 5000000){
				move_uploaded_file($tempPath , $upload_path . $fileName); // move file from system temporary path to our upload folder path 
			}
			else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
	/*	}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}*/
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
	$conn = mysqli_connect("localhost","paruay_one","3X~7mct6","anon_db");
	if (!$conn)
	{
		echo json_encode(array("message" => mysqli_connect_error(), "status" => false));		
	}else{		
                
		$SQL = "INSERT IGNORE into  lottery (id,lottery_year,lottery_round,lottery_set,lottery_number,lottery_number1,lottery_number2,lottery_number3,lottery_number4,lottery_number5,lottery_number6,lottery_img,lottery_date,lottery_type,lotto_code) VALUES ('".str_replace(".jpg","",$fileName).
		"','".$lotoYear."','".$lotoRound."','".$lotoSet."','".$lotoNumber."',".
		"SUBSTRING(lottery_number,1,1),SUBSTRING(lottery_number,2,1) ,SUBSTRING(lottery_number,3,1) ,SUBSTRING(lottery_number,4,1) ,SUBSTRING(lottery_number,5,1) ,SUBSTRING(lottery_number,6,1)".",'".
		"https://www.xn--22cjb6ezayg2ae6cd2deb3uf1hgoh8f.com/uploads/".
		$fileName."','".$lottodate."',".$lottotype.", concat(left(id,  6),SUBSTRING(id,7, 6)))";
		$query = mysqli_query($conn,$SQL);



        echo json_encode(array("message" => "Image Uploaded Successfully".$SQL, "status" => true));	      
	}

}

?>