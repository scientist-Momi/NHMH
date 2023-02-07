const updatepatient = document.querySelector("#updatepatient"),
    updateBtn = document.querySelector("#updateBtn"),
    err61 = document.querySelector(".err"),
    succ61 = document.querySelector(".succ"),
    errorText61 = document.querySelector(".error-message"),
    successText61 = document.querySelector(".success-message");

updatepatient.onsubmit = (e)=>{
    e.preventDefault();
}


updateBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update_patient_profile.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            //   successText1.style.display = "grid";
            //   succ1.textContent = data; 

              if (data === "Successful") {
                  successText61.style.display = "grid";
                succ61.textContent = "Your Update was successfull. Page will reload after 5 seconds.";
                // location.reload(true);
                setTimeout(() => {
                  document.location.reload();
                }, 5000);
                // setTimeout('refreshPage()', 00005);

              }else{
                errorText61.style.display = "grid";
                  err61.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(updatepatient);
    xhr.send(formData);
}
