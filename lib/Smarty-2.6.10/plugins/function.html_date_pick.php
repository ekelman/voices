<?php
function smarty_function_html_date_pick($params, &$smarty){
	$calendar = new DHTML_Calendar('/scripts/jscalendar-1.0/', 'en', '', false);
	return $calendar->make_input_field(
           // calendar options go here; see the documentation and/or calendar-setup.js
           array('firstDay'       => $params['firtDay'], // show Monday first
                 'showsTime'      => (empty($params['showTime'])?false:$params['showTime']),
                 'showOthers'     => (empty($params['showOthers'])?false:$params['showOthers']),
                 'ifFormat'       => (empty($params['ifFormat'])?'%Y-%m-%d':$params['ifFormat']),
                 'timeFormat'     => (empty($params['timeFormat'])?'12':$params['timeFormat'])),
           // field attributes go here
           array('style'       => (empty($params['style'])?'width: 5em; ':$params['style']),
                 'name'        => $params['name'],
                 'value'       => strftime('%Y-%m-%d', strtotime('now'))
			   )
		);
}
?>