const patientinput = document.getElementById('patientinput'),
    verified = document.querySelector('.verified'),
    unverified = document.querySelector('.unverified');

    patientinput.oninput = () => {
        let searchTerm20 = patientinput.value;
    if (searchTerm20 == "")
    {
            verified.style.display = "none";
            unverified.style.display = "none";
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/verify_patient_id.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if (data === "success") {
                    verified.style.display = "inline-block";
                    unverified.style.display = "none";
                } else if (data === "error") {
                    unverified.style.display = "inline-block";
                    verified.style.display = "none";
                }
                // profile2.innerHTML = data;
                
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm20);
        
    }
}
