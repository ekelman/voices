<?PHP 

/********************* 
This is a smarty plugin that will sum the contents of a column in an array 
*********************/ 

function smarty_function_sum($params, &$smarty){ 
    if(!isset($params['array']) || !isset($params['col'])){ 
        $smarty->trigger_error("sum_col: missing array or col value"); 
        return; 
    } 

    $result = 0; 
    
    foreach($params['array'] as $row){ 
        $result += $row[$params['col']]; 
    } 
    
    return $result; 
} 

?>