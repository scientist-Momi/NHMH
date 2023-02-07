const searchBar1 = document.querySelector("#recdate"),
profile1 = document.querySelector("#med_record");


searchBar1.onchange = () => {
    let searchTerm = searchBar1.value;
    if (searchTerm == "")
    {
        // profile1.innerHTML = "<span class='material-icons-sharp'> error </span><p>No Search Result.</p>";

            $('#med_record').load(window.location.href + " #med_record");
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/filter_medical_record.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // alert(data);
                profile1.innerHTML = data;
            }
            // if(data === "NO")
            // {
            //             profile1.innerHTML = "<span class='material-icons-sharp'> error </span><p>Patient not found. Wrong ID.</p>";
            // }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        
    }
}
