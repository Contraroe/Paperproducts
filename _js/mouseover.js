function rolloverpng(id,coll_id,coll_sub_id,type_id) {
	i1 = Number(id);

	document.getElementById('1_1').src = '_img/collections/'  +  coll_sub_id + '.jpg';
	document.getElementById('1_3').src = '_img/collections/'  +  coll_sub_id + '.jpg';
}

function rolloutpng(id,coll_id,coll_sub_id,type_id) {
	i1 = Number(id);

	document.getElementById('1_' + i1).src = '_img/collections/' + coll_sub_id + '.jpg';
	document.getElementById('1_2').href = 'collections.php?coll_id='  +  coll_id + '&coll_sub_id=' + coll_sub_id + '&type_id=' + type_id;

}


// TOGGLE TECH INFO

$(document).ready(function(){
	for ( var i = 1; i < 6; i++ ) {
		$('#cont.info.index_' + i ).hide();
	}
});

function techdatachange(var_type) {

	for ( var i = 0; i < 6; i++ ) {
		$('#cont.info.index_' + i ).hide();
	}
	$('#cont.info.index_' + var_type +'').show();

}