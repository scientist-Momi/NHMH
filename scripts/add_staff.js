const addstaffform = document.querySelector("#add_staff_js"),
    addStaffBtn = document.querySelector("#addstaffbtn"),
err = document.querySelector(".err"),
succ = document.querySelector(".succ"),
inputs = document.querySelectorAll("#fname, #lname, #phone, #email, #address, #staffphoto"),
errorText = document.querySelector(".error-message"),
successText = document.querySelector(".success-message");

addstaffform.onsubmit = (e)=>{
    e.preventDefault();
}


addStaffBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_staff.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              if (data === "Successful") {
                  successText.style.display = "grid";
                  succ.textContent = "Staff added successfully. Page will reload after 10 seconds";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 10000);

                //   clearing form inputs
                  inputs.forEach(input => {
                      input.value = " ";
                  });
                  

                  
              }else{
                errorText.style.display = "grid";
                  err.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(addstaffform);
    xhr.send(formData);
}
