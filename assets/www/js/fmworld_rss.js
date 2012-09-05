var url="http://www.fm-world.it/atom";
var feeds;

function init() 
{
        $.mobile.showPageLoadingMsg();
	    emptyFeed();
		refreshFeed();
}

function emptyFeed()
{
	$('#page1 #feed').html('<div>Caricamento...</div>');
}

function refreshFeed()
{
	
    jQuery.getFeed({
		url: "php/proxy.php?url="+url,
		success: function(feed)
		{
		$('#page1 #feed').html('');
			//console.log(feed);
            //$("#page1 ul").append('<li data-role="divider" data-theme="a">'+feed.title+'</li>');
            for(var i = 0; i < feed.items.length && i < 10; i++)
            {
				feeds = feed;
                var item = feed.items[i];
				var day = item.published.substring(8, 10);
				var month = item.published.substring(5, 7);
				var year = item.published.substring(0, 4);
                //$("#page1 ul").append('<li class="art" data-theme="b"><img src="http://www.fm-world.it/wp-content/themes/fmworld2012/timthumb.php?src=' + item.image + '&w=30&h=30&zc=1" style="float: left; padding: 5px 10px; width: 30px; height: 30px;"/><a class="art" href="#articolo" link="'+item.link+'">'+item.title+'</a><div style="clear: both;"></div></li>');
                $("#page1 #feed").append(
									'<div class="ui-shadow ui-btn-corner-all ui-btn-icon-left ui-btn-up-a ui-feed-item" data-rola="button" data-theme="a">' +
									'<a href="#articolo" class="art" ida="' + i + '" link="'+item.link+'"><img src="http://www.fm-world.it/wp-content/themes/fmworld2012/timthumb.php?src=' + item.image + '&w=40&h=40&zc=1" style="float: left; padding: 1px 10px 1px 1px; width: 65px; height: 65px;"/></a>' +
									'<a href="#articolo" class="art" ida="' + i + '" link="'+item.link+'">' + item.title + '</a>' +
									'<a href="#articolo" class="art" ida="' + i + '" link="'+item.link+'">' + item.description.substring(0, 200) + '...</a></div><div style="clear: both;"></div>');				
            }
			
            //$('#page1 ul').listview('refresh');
			$.mobile.hidePageLoadingMsg();
		},
		error: function(response, error)
		{
			emptyFeed();
			$("#page1 ul").append('<li>HTTP Request Failed!!</li>');
			//console.log(response);
            $('#page1 ul').listview('refresh');
			$.mobile.hidePageLoadingMsg();
	    }
   });
}

$(function() {

		$.mobile.defaultPageTransition = "slide";
		$.mobile.page.prototype.options.domCache = true;

		$('a.art').live('click', function(event) {
			var item = feeds.items[$(this).attr('ida')];
			$('#articolo #testo').empty();
			if(item.description.substring(0,8) != "<p><em>*") {
				$('#articolo #testo').html(item.description);
			} else {
				var notizie = item.description.split("*");
				for (a=0; a<notizie.length; a++) {
					var ini = notizie[a].indexOf("(");
					var fin = notizie[a].indexOf(")");
					$('#articolo #testo').append('<h4>' + notizie[a].substring(ini+1, fin) + '</h4>' + notizie[a].substring(fin+1, notizie[a].length) + ' <br />');
				}
			}
			//$('#articolo #title_art').html(item.title);
			$('#articolo #testo').prepend('<table width="100%"><tr><td><img src="'+item.image+'" style="width: 80px; padding: 5px;" /></td><td><h2 style="text-align: left;">' + item.title + '</h2></td></tr></table>');
        });		
		
});