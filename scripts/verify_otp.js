const otpform = document.querySelector("#otpform"),
// forminput = document.querySelector("#add_staff input"),
// otpBtn = document.querySelector("#otpBtn"),
otpBtn = document.querySelector("#digit-6"),
errorText100 = document.querySelector(".otp_status"),
error = document.querySelector(".otp_msg"),
closeOtpMsg = document.querySelector("#close_otp1"),
closeOtpMsg3 = document.querySelector("#close_otp3"),
successText100 = document.querySelector("#otp_status2"),
success = document.querySelector(".otp_msg2"),
inputs = document.querySelectorAll("#digit-1, #digit-2, #digit-3, #digit-4, #digit-5, #digit-6");

otpform.onsubmit = (e)=>{
    e.preventDefault();
}

otpBtn.oninput = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/verify_otp.php", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;

            if (data == "correct")
            {
                successText100.style.display = "block";
                success.textContent = "Patient has been successfully verified and record has been added to database. Page will reload in 5s.";

                setTimeout(() => {
                  document.location.reload();
                }, 5000);

            }
            else
            {
            errorText100.style.display = "block";
                error.textContent = "OTP is incorrect check Email and verify again.";
            }
            //   clearing form inputs
            inputs.forEach(input => {
                input.value = "";
            });
          }
      }
    }
    let formData = new FormData(otpform);
    xhr.send(formData);
}

closeOtpMsg.addEventListener('click', () => {
    errorText100.style.display = "none";
});
closeOtpMsg3.addEventListener('click', () => {
    successText100.style.display = "none";
});
