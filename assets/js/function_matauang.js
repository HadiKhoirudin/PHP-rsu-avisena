$(document).ready(function(){
		$('#angka1').maskMoney();
		$('#angka2').maskMoney({prefix:'US$'});
		$('#angka3').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#angka4').maskMoney();
		$('#input_nominal').maskMoney({prefix:'Rp. ', thousands: '.', decimal: ',', precision: 0});
		$("#input_nominal").keyup(function(){
		var clone = $(this).val();
		var cloned = clone.replace(/[A-Za-z$. ,-]/g, "")
		$("#output_nominal_hidden").val(cloned);
		$("#output_nominal_shown").val(cloned);
	});
});