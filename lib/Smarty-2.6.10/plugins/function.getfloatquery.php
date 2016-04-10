<?php
function smarty_function_getfloatquery($params, &$smarty){
	foreach($params['input'] as $key => $value)
		$fix_query .= "$key=".$params['data']->$value."&";
	return $fix_query;
}
?>
