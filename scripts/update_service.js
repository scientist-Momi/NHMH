const upserviceform = document.querySelector("#upserviceform"),
    upserviceformBtn = document.querySelector("#upserviceformBtn"),
    err3 = document.querySelector(".err"),
    succ3 = document.querySelector(".succ"),
    errorText3 = document.querySelector(".error-message"),
    successText3 = document.querySelector(".success-message");

upserviceform.onsubmit = (e)=>{
    e.preventDefault();
}


upserviceformBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update_service.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            //   successText1.style.display = "grid";
            //   succ1.textContent = data; 

              if (data === "Successfull") {
                  successText3.style.display = "grid";
                  succ3.textContent = "Service Update was successfull.";
                  
                  $('#serviceupform').load(window.location.href + " #serviceupform");
                // location.reload(true);
                // setTimeout(() => {
                //   document.location.reload();
                // }, 5000);
                // setTimeout('refreshPage()', 00005);

              }else{
                errorText3.style.display = "grid";
                  err3.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(upserviceform);
    xhr.send(formData);
}
