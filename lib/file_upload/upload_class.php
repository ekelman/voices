 <?php
class upload {

    /**
     * Uploaded file name
     *
     * @access public
     * @var string
     */
    var $file_src_name;

    /**
     * Uploaded file name body (i.e. without extension)
     *
     * @access public
     * @var string
     */
    var $file_src_name_body;

    /**
     * Uploaded file name extension
     *
     * @access public
     * @var string
     */
    var $file_src_name_ext;

    /**
     * Uploaded file MIME type
     *
     * @access public
     * @var string
     */
    var $file_src_mime;

    /**
     * Uploaded file size, in bytes
     *
     * @access public
     * @var double
     */
    var $file_src_size;

    /**
     * Holds eventual PHP error code from $_FILES
     *
     * @access public
     * @var string
     */
    var $file_src_error;

    /**
     * Uloaded file name, including server path
     *
     * @access private
     * @var string
     */
    var $file_src_pathname;

    /**
     * Destination file name
     *
     * @access private
     * @var string
     */
    var $file_dst_path;

    /**
     * Destination file name
     *
     * @access public
     * @var string
     */
    var $file_dst_name;

    /**
     * Destination file name body (i.e. without extension)
     *
     * @access public
     * @var string
     */
    var $file_dst_name_body;

    /**
     * Destination file extension
     *
     * @access public
     * @var string
     */
    var $file_dst_name_ext;

    /**
     * Destination file name, including path
     *
     * @access private
     * @var string
     */
    var $file_dst_pathname;

    /**
     * Source image width
     *
     * @access private
     * @var integer
     */
    var $image_src_x;

    /**
     * Source image height
     *
     * @access private
     * @var integer
     */
    var $image_src_y;

    /**
     * Destination image width
     *
     * @access private
     * @var integer
     */
    var $image_dst_x;

    /**
     * Destination image height
     *
     * @access private
     * @var integer
     */
    var $image_dst_y;

    /**
     * Flag set after instanciating the class
     *
     * Indicates if the file has been uploaded properly
     *
     * @access public
     * @var bool
     */
    var $uploaded;

    /**
     * Flag set after calling a process
     *
     * Indicates if the processing, and copy of the resulting file went OK
     *
     * @access public
     * @var bool
     */
    var $processed;

    /**
     * Holds eventual error message in plain english
     *
     * @access public
     * @var string
     */
    var $error;

    /**
     * Holds an HTML formatted log
     *
     * @access public
     * @var string
     */
    var $log;

    // overiddable processing variables
    
    
    /**
     * Set this variable to replace the name body (i.e. without extension)
     *
     * @access public
     * @var string
     */
    var $file_new_name_body;

    /**
     * Set this variable to add a string to the faile name body
     *
     * @access public
     * @var string
     */
    var $file_name_body_add;

    /**
     * Set this variable to change the file extension
     *
     * @access public
     * @var string
     */
    var $file_new_name_ext;

    /**
     * Set this variable to format the filename (spaces changed to _)
     *
     * @access public
     * @var boolean
     */
    var $file_safe_name;

    /**
     * Set this variable tu true to allow automatic renaming of the file
     * if the file already exists
     *
     * Default value is true
     *
     * For instance, on uploading foo.ext,<br>
     * if foo.ext already exists, upload will be renamed foo_1.ext<br>
     * and if foo_1.ext already exists, upload will be renamed foo_2.ext<br>
     *
     * @access public
     * @var bool
     */
    var $file_auto_rename;

    /**
     * Set this variable tu true to allow overwriting of an existing file
     *
     * Default value is false, so no files will be overwritten
     *
     * @access public
     * @var bool
     */
    var $file_overwrite;

    /**
     * Set this variable to change the maximum size in bytes for an uploaded file
     *
     * Default value is 1048576 (1MB)
     *
     * @access public
     * @var double
     */
    var $file_max_size;

    /**
     * Set this variable to true to resize the file if it is an image
     *
     * You will probably want to set {@link image_x} and {@link image_y}, and maybe one of the ratio variables
     *
     * Default value is false (no resizing)
     *
     * @access public
     * @var bool
     */
    var $image_resize;

    /**
     * Set this variable to convert the file if it is an image
     *
     * Possibles values are : ''; 'png'; 'jpeg'; 'gif'
     *
     * Default value is '' (no conversion)
     *
     * @access public
     * @var string
     */
    var $image_convert;

    /**
     * Set this variable to the wanted (or maximum/minimum) width for the processed image, in pixels
     *
     * Default value is 150
     *
     * @access public
     * @var integer
     */
    var $image_x;

    /**
     * Set this variable to the wanted (or maximum/minimum) height for the processed image, in pixels
     *
     * Default value is 150
     *
     * @access public
     * @var integer
     */
    var $image_y;

    /**
     * Set this variable to keep the original size ratio to fit within {@link image_x} x {@link image_y}
     *
     * Default value is false
     *
     * @access public
     * @var bool
     */
    var $image_ratio;

    /**
     * Set this variable to keep the original size ratio to fit within {@link image_x} x {@link image_y}, but only if original image is bigger
     *
     * Default value is false
     *
     * @access public
     * @var bool
     */
    var $image_ratio_no_zoom_in;

    /**
     * Set this variable to keep the original size ratio to fit within {@link image_x} x {@link image_y}, but only if original image is smaller
     *
     * Default value is false
     *
     * @access public
     * @var bool
     */
    var $image_ratio_no_zoom_out;

    /**
     * Set this variable to calculate {@link image_x} automatically , using {@link image_y} and conserving ratio
     *
     * Default value is false
     *
     * @access public
     * @var bool
     */
    var $image_ratio_x;

    /**
     * Set this variable to calculate {@link image_y} automatically , using {@link image_x} and conserving ratio
     *
     * Default value is false
     *
     * @access public
     * @var bool
     */
    var $image_ratio_y;

    /**
     * quality of JPEG created/converted destination image
     *
     * Default value is 75
     *
     * @access public
     * @var integer;
     */
    var $jpeg_quality;
    

    /**
     * Init or re-init all the processing variables to their default values
     *
     * This function is called in the constructor, and after each call of {@link process}
     *
     * @access private
     */
    function init() {
		define("FILE_MAX_SIZE","50000000");
        // overiddable variables
        $this->file_new_name_body      = '';       // replace the name body
        $this->file_name_body_add      = '';       // append to the name body
        $this->file_new_name_ext       = '';       // replace the file extension
        $this->file_safe_name          = true;     // format safely the filename
        $this->file_overwrite          = false;    // allows overwritting if the file already exists
        $this->file_auto_rename        = true;     // auto-rename if the file already exists

        //$this->file_max_size		   = 1048576;	//	1 MB
		$this->file_max_size		   = FILE_MAX_SIZE;	//	from ImageConstants file 

        $this->image_resize            = false;    // resize the image
        $this->image_convert           = '';       // convert. values :''; 'png'; 'jpeg'; 'gif'

        $this->image_x                 = 150;
        $this->image_y                 = 150;
        $this->image_ratio             = false;
        $this->image_ratio_no_zoom_in  = false;
        $this->image_ratio_no_zoom_out = false;
        $this->image_ratio_x           = false;    // calculate the $image_x if true
        $this->image_ratio_y           = false;    // calculate the $image_y if true
        $this->jpeg_quality            = 75;
		
    }

    /**
     * Constructor. Checks if the file has been uploaded
     *
     * The constructor takes $_FILES['form_field'] array as argument
     * where form_field is the form field name
     *
     * The constructor will check if the file has been uploaded in its temporary location, and
     * accordingly will set {@link uploaded} (and {@link error} is an error occurred)
     *
     * If the file has been uploaded, the constructor will populate all the variables holding the upload information (none of the processing class variables are used here).
     * You can have access to information about the file (name, size, MIME type...).
     *
     * @access private
     * @param  array $file $_FILES['form_field']
     */
    function upload($file) {

        $this->file_src_name      = '';
        $this->file_src_name_body = '';
        $this->file_src_name_ext  = '';
        $this->file_src_mime      = '';
        $this->file_src_size      = '';
        $this->file_src_error     = '';
        $this->file_src_pathname  = '';

        $this->file_dst_path      = '';
        $this->file_dst_name      = '';
        $this->file_dst_name_body = '';
        $this->file_dst_name_ext  = '';
        $this->file_dst_pathname  = '';

        $this->image_src_x        = 0;
        $this->image_src_y        = 0;
        $this->image_dst_type     = '';
        $this->image_dst_x        = 0;
        $this->image_dst_y        = 0;

        $this->uploaded           = true;
        $this->processed          = true;
        $this->error              = '';
        $this->log                = '';
        $this->init();
        if (!$file) {
            $this->uploaded = false;
            $this->error = 'File upload error. Please try again.';
        }

        if ($this->uploaded) {
            $this->file_src_error         = $file['error'];
            switch($this->file_src_error) {
                case 0:
                    // all is OK
                    $this->log .= '- upload OK<br />';
                    break;
                case 1:
                    $this->uploaded = false;
                    $this->error = 'File upload error (the uploaded file exceeds the upload_max_filesize directive in php.ini).';
                    break;
                case 2:
                    $this->uploaded = false;
                    $this->error = 'File upload error (the uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form).';
                    break;
                case 3:
                    $this->uploaded = false;
                    $this->error = 'File upload error (the uploaded file was only partially uploaded).';
                    break;
                case 4:
                    $this->uploaded = false;
                    $this->error = 'File upload error (no file was uploaded).';
                    break;
                default:
                    $this->uploaded = false;
                    $this->error = 'File upload error (unknown error code).';
            }
        }

        if ($this->uploaded) {
            $this->file_src_pathname   = $file['tmp_name'];
            $this->file_src_name          = $file['name'];
            if ($this->file_src_name == '') {
                $this->uploaded = false;
                $this->error = 'File upload error. Please try again.';
            }
        }
		
        if ($this->uploaded) {
            $this->log .= '- file name OK<br />';
            $this->file_src_mime          = $file['type'];
            $this->file_src_size          = $file['size'];
			
            ereg('\.([^\.]*$)', $this->file_src_name, $extension);
            $this->file_src_name_ext      = strtolower($extension[1]);
            $this->file_src_name_body     = substr($this->file_src_name, 0, ((strlen($this->file_src_name) - strlen($this->file_src_name_ext)))-1);

            if ($this->file_src_size > $this->file_max_size ) {
                $this->uploaded = false;
                $this->error = 'File size is too big.';
            }
        }
	
        if ($this->uploaded) {
            $this->log .= '- file size OK<br />';
        }

        $this->log .= '- source variables<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_name         : ' . $this->file_src_name . '<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_name_body    : ' . $this->file_src_name_body . '<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_name_ext     : ' . $this->file_src_name_ext . '<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_pathname     : ' . $this->file_src_pathname . '<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_mime         : ' . $this->file_src_mime . '<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_size         : ' . $this->file_src_size . '<br />';
        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_src_error        : ' . $this->file_src_error . '<br />';


    }


    /**
     * Actually uploads the file, and act on it according to the set processing class variables
     *
     * This function copies the uploaded file to the given location, eventually performing actions on it.
     * Typically, you can call {@link process} several times for the same file,
     * for instance to create a resized image and a thumbnail of the same file.
     * The original uploaded file remains intact in its temporary location, so you can use {@link process} several times.
     * You will be able to delete the uploaded file with {@link clean} when you have finished all your {@link process} calls.
     *
     * According to the processing class variables set in the calling file, the file can be renamed,
     * and if it is an image, can be resized or converted.
     *
     * When the processing is completed, and the file copied to its new location, the
     * processing class variables will be reset to their default value.
     * This allows you to set new properties, and perform another {@link process} on the same uploaded file
     *
     * It will set {@link processed} (and {@link error} is an error occurred)
     *
     * @access public
     * @param  string $server_path Path location of the uploaded file, with an ending slash
     */
    function process($server_path) {

        $this->log          = '';
        $this->error        = '';
        $this->processed    = true;

        if ($this->uploaded) {

            $this->file_dst_path        = $server_path;

            // repopulate dst variables from src
            $this->file_dst_name        = $this->file_src_name;
            $this->file_dst_name_body   = $this->file_src_name_body;
            $this->file_dst_name_ext    = $this->file_src_name_ext;


            if ($this->file_new_name_body != '') { // rename file body
                $this->file_dst_name_body = $this->file_new_name_body;
                $this->log .= '- new file name body : ' . $this->file_new_name_body  . '<br />';
            }
            if ($this->file_new_name_ext != '') { // rename file ext
                $this->file_dst_name_ext  = $this->file_new_name_ext;
                $this->log .= '- new file name ext : ' . $this->file_new_name_ext . '<br />';
            }
               if ($this->file_name_body_add != '') { // append a bit to the name
                $this->file_dst_name_body  = $this->file_dst_name_body . $this->file_name_body_add;
                $this->log .= '- file name body add : ' . $this->file_name_body_add . '<br />';
            }
            if ($this->file_safe_name) { // formats the name
                $this->file_dst_name_body = str_replace(' ', '_', $this->file_dst_name_body) ;
                $this->log .= '- file name safe format<br />';
            }

            $this->log .= '- destination variables<br />';
            $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_dst_path         : ' . $this->file_dst_path . '<br />';
            $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_dst_name_body    : ' . $this->file_dst_name_body . '<br />';
            $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_dst_name_ext     : ' . $this->file_dst_name_ext . '<br />';

            if ($this->image_resize || $this->image_convert != '') {
                if ($this->image_convert=='') {
                    $this->file_dst_name = $this->file_dst_name_body . '.' . $this->file_dst_name_ext;
                    $this->log .= '- image operation, keep extension<br />';
                } else {
                    $this->file_dst_name = $this->file_dst_name_body . '.' . $this->image_convert;
                    $this->log .= '- image operation, change extension for conversion type<br />';
                }
            } else {
                $this->file_dst_name = $this->file_dst_name_body . '.' . $this->file_dst_name_ext;
                $this->log .= '- no image operation, keep extension<br />';
            }
            if (!$this->file_auto_rename) {
                $this->log .= '- no auto_rename if same filename exists<br />';
                $this->file_dst_pathname = $this->file_dst_path . $this->file_dst_name;
            } else {
                $this->log .= '- checking for auto_rename<br />';
                $this->file_dst_pathname = $this->file_dst_path . $this->file_dst_name;
                ereg('\.([^\.]*$)', $this->file_dst_name, $extension);
                $ext      = strtolower($extension[1]);
                $body     = substr($this->file_dst_name, 0, ((strlen($this->file_dst_name) - strlen($ext)))-1);
                $cpt = 1;

                while (@file_exists($this->file_dst_pathname)) {
                    $this->file_dst_name = $body . '_' . $cpt . '.' . $ext;
                    $cpt++;
                    $this->file_dst_pathname = $this->file_dst_path . $this->file_dst_name;
                    $this->log .= '- auto_rename to ' . $this->file_dst_name . '<br />';
                }               
            }
            
            $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_dst_name         : ' . $this->file_dst_name . '<br />';
            $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;file_dst_pathname     : ' . $this->file_dst_pathname . '<br />';
            if ($this->file_overwrite) 
			{
                 $this->log .= '- no overwrite checking<br />';
            } 
			else 
			{
                if (@file_exists($this->file_dst_pathname)) {
                    $this->processed = false;
                    $this->error = $this->file_dst_name . ' already exists. Please change the file name.<br />';
                } else {
                    $this->log .= '- ' . $this->file_dst_name . ' doesn\'t exist already<br />';
                }
            }
        } 
		else {
                $this->processed = false;
                $this->error = 'Upload invalid. Can\'t carry on a process<br />';
        }

        if (!is_uploaded_file($this->file_src_pathname)) {
            $this->processed = false;
            $this->error = 'No correct source file. Can\'t carry on a process<br />';
        }

        if (!file_exists($this->file_src_pathname)) {
            $this->processed = false;
            $this->error = 'No source file. Can\'t carry on a process<br />';
        }

        if ($this->processed) {
            if ($this->image_resize || $this->image_convert != '') {
                $this->log .= '- image resizing or conversion wanted<br />';

                switch($this->file_src_mime) {
                    case 'image/pjpeg':
                    case 'image/jpeg':
                    case 'image/jpg':
                        if (!function_exists('imagecreatefromjpeg')) {
                            $this->processed = false;
                            $this->error = 'No create from JPEG support';
                        } else {
                            $image_src  = @imagecreatefromjpeg($this->file_src_pathname);
                            if (!$image_src) {
                                $this->processed = false;
                                $this->error = 'No JPEG read support';
                            } else {
                                $this->log .= '- source image is JPEG<br />';
                            }
                        }
                        break;
                    case 'image/png':
                        if (!function_exists('imagecreatefrompng')) {
                            $this->processed = false;
                            $this->error = 'No create from PNG support';
                        } else {
                            $image_src  = @imagecreatefrompng($this->file_src_pathname);
                            if (!$image_src) {
                                $this->processed = false;
                                $this->error = 'No PNG read support';
                            } else {
                                $this->log .= '- source image is PNG<br />';
                            }
                        }
                        break;
                    case 'image/gif':
                        if (!function_exists('imagecreatefromgif')) {
                            $this->processed = false;
                            $this->error = 'No create from GIF support';
                        } else {
                            $image_src  = @imagecreatefromgif($this->file_src_pathname);
                            if (!$image_src) {
                                $this->processed = false;
                                $this->error = 'No GIF read support';
                            } else {
                                $this->log .= '- source image is GIF<br />';
                            }
                        }
                        break;
                    default:
                        $this->processed = false;
                        $this->error = 'Can\'t read image source. not an image?';
                }

                if ($this->processed && $image_src) {

                    if ($this->image_resize) {
                        $this->log .= '- resizing...<br />';
                        $this->image_src_x = imagesx($image_src);
                        $this->image_src_y = imagesy($image_src);

                        if ($this->processed) {
                            if ($this->image_ratio_x) {
                                $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;calculate x size<br />';
                                $this->image_dst_x = round(($this->image_src_x * $this->image_y) / $this->image_src_y);
                                $this->image_dst_y = $this->image_y;
                            } else if ($this->image_ratio_y) {
                                $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;calculate y size<br />';
                                $this->image_dst_x = $this->image_x;
                                $this->image_dst_y = round(($this->image_src_y * $this->image_x) / $this->image_src_x);
                            } else if ($this->image_ratio || $this->image_ratio_no_zoom_in || $this->image_ratio_no_zoom_out) {
                                $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;check x/y sizes<br />';
                                if ((!$this->image_ratio_no_zoom_in && !$this->image_ratio_no_zoom_out)
                                     || ($this->image_ratio_no_zoom_in && ($this->image_src_x > $this->image_x || $this->image_src_y > $this->image_y))
                                     || ($this->image_ratio_no_zoom_out && $this->image_src_x < $this->image_x && $this->image_src_y < $this->image_y)) {
                                    $this->image_dst_x = $this->image_x;
                                    $this->image_dst_y = $this->image_y;
                                    if (($this->image_src_x/$this->image_x) > ($this->image_src_y/$this->image_y)) {
                                        $this->image_dst_x = $this->image_x;
                                        $this->image_dst_y = intval($this->image_src_y*($this->image_x / $this->image_src_x));
                                    } else {
                                        $this->image_dst_y = $this->image_y;
                                        $this->image_dst_x = intval($this->image_src_x*($this->image_y / $this->image_src_y));
                                    }
                                } else {
                                    $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;doesn\'t calculate x/y sizes<br />';
                                    $this->image_dst_x = $this->image_src_x;
                                    $this->image_dst_y = $this->image_src_y;
                                }
                            } else {
                                $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;use plain sizes<br />';
                                $this->image_dst_x = $this->image_x;
                                $this->image_dst_y = $this->image_y;
                            }
                        }

                        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;image_src_x y     : ' . $this->image_src_x . ' x ' . $this->image_src_y . '<br />';
                        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;image_dst_x y     : ' . $this->image_dst_x . ' x ' . $this->image_dst_y . '<br />';

                        $image_dst = imagecreatetruecolor($this->image_dst_x, $this->image_dst_y);
                        $res = imagecopyresampled($image_dst, $image_src, 0, 0, 0, 0, $this->image_dst_x, $this->image_dst_y, $this->image_src_x, $this->image_src_y);

                        $this->log .= '&nbsp;&nbsp;&nbsp;&nbsp;resized image object created<br />';

                        switch($this->image_convert) {
                            case 'jpeg':
                            case 'jpg':
                                if (!function_exists('imagejpeg')) {
                                    $this->processed = false;
                                    $this->error = 'No JPEG create support';
                                } else {
                                    $result = @imagejpeg ($image_dst, $this->file_dst_pathname, $this->jpeg_quality);
                                    if (!$result) {
                                        $this->processed = false;
                                        $this->error = 'Impossible to create file';
                                    } else {
                                        $this->log .= '- resized JPEG image created.<br />';
                                    }
                                }
                                break;
                            case 'png':
                                if (!function_exists('imagepng')) {
                                    $this->processed = false;
                                    $this->error = 'No PNG create support';
                                } else {
                                    $result = @imagepng ($image_dst, $this->file_dst_pathname);
                                    if (!$result) {
                                        $this->processed = false;
                                        $this->error = 'Impossible to create file';
                                    } else {
                                        $this->log .= '- resized PNG image created.<br />';
                                    }
                                }
                                break;
                            case 'gif':
                                if (!function_exists('imagegif')) {
                                    $this->processed = false;
                                    $this->error = 'No GIF create support';
                                } else {
                                    $result = imagegif ($image_dst, $this->file_dst_pathname);
                                    if (!$result) {
                                        $this->processed = false;
                                        $this->error = 'Impossible to create file';
                                    } else {
                                        $this->log .= '- resized GIF image created.<br />';
                                    }
                                }
                                break;
                            default:
                                $this->processed = false;
                                $this->error = 'No conversion type defined';
                        }
                    } else {

                        $this->log .= '- converting...<br />';
                        switch($this->image_convert) {
                            case 'jpeg':
                            case 'jpg':
                                $result = @imagejpeg ($image_src, $this->file_dst_pathname, $this->jpeg_quality);
                                if (!$result) {
                                    $this->processed = false;
                                    $this->error = 'No JPEG create support';
                                } else {
                                    $this->log .= '- converted JPEG image created.<br />';
                                }
                                break;
                            case 'png':
                                $result = @imagepng ($image_src, $this->file_dst_pathname);
                                if (!$result) {
                                    $this->processed = false;
                                    $this->error = 'No PNG create support';
                                } else {
                                    $this->log .= '- converted PNG image created.<br />';
                                }
                                break;
                            case 'gif':
                                $result = @imagegif ($image_src, $this->file_dst_pathname);
                                if (!$result) {
                                    $this->processed = false;
                                    $this->error = 'No GIF create support';
                                } else {
                                    $this->log .= '- converted GIF image created.<br />';
                                }
                                break;
                            default:
                                $this->processed = false;
                                $this->error = 'No convertion type defined';

                        }
                    }
                }

            } else {
                $this->log .= '- no image processing wanted<br />';

                $result = is_uploaded_file($this->file_src_pathname);
                if ($result) {
                    $result = file_exists($this->file_src_pathname);

                    if ($result) {
						
                        $result = move_uploaded_file($this->file_src_pathname, $this->file_dst_pathname);
                        if (!$result) {
                            $this->processed = false;
                            $this->error = 'Error copying file on the server. Copy failed.';
                        }
                    } else {
                        $this->processed = false;
                        $this->error = 'Error copying file on the server. Missing source file.';
                    }
                } else {
                    $this->processed = false;
                    $this->error = 'Error copying file on the server. Incorrect source file.';
                }
            }
        }

        if ($this->processed) {
            $this->log .= '<b>upload OK</b><br />';

        }
        // we reinit all the var
        $this->init();

    }

    /**
     * Deletes the uploaded file from its temporary location
     *
     * When PHP uploads a file, it stores it in a temporary location.
     * When you {@link process} the file, you actually copy the resulting file to the given location, it doesn't alter the original file.
     * Once you have processed the file as many times as you wanted, you can delete the uploaded file.
     *
     * @access public
     */
    function clean() {
         unlink($this->file_src_pathname);
    }

}
?>