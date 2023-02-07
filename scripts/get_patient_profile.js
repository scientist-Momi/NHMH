const ptsearch_id = document.querySelector("#ptsearch_id"),
// searchBtn = document.querySelector("#search"),
// optional = document.getElementById("optional_msg"),
profile2 = document.querySelector(".all-pat-page");


ptsearch_id.onchange = () => {
    let searchTerm1 = ptsearch_id.value;
    if (searchTerm1 == "")
    {
            $('#all_patient').load(window.location.href + " #all_patient");
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/get_patient_profile.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // alert(data);
                profile2.innerHTML = data;
                
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm1);
        
    }
}
