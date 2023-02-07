const enquireform = document.querySelector("form"),
    enquirebtn = document.querySelector("#enquirebtn"),
    // manageappointment = document.querySelector("#manageappointment"),
err5 = document.querySelector(".comment_err"),
succ5 = document.querySelector(".comment_succ"),
errorText5 = document.querySelector(".comment_error"),
successText5 = document.querySelector(".comment_success");

enquireform.onsubmit = (e)=>{
    e.preventDefault();
}


enquirebtn.onclick = () => {
    // errorText5.style.display = "block";
    //               err5.textContent = "You have successfully booked an appointment. ";


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_enquiry.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              if (data === "Successfull") {
                  successText5.style.display = "grid";
                  succ5.textContent = "Your message was sucessfully posted. ";
                  
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
    let formData = new FormData(enquireform);
    xhr.send(formData);
}
