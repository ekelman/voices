<?php
/**This class is used for uploading the file and also create thumbnail for that on the user wish.
It also contains functions returning type,name,size.**/
define('FILE_EXTENSION_NOT_SUPPORTED',101);
define('FILE_SIZE_TOO_LARGE',102);
define('FILE_NOT_UPLOADED',103);
define('FILE_UPLOADED_SUCCESSFULLY',104);
define('ARGUMENT_TYPE_NOT_VALID',105);
define('ERROR_IMAGECOPYRESIZED',106);
define('ERROR_MOVE_UPLOADED_FILE',107);
define('THUMBNAIL_N_FILE_UPLOADED',108);

class fileUpDownload
{	
	/**varibles are declared here being used in the functions**/

	var $input_filename;
	var $ext_allowed=array();
	var $file_name;
	var $tmp_file_name;
	var $file_size;
	var $max_size;
	var $file_type;
	var $uploaddir;
	var $file_path;
    var $thumbnail=bool;
	var $thumbDirectory;
	var $new_thumbnail;
	var $thumb_path;
	var $thumbImg;
	var $thumb_size;
	
	
    

   /****This is a constructor having the name of the input element with type="file". The second argument is an array that contains the allowed extensions of files to be uploaded. The third argument is of boolean type. if it is set to true,the thumbnails'll also be created otherwise not.****/

   function fileUpDownload($input_filename,$ext_allowed,$thumbnail)
	{
	   $this->input_filename=$input_filename;
	   $this->ext_allowed=$ext_allowed;
	   $this->thumbnail=$thumbnail;
	}

/*****************************************************************************************************************/
	
	/*This function returns the type of the file to be uploaded*/

	function getFileType()
	{
       $this->file_type = $_FILES[$this->input_filename]['type'];
	   return  $this->file_type;
	}

/*****************************************************************************************************************/
	
	/**This function returns the size of the file to be uploaded**/

	function getFileSize()
	{
        $this->tmp_file_name  = $_FILES[$this->input_filename]['tmp_name'];
		$this->file_size=filesize($this->tmp_file_name);
		return $this->file_size;
	}

/****************************************************************************************************************/
	
	/**This function returns the name of the file to be uploaded**/

	function getFileName()
	{
		$this->file_name = strtolower(str_replace(" ", "_",$_FILES[$this->input_filename]['name']));
		return $this->file_name;
	}

/****************************************************************************************************************/
	
	/*This function checks the availability of the type of the file in the allowed array*/

   function checkFileType()
	{
		$this->file_type = $this->getFileType();
         		
	if(in_array($this->file_type,$this->ext_allowed))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

/****************************************************************************************************************/
	
	/**This function checks the size of the file to be uploaded. It shouldn't exceed the maximum size specified.**/

	function checkFileSize($max_size,$filepath='')
	{
		$this->max_size=$max_size;
		
		$file_size=$this->getFileSize();
		if($file_size < $this->max_size)
		{
				
			$thumbsize=getimagesize($filepath);
			$w=$thumbsize[0];
			
			$h=$thumbsize[1];
			
			if($h>1200 || $w>1200)
			{
				return false;
			}
			return true;
		}
		else
		{
			return false;
		}
	}

	/*****************************************************************************************************************/

	/**This is the main function used to upload the file to the destination specified in the first argument.The second argument is used in check_size().the third argument is the directory name where to thumbnails get stored but if not specified,it is null.the fourth argument is thumb dimensions given
	NOTE:fourth argument should be multidimensional array.One can specify dimensions for creating more than one thumbnail of different dimensions.For e.g it would create two thumbnails of 64x64 and 105x105
	$thumb_dimensions=array( 0=>array(64,64),1=>array(105,105));**/  

	function fileUpload($upload_dest,$max_size,$thumbDirectory=NULL,$thumb_dimensions=NULL,$size,$thumbname)
	{
		$req_thumb	=	$thumb_dimensions;
		$this->tmp_file_name	=	$_FILES[$this->input_filename]['tmp_name'];
		$this->uploaddir		=	$upload_dest;
		$this->file_name		=	$this->getFileName();		
		$this->file_path 		=	$this->uploaddir.$thumbname;
		$this->thumbDirectory	=	$thumbDirectory;
		if($this->checkFileType())
		{
			if($this->checkFileSize($max_size,$this->tmp_file_name))
			{
				if(is_uploaded_file($this->tmp_file_name))
				 {
				    $a=list($width, $height, $type, $attr) = getimagesize($this->tmp_file_name);
					$result = move_uploaded_file($this->tmp_file_name,$this->file_path );
					//echo $this->tmp_file_name."---".$this->file_path;
					//die("--");
					if (!$result)
					{
						return ERROR_MOVE_UPLOADED_FILE;
					}
					else
					{
						if(($this->thumbnail==true)&&($this->thumbDirectory!=NULL))
						{
							$aspect_ratio=max($a[0],$a[1])/min($a[0],$a[1]);
							if($a[1]>$a[0])
							{	
								//die("1");
								$new_height=$thumb_dimensions[0][1];
								$new_width=$new_height/$aspect_ratio;
								$thumb_dimensions=array( 0=>array($new_height,$new_width));
								$res =$this->createThumbnail($thumb_dimensions,$this->thumbDirectory,$thumbname);
								
								//$thumbsize=getimagesize($this->thumbDirectory.$thumbname);

								// $w=$thumbsize[0];
								// $h=$thumbsize[1];
								// if($h>$req_thumb[0][0])
								// {
								
									// $new_width=$req_thumb[0][1];
									// $per_width=($new_width/$h)*100;
									// $new_height=round(($w*$per_width)/100);
									// $thumb_dimensions=array( 0=>array($new_height,$new_width));
									// $res =$this->createThumbnail($thumb_dimensions,$this->thumbDirectory,$thumbname);
								// }
							}
							else  // width> height
							{	
								//die("2");
								$new_width=$thumb_dimensions[0][0];
								$new_height=$new_width/$aspect_ratio;
								$thumb_dimensions=array( 0=>array($new_height,$new_width));
								$res =$this->createThumbnail($thumb_dimensions,$this->thumbDirectory,$thumbname);
								// $thumbsize=getimagesize($this->thumbDirectory.$thumbname);
								// $w=$thumbsize[0];
								// $h=$thumbsize[1];
								// if($h>$req_thumb[0][1])
								// {
									// $new_height=$req_thumb[0][1];
									// $per_height=($new_height/$h)*100;
									// $new_width=round(($w*$per_height)/100);
									// $thumb_dimensions=array( 0=>array($new_height,$new_width));
									// $res =$this->createThumbnail($thumb_dimensions,$this->thumbDirectory,$thumbname);
									
									
								// }
							}
							return $res;
						}
						else
						{   
                            return FILE_UPLOADED_SUCCESSFULLY;  
						}
					}	
				}
				else
				{
					return FILE_NOT_UPLOADED;
				}
			}
			else
			{
				return FILE_SIZE_TOO_LARGE;
			}
		}
		else
		{
			return FILE_EXTENSION_NOT_SUPPORTED;
		}
	}

/*****************************************************************************************************************/

	/**This function is used to open specific image according to its extension.Its creates a resourse for the specific picture.The inbuilt function takes file name as its argument.**/  
	
	function open_image()
	{ 
		switch($this->file_type)
		{
		# jpeg: 
		case "image/jpeg":
		$im = @imagecreatefromjpeg($this->file_path); 
		if ($im !== false) 
		{ 
			return $im; 
		} 
		break;

		case "image/pjpeg":
		$im = @imagecreatefromjpeg($this->file_path); 
		if ($im !== false) 
		{ 
			return $im; 
		} 
		break;

		#bmp:
		case "image/bmp":
		$im = @imagecreatefrombmp($this->file_path); 
		if ($im !== false) 
		{ 
			return $im; 
		} 
		break;

		# gif: 
		case "image/gif":
		$im = @imagecreatefromgif($this->file_path); 
		if ($im !== false) 
		{ 
			return $im; 
		} 
		break;

		# png:
		case "image/x-png":
		$im = @imagecreatefrompng($this->file_path); 
		if ($im !== false)
		{ 
			return $im; 
		} 
		break;

		# wbmp:
        case "image/bmp":
		$im = @imagecreatefromwbmp($this->file_path); 
		if ($im !== false) 
		{
			return $im;
		} 
		break;

		# xbm: 
		case "image/xbm":
		$im = @imagecreatefromxbm($this->file_path); 
		if ($im !== false) 
		{ 
			return $im;
		} 
		break;

		# Try and load from string: 
		case "image/string":
		$im = @imagecreatefromstring(file_get_contents($this->file_path)); 
		if ($im !== false) 
		{
			return $im; 
		} 
		break;
		
		
		}
		return false; 
		
	} 

/*****************************************************************************************************************/

	/**this function is used to create thumbnail according to height and width specified and thumbnails get stored in the directory specified.**/ 

	function createThumbnail($thumb_dimensions,$thumbDirectory,$thumbname)
	{
		if(is_array($thumb_dimensions))
		{  
			//$num_elements=count($thumb_dimensions);
            foreach ($thumb_dimensions as $key => $value)
			{
				if(is_array($value))
				{
					$thumbHeight=$thumb_dimensions[$key][0];
                    $thumbWidth=$thumb_dimensions[$key][1];
					//echo $thumbHeight."<br>". $thumbWidth;
                    $srcImg = $this->open_image();
		            $thumbImg = @imagecreatetruecolor($thumbWidth, $thumbHeight);
                    $this->thumbImg= $thumbImg;
		           
					$ret=imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, @imagesx($srcImg), @imagesy($srcImg));
					if($ret)
					{
						$pos=strpos("$this->file_name",".");
		 				$str=substr("$this->file_name",0,$pos);
						$new_thumbnail=$thumbname;
						$new_thumbnail="$this->thumbDirectory".$new_thumbnail;
						
					//	$this->new_thumbnail="Auth_letter".$thumbHeight."x".$thumbWidth.".jpg";
						$this->new_thumbnail=$new_thumbnail;
						$this->thumb_path=$new_thumbnail;
						imagejpeg($thumbImg,$new_thumbnail,100);
					}
					else
					{
						return ERROR_IMAGECOPYRESIZED;
					}
				}
				else
				{
					return ARGUMENT_TYPE_NOT_VALID;
				}
			}
		}
		else
		{
			return ARGUMENT_TYPE_NOT_VALID;
		}
		return THUMBNAIL_N_FILE_UPLOADED;
	}
	

};
?>