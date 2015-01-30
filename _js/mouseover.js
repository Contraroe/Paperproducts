function rolloverpng(id,coll_id,coll_sub_id,type_id) {
	i1 = Number(id);
	if ( coll_id == 12 ) {
		ext = '.gif';

	} else {
		ext = '.jpg';
	}

	document.getElementById('1_1').src = '_img/collections/'  +  coll_sub_id + ext;
	document.getElementById('1_3').src = '_img/collections/'  +  coll_sub_id + ext;
}

function rolloutpng(id,coll_id,coll_sub_id,type_id) {
	i1 = Number(id);


	if ( coll_id == 12 ) {
		ext = '.gif';
	} else {
		ext = '.jpg';
	}

	document.getElementById('1_' + i1).src = '_img/collections/' + coll_sub_id + ext;
	document.getElementById('1_2').href = 'collections.php?coll_id='  +  coll_id + '&coll_sub_id=' + coll_sub_id + '&type_id=' + type_id;

}

// No SCROLL WHEN PICKER SCROLLS


$('#picker').on('DOMMouseScroll mousewheel', function(ev) {
	var $this = $(this),
		scrollTop = this.scrollTop,
		scrollHeight = this.scrollHeight,
		height = $this.height(),
		delta = (ev.type == 'DOMMouseScroll' ?
			ev.originalEvent.detail * -40 :
			ev.originalEvent.wheelDelta),
		up = delta > 0;

	var prevent = function() {
		ev.stopPropagation();
		ev.preventDefault();
		ev.returnValue = false;
		return false;
	}

	if (!up && -delta > scrollHeight - height - scrollTop) {
		// Scrolling down, but this will take us past the bottom.
		$this.scrollTop(scrollHeight);
		return prevent();
	} else if (up && delta > scrollTop) {
		// Scrolling up, but this will take us past the top.
		$this.scrollTop(0);
		return prevent();
	}
});


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


