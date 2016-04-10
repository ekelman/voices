<?php
function smarty_function_getfixquery($params, &$smarty){
	foreach($params['input'] as $key => $value)
		$fix_query .= "$key=$value&";
	return $fix_query;
}
?>
