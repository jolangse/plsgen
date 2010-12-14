var prev = null;
var next = null;
var index = null;

var preloaded = [];

function key_handler ( e )
{
	var key = (window.event) ? event.keyCode : e.keyCode;
	if ( (key == 37) && (prev != null) )
	{
		window.location = prev + '.html';
	}
	if ( (key == 39) && (next != null) )
	{
		window.location = next + '.html';
	}
	if (key == 27) window.location = "index.html";
	if ( (key == 38) && (index != null) ) window.location = index;
	return;
}
function img_preload ( image )
{
	var image_thumb = new Image();
	image_thumb.src = 'thumb/' + image;
	preloaded.push(image_thumb);

	var image_view  = new Image();
	image_view.src  = 'view/' + image;
	preloaded.push(image_view);
}

function nav_set_target ( target, direction )
{
	if ( target )
	{
		if ( direction == 0 ) prev = target;
		if ( direction == 1 ) next = target;
		var img_regx = /.*\.(jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF)$/;
		if ( target.match( img_regx ) )
			img_preload( target );
	}
}

function nav_reg_prev ( target )
{ nav_set_target(target, 0); }

function nav_reg_next ( target )
{ nav_set_target(target, 1); }

function nav_reg_index( target )
{ index = target; }

function nav_reg_onkeypress()
{ document.onkeyup = key_handler; }
