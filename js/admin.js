function triggerClick()
{
	document.querySelector('#aboutmeimagemodif').click();
}

function loadfile(event)
{
	var output = document.getElementById('aboutmeimage');
	output.src = URL.createObjectURL(event.target.files[0]);
}