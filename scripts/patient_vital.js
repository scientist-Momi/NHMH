const add_vitals = document.querySelector("#add_vitals"),
    addvitalsbtn = document.querySelector("#addvitalsbtn"),
err3 = document.querySelector(".err"),
succ3 = document.querySelector(".succ"),
// inputs = document.querySelectorAll("#fname, #lname, #phone, #email, #address, #staffphoto"),
errorText3 = document.querySelector(".error-message"),
successText3 = document.querySelector(".success-message");

add_vitals.onsubmit = (e)=>{
    e.preventDefault();
}


addvitalsbtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/patient_vital.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              if (data === "Successfull") {
                  successText3.style.display = "grid";
                  succ3.textContent = "Vitals added successfully. Page will reload after 10 seconds";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 10000);

                //   clearing form inputs
                  inputs.forEach(input => {
                      input.value = " ";
                  });
                  

                  
              }else{
                errorText3.style.display = "grid";
                  err3.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(add_vitals);
    xhr.send(formData);
}
