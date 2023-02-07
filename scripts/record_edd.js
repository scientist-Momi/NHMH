const recordEdd = document.querySelector("#recordEdd"),
    recordEddBtn = document.querySelector("#recordEddBtn"),
err6 = document.querySelector(".err"),
succ6 = document.querySelector(".succ"),
errorText6 = document.querySelector(".error-message"),
successText6 = document.querySelector(".success-message");

recordEdd.onsubmit = (e)=>{
    e.preventDefault();
}


recordEddBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/record_edd.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              if (data === "Successful") {
                  successText6.style.display = "grid";
                  succ6.textContent = "EDD has been recorded for patient.";
                  
                    // setTimeout(() => {
                    //     document.location.reload();
                    // }, 10000);
                   
              }else{
                errorText6.style.display = "grid";
                  err6.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(recordEdd);
    xhr.send(formData);
}
