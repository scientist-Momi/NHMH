const addappointment = document.querySelector("#addappointment"),
    addappoint = document.querySelector("#addappoint"),
    // manageappointment = document.querySelector("#manageappointment"),
err5 = document.querySelector(".err"),
succ5 = document.querySelector(".succ"),
errorText5 = document.querySelector(".error-message"),
successText5 = document.querySelector(".success-message");

addappointment.onsubmit = (e)=>{
    e.preventDefault();
}


addappoint.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_appointment.php", true);
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
    let formData = new FormData(addappointment);
    xhr.send(formData);
}
