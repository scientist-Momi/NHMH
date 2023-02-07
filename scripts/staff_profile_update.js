const updatestaff = document.querySelector("#updatestaff"),
    update = document.querySelector("#update"),
    err1 = document.querySelector(".err"),
    succ1 = document.querySelector(".succ"),
    errorText1 = document.querySelector(".error-message"),
    successText1 = document.querySelector(".success-message");

updatestaff.onsubmit = (e)=>{
    e.preventDefault();
}


update.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update_staff_profile.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            //   successText1.style.display = "grid";
            //   succ1.textContent = data; 

              if (data === "Successful") {
                  successText1.style.display = "grid";
                succ1.textContent = "Your Update was successfull. Page will reload after 5 seconds.";
                // location.reload(true);
                setTimeout(() => {
                  document.location.reload();
                }, 5000);
                // setTimeout('refreshPage()', 00005);

              }else{
                errorText1.style.display = "grid";
                  err1.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(updatestaff);
    xhr.send(formData);
}
