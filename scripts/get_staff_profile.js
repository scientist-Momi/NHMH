const stsearch_id = document.querySelector("#stsearch_id"),
searchBtn = document.querySelector("#search"),
optional = document.getElementById("optional_msg"),
profile = document.querySelector(".all-staff-page");


stsearch_id.onchange = () => {
        let searchTerm = stsearch_id.value;
    if (searchTerm == "") {
            $('#all_staff').load(window.location.href + " #all_staff");
    } else {
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/get_staff_profile.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // alert(data);
                profile.innerHTML = data;
                
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);

            }
}



