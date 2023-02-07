const form = document.querySelector("form"),
  signinBtn = document.querySelector("#submit"),
err = document.querySelector(".err"),
succ = document.querySelector(".succ"),
errorText = document.querySelector(".error-message"),
successText = document.querySelector(".success-message"),
loading = document.querySelector('.loading-message'),
loadmsg = document.querySelector('.loadmsg'),
profileInfo1 = document.querySelector('.error-message'),
  profileInfo2 = document.querySelector('.success-message'),
  closemessage = document.querySelector('.close-message'),
  closemessage2 = document.querySelector('.close-message2');

form.onsubmit = (e)=>{
    e.preventDefault();
}

signinBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signin.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
            if (data === "admin")
            {
              loadpage();
              setTimeout(() => {
              location.href = "admin-dash.php";
              }, 5000);

            }
            else if(data === "nurse")
            {
              loadpage();
              setTimeout(() => {
              location.href = "nurse-dash.php";
              }, 5000);
            }
            else if(data === "doctor")
            {
              loadpage();
              setTimeout(() => {
              location.href = "doctor-dash.php";
              }, 5000);
            }
            else if(data === "patient")
            {
              loadpage();
              setTimeout(() => {
              location.href = "patient.php";
              }, 5000);
            }
            else if(data === "accountant")
            {
              loadpage();
              setTimeout(() => {
              location.href = "accountant-dash.php";
              }, 5000);
            }
            else if(data === "blogger")
            {
              loadpage();
              setTimeout(() => {
              location.href = "blogger-dash.php";
              }, 5000);
            }
            else
            {
                errorText.style.display = "grid";
                err.textContent = data;
            }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

closemessage.addEventListener('click', () => {
    profileInfo1.style.display = 'none';
});

closemessage2.addEventListener('click', () => {
    profileInfo2.style.display = 'none';
})

function loadpage() {
  errorText.style.display = "none";
  loading.style.display = "grid"
  loadmsg.textContent = "Credentials match. Loading your dashboard.....";
}