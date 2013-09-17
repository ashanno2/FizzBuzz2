<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
function addTestValue(){
	$("#test_values").append("<div class='test_pair'><input name='value[]' class='integer' type='text' size='5' /><input name='keyword[]' type='text' size='15' /><input type='button' class='remove' name='remove' value='-' /></div>");
}

function isInt(){
	var flag = true;
	$('.integer').each(function(){
		var i = $(this).val();
		if(Math.floor(i) == i && $.isNumeric(i) && i > 0){
		} else {
			flag = false;
			return false;
		}
	});
	return flag;	
}

function runAjax(){
	var flag = isInt();
	if(flag === true){
	var serial = $('form').serialize();
		$.ajax({
			url: 'fizzbuzz-2.php',
			type: 'POST',
			data: serial,
			success: function(r){
				clearResults();
				$('#results').html(r);	
			}
		});
	} else $('#results').text('Non-negative (> 0) integers only!');
}

function clearResults(){
	$('#results').html('');
}

$(document).ready(function(){
	$("#test_values").on("click","input.remove",function(){
		$(this).parent().remove();
	});
});
</script>
<form>
<div id='range'>
Loop from <input name='start' class='integer' type='text' size='5' value='1' /> to <input name='stop' class='integer' type='text' size='5' value='100' />
</div>
<input type='button' value='+' onclick='addTestValue()' />
<div id='test_values'></div>
</form>
<input type='button' value='run' onclick='runAjax()' />
<input type='button' value='clear' onclick='clearResults()' />
<hr>
<div id='results'></div>

