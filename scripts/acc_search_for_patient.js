const searchBar = document.querySelector("#patient_val"),
profile = document.querySelector("#profile_display");


searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm == "")
    {
        profile.innerHTML = "<span class='material-icons-sharp'> error </span><p>No Search Result.</p>";
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/acc_search_for_patient_profile.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                profile.innerHTML = data;
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        
    }
}
