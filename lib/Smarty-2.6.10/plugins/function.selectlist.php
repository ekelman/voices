<?php
function smarty_function_selectlist($params, &$smarty){
	if(is_array($params['in_array']) && in_array($params['value'], $params['in_array'])){
		return "selected";
	}else
		return "";
}
?>
