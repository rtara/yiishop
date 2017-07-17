$(function(){
	$('#delmodal').hide();
		$('.deletebtn').click(function(){
			$('#okbtn').attr('href',$(this).attr('href'));
			$('#delmodal').click();
			return false;
		});
		
	})
