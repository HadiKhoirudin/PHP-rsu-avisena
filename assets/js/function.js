$(document).ready(function(){
		$('#jdn').maskMoney({prefix:'Rp. ', thousands: '.', decimal: ',', precision: 0});
		$("#jdn").keyup(function(){
		var clone = $(this).val();
		var cloned = clone.replace(/[A-Za-z$. ,-]/g, "")
		$("#jumlah_donasi").val(cloned);
	});
});