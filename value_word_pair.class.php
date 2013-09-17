<?php 
	class value_word_pair {
		
		public $value;
		public $keyword;

		public function __construct($v,$k) {
			if(is_numeric($v)){
				$this->value = $v;
			}	
			if(!empty($k)){
				$this->keyword = $k;
			}
		}

		public function is_remainder_zero($test){
			if($test % $this->value === 0){
				return true;
			} else return false;
		}

		public function return_keyword(){
			return $this->keyword;
		}
	}		
?>
