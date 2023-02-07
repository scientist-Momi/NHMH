const servesearch = document.querySelector("#servesearch"),
profileserve = document.querySelector("#upserviceform");


servesearch.onchange = () => {
    let searchTerm = servesearch.value;
    if (searchTerm == "")
    {
        // profile1.innerHTML = "<span class='material-icons-sharp'> error </span><p>No Search Result.</p>";

            // $('#med_record').load(window.location.href + " #med_record");
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/retrieve_service.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // alert(data);
                profileserve.innerHTML = data;
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        
    }
}
