const form = document.querySelector("#medical_rec"),
medBtn = document.querySelector("#med_submit"),
err222 = document.querySelector(".err"),
succ222 = document.querySelector(".succ"),
errorText222 = document.querySelector(".error-message"),
successText222 = document.querySelector(".success-message");

form.onsubmit = (e)=>{
    e.preventDefault();
}

medBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/add_medical_record.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
          //   alert(data);
            if (data === "Successfull") {
                errorText222.style.display = "none";
                successText222.style.display = "grid";
              succ222.textContent = "Medical record added successfully.";
              
              setTimeout(() => {
                        $('#medical_rec').load(window.location.href + " #medical_rec");
                    }, 5000);
              
            } else {
              successText222.style.display = "none";
              errorText222.style.display = "grid";
              err222.textContent = data;
            }
        }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}
