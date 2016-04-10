<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty wordwrap modifier plugin
 *
 * Type:     modifier<br>
 * Name:     wordwrap<br>
 * Purpose:  wrap a string of text at a given length
 * @link http://smarty.php.net/manual/en/language.modifier.wordwrap.php
 *          wordwrap (Smarty online manual)
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @return string
 */
function smarty_modifier_wordwrap($string,$length=80,$break="\n",$cut=false)
{
	//$string = "Technical Administrator-Client Services";
	$string = str_replace("-","- ",$string);
	$string = str_replace("/","/ ",$string);
	$string = wordwrap($string,$length,$break,$cut);
	$string = str_replace("- ","-",$string);
	$string = str_replace("/ ","/",$string);
	return $string;
    //return wordwrap($string,$length,$break,$cut);

}

?>
