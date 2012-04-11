var a = new Request({
	method: 'post',
	url: '/campus/local/loggedinas.php',
	onSuccess: function(responseText, responseXML){
		if (responseText){
			if (responseText.length > 22){
				responseText = responseText.substr(0,22) + '...';
			}
		    $("frmAccess").set("class", "hidden");
		    var myname = new Element('a', {
			    href: '/campus',
			    title: 'Entra al campus',
		        html: 'Heu entrat com:<br/>'+ responseText,
		        class: 'usercampus'
		    }).inject($("access"));
		}
	}
}).send();