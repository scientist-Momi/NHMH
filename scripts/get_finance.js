const patient_detail = document.querySelector("#patient_detail"),
record = document.querySelector(".patient_frecord"),
records = document.querySelector(".records"),
record2 = document.querySelector("#wrapuppop");


patient_detail.onkeyup = () => {
    let searchTerm = patient_detail.value;
    if (searchTerm == "")
    {
        record.innerHTML = "<span class='material-icons-sharp'> error </span><p>No Search Result.</p>";
        records.style.display = 'none';
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/get_finance_profile.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // alert(data);
                if (data === "error") {
                    record.innerHTML = "<span class='material-icons-sharp red'> error </span><p class='red'>Patient not found. Wrong ID.</p>";
                    record2.style.display = "none";
                    records.style.display = 'none';
                }
                else {
                    record.innerHTML = data;
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/get_finance.php", true);
                    xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let data = xhr.response;

                                record2.innerHTML = data;
                                records.style.display = 'block';
                                record2.style.display = 'block';
                                
                            } 
                             
                        }
                    }
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("searchTerm=" + searchTerm);
                }
                
            }

        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        
    }
}
