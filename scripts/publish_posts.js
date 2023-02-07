const addpostform = document.querySelector("#add_post_js"),
    addpostbtn = document.querySelector("#addpostbtn"),
err = document.querySelector(".err"),
succ = document.querySelector(".succ"),
inputs = document.querySelectorAll("#ptitle, #pauthor, #pphoto, #pbody"),
errorText = document.querySelector(".error-message"),
successText = document.querySelector(".success-message");

addpostform.onsubmit = (e)=>{
    e.preventDefault();
}


addpostbtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/publish_posts.php", true);
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
    let formData = new FormData(addpostform);
    xhr.send(formData);
}
