
function rolloverpng(id,coll_id,coll_sub_id,type_id) {
	i1 = Number(id);

	
 document.getElementById('1_1').src = '_img/collections/'  +  coll_sub_id + '.jpg';
 document.getElementById('1_2').href = 'collections.php?coll_id='  +  coll_id + '&coll_sub_id=' + coll_sub_id + '&type_id=' + type_id;
}

function rolloutpng(id,coll_id,coll_sub_id,type_id) {
	i1 = Number(id);
	
 document.getElementById('1_' + i1).src = '_img/collections/' + coll_sub_id + '.jpg';
 document.getElementById('1_2').href = 'collections.php?coll_id='  +  coll_id + '&coll_sub_id=' + coll_sub_id + '&type_id=' + type_id;

}

