const addpatientform = document.querySelector("#add_patient_js"),
    addpatientbtn = document.querySelector("#addpatientbtn"),
    resend = document.querySelector("#resend"),
err2 = document.querySelector(".err"),
succ2 = document.querySelector(".succ"),
inputs3 = document.querySelectorAll("#fname, #lname, #phone, #email, #address, #staffphoto"),
errorText2 = document.querySelector(".error-message"),
successText2 = document.querySelector(".success-message");

addpatientform.onsubmit = (e)=>{
    e.preventDefault();
}


addpatientbtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_patient.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              if (data === "Successful") {
                  successText2.style.display = "grid";
                  succ2.textContent = "Staff added successfully. Page will reload after 10 seconds";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 10000);

                //   clearing form inputs
                  inputs3.forEach(input => {
                      input.value = " ";
                  });
                  

                  
              } else if(data == "hello"){
                document.querySelector('.otp_page').style.display = 'block';

                $('#otpContainer').load(window.location.href + " #otpContainer"); 
              }
              else {
                errorText2.style.display = "grid";
                err2.textContent = data;     

              }
          }
      }
    }
    let formData = new FormData(addpatientform);
    xhr.send(formData);
}


