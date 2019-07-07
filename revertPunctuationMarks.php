<?php
/*
	Напиши метод, который принимает на вход строку и меняет порядок всех знаков 
	препинания (любых небуквенных и нечисловых символов) на обратный.

	Например:
	$result = revertPunctuationMarks("Привет! Как твои дела?");
	echo $result; // Привет? Как твои дела!

	http://localhost/roistat/revertPunctuationMarks/revertPunctuationMarks.php?data=Привет!%20Как%20твои%20дела?
*/


	if ( isset($_REQUEST['data']) && !empty($_REQUEST['data']) ) {
        	$data = $_REQUEST['data'];
        	print_r( revertPunctuationMarks($data) );
		echo '<br/>';
	} else {
		print_r('Нет строки!');
	}


	function revertPunctuationMarks($data) {
		$pattern = '#^[^\w]$#'; // Символы, не образующие «слово» (буквы, цифры и символ подчёркивания)

		mb_regex_encoding('UTF-8');
		mb_internal_encoding("UTF-8");

		$array = preg_split('/(?<!^)(?!$)/u', $data);
		$size = count($array);

		for ($i=0; $i<$size; $i++) {
        		$text = $array[$i];

        		if ( preg_match($pattern, $text) ) {
			    $array2[$i] = $array[$i];
			}
        	}

		$array3 = array_reverse($array2/*, true*/);

		$t=0;
        	for ($i=0; $i<$size; $i++) {
    			$text = $array[$i];

        		if ( preg_match($pattern, $text) ) {
			    $array4[$i] = $array3[$t];
			    $t++;
			} else {
			    $array4[$i] = $array[$i]; 
			}
        	}
		return implode('', $array4);
	}
