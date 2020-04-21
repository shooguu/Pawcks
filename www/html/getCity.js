function getPlace (zip)
{
    if (window.XMLHttpRequest)
    { 
        var xhr = new XMLHttpRequest();
    }
    else
    {
        var xhr = new ActiveXObject ("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function ()
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {
        var result = xhr.responseText;
        var place = result.split (', ');
        //if (document.getElementById ("city").value == "")
            document.getElementById ("city").value = place[0];
        //if (document.getElementById ("state").value == "")
            document.getElementById ("state").value = place[1];
        } 
    } 
    // Call the response software component
    //xhr.open ("GET", "getCityState.php?zip=" + zip, true);
    //xhr.send ();
    xhr.open ("POST", "getCity.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send ("zip="+zip);  
}