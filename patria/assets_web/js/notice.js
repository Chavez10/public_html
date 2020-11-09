function NoticeP() {
	$('#Principal').html('');
	$.ajax({
		url:"Controller_GetInfo/New_Notice",
		method:"POST",
		dataType    : 'json',
		success:function(data){
			var l='';
			if (data.length>0) {
				l += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
				l += '<font size="5" color="black"><center><strong>';
				l += data[i].Titulo;
				l += '</strong> </center></font>';
				l += '</div>';
			} else {
				l += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">No Hay Informacion</div>';
			}
			$('#Principal').html(l);
		}
	});
}