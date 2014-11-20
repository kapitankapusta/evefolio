$( document ).ready(function() {
	$('#qoute_container a').click(function(e) {
		var pass = confirm('You are about to leave this website. This content is hosted by a third party!');
	
		if(pass === false) {
			e.preventDefault();
		}
	});
});