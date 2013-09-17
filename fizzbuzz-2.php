<?php
	include('value_word_pair.class.php');	
	$j = 0;
	//needs POST santization, also kinda OOP overkill
	for($j=0;$j<count($_POST['value']);$j++){
		$pairs[$j] = new value_word_pair($_POST['value'][$j],$_POST['keyword'][$j]);
	}	

	for($i=$_POST['start'];$i<=$_POST['stop'];$i++){
		echo "$i: ";
		foreach($pairs as $p){
			if($p->is_remainder_zero($i)){
				echo $p->return_keyword();
			}
		}	
		echo '<br />';
	}
?>
