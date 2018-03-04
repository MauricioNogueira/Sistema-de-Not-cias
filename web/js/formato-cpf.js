function formatoCpf(id){
	var n = $('#'+id).val();
	console.log(n);
	if(n.length == 3){
		$('#'+id).val(n + '.');
	}
	if(n.length == 7){
		$('#'+id).val(n + '.');
	}
	if(n.length == 11){
		$('#'+id).val(n + '-');
	}
}