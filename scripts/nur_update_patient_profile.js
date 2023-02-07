const nur_update = document.querySelector("#nur_update_form"),
    nur_updateBtn = document.querySelector("#nur_updateBtn"),
    err10 = document.querySelector(".err"),
    succ10 = document.querySelector(".succ"),
    errorText10 = document.querySelector(".error-message"),
    successText10 = document.querySelector(".success-message");

nur_update.onsubmit = (e)=>{
    e.preventDefault();
}


nur_updateBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/nur_update_patient_profile.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            //   successText1.style.display = "grid";
            //   succ1.textContent = data; 

              if (data === "Successful") {
                  successText10.style.display = "grid";
                succ10.textContent = "Your Update was successfull. Page will reload after 5 seconds.";

                // setTimeout(() => {
                //   document.location.reload();
                // }, 5000);

              }else{
                errorText10.style.display = "grid";
                  err10.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(nur_update);
    xhr.send(formData);
}
