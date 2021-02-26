$(document).ready(function(){
	$('#add').click(function(){
		var name = $('#name').val();
		var roll = $('#roll').val();
		
		var dataString = "name="+name+"&roll="+roll;
		$('#showMsg').html(dataString);
		
		$.ajax({
			url: "addStudent.php",
			type: "POST",
			data: dataString,
			dataType: "html",
			success: function(data){
				$('#showMsg').html(data);
				$('#showMsg').fadeIn("slow");
				setTimeout(function(){
					$('#showMsg').fadeOut();
				},3000);
			}
		});
		
		return false;
	});
	

	$('form').submit(function(){
		var roll = true;
		$(':radio').each(function(){
			var name = $(this).attr('name');
			if(roll && !$(':radio[name="'+ name +'"]:checked').length){
				//alert(name+" ROll missing");
				$('#alrt').show();
				roll = false;
			}
		});
		return roll;
	});
});