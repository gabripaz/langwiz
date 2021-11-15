function processCitiesbyCountries(){
    if(XHRObject.readyState==4 && XHRObject.status==200){
        var result = XHRObject.responseText;
		document.getElementById("testing").innerHTML = result;
    }
}
function populateOptionsInfo(selectObj)
{
    XHRObject = new XMLHttpRequest();
    XHRObject.onreadystatechange = processCitiesbyCountries;
    XHRObject.open("get","index.php?countryId="+selectObj.value,true);
	XHRObject.send(null);
}