const serviceform = document.querySelector("#serviceform"),
    serviceformBtn = document.querySelector("#serviceformBtn"),
err = document.querySelector(".err"),
succ = document.querySelector(".succ"),
inputs = document.querySelectorAll("#fname, #lname, #phone, #email, #address, #staffphoto"),
errorText = document.querySelector(".error-message"),
addservice1 = document.getElementById('addservice'),
serviceupform = document.getElementById('serviceupform'),
successText = document.querySelector(".success-message");

serviceform.onsubmit = (e)=>{
    e.preventDefault();
}


serviceformBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_service.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

                //               errorText.style.display = "grid";
                //   err.textContent = data; 

              if (data === "Successful") {
                  successText.style.display = "grid";
                  succ.textContent = "Service has been added successfully.";

                    $('#serviceupform').load(window.location.href + " #serviceupform");
                  
                //     setTimeout(() => {
                //         document.location.reload();
                //     }, 10000);

                // //   clearing form inputs
                //   inputs.forEach(input => {
                //       input.value = " ";
                //   });
                  addservice1.style.display = 'none';

                  
              }else{
                errorText.style.display = "grid";
                  err.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(serviceform);
    xhr.send(formData);
}
