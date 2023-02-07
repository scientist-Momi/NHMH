const patient_app = document.querySelector("#patient_app"),
    patient_appBtn = document.querySelector("#patient_appBtn"),
    // manageappointment = document.querySelector("#manageappointment"),
err5 = document.querySelector(".err"),
succ5 = document.querySelector(".succ"),
errorText5 = document.querySelector(".error-message"),
successText5 = document.querySelector(".success-message");

patient_app.onsubmit = (e)=>{
    e.preventDefault();
}


patient_appBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/patient_add_appointment.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              if (data === "Successfull") {
                  successText5.style.display = "grid";
                  succ5.textContent = "You have successfully booked an appointment. ";
                  
                //   setTimeout(() => {
                //   $('#addappointment').load(window.location.href + " #addappointment");
                //   }, 100);
                  
                //   setTimeout(() => {
                //   $('.manageapp').load(window.location.href + " .manageapp");
                //   }, 100);                 

                  
              }else{
                errorText5.style.display = "grid";
                  err5.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(patient_app);
    xhr.send(formData);
}
