const accService = document.querySelector("#accService"),
    formTwo = document.querySelector("#formTwo"),
 formFour = document.querySelector("#formFour"),
formThree = document.querySelector("#formThree"),
    formFive = document.querySelector("#formFive"),
inschoice = document.querySelector("#inschoice"),
downPrice = document.querySelector("#downPrice"),
price = document.querySelector("#price");


accService.onchange = () => {
    let searchTerm = accService.value;
    if (searchTerm == "")
    {
        formTwo.style.display = "none";
        formFour.style.display = "none";
        formThree.style.display = "none";
        formFive.style.display = "none";

    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/retrieve_serveprice.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    var arrayPrice = $.parseJSON(data);
                    // concept.value = arrayPrice.conceptiony;
                    
                // alert(data);
                formTwo.style.display = "grid";
                // price.innerHTML = data;
                price.innerHTML = arrayPrice.price;
                downPrice.innerHTML = arrayPrice.downpay;
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        
    }
}

inschoice.onchange = () => {
    let searchTerm = inschoice.value;
    if (searchTerm == "")
    {
        // formTwo.style.display = "none";
        formFour.style.display = "none";
        formThree.style.display = "none";

    }
    else if (searchTerm == "No") {
        formThree.style.display = "none";
        formFour.style.display = "grid";
    }
    else {

        formFour.style.display = "none";
        formThree.style.display = "grid";
        // downPrice.innerHTML = data;
        // downPrice.innerHTML = arrayPrice.downpay;
        
        // let xhr = new XMLHttpRequest();
        // xhr.open("POST", "php/retrieve_installOne.php", true);
        // xhr.onload = ()=>{
        // if(xhr.readyState === XMLHttpRequest.DONE){
        //     if(xhr.status === 200){
        //         let data = xhr.response;
        //         // alert(data);
        //         formFour.style.display = "none";
        //         formThree.style.display = "grid";
        //         downPrice.innerHTML = data;
        //     }
        // }
        // }
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr.send("searchTerm=" + searchTerm);
        
    }
}

const addmoneyOne = document.querySelector("#addmoneyOne"),
    addmoneyForm = document.querySelector("#addmoneyForm"),
    getInstallments = document.querySelector("#getInstallments"),
    planChoice = document.querySelector("#planChoice"),
    savePayment = document.querySelector("#savePayment"),
    errr = document.querySelector(".err"),
succc = document.querySelector(".succ"),
plans = document.querySelector(".plans"),
remaining = document.querySelector(".remaining"),
errorTextt = document.querySelector(".error-message"),
successTextt = document.querySelector(".success-message");

addmoneyForm.onsubmit = (e)=>{
    e.preventDefault();
}

addmoneyOne.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/addmoney_record.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            //   errorTextt.style.display = "grid";
            //       errr.textContent = data; 

              if (data === "Successful") {
                  successTextt.style.display = "grid";
                  succc.textContent = "Record added successfully. Page will reload after 10 seconds";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 10000);                 

              }else{
                errorTextt.style.display = "grid";
                  errr.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(addmoneyForm);
    xhr.send(formData);
}


getInstallments.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/share_installment.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
                
              if (data !== "") {
                  formFive.style.display = "none";
                errorTextt.style.display = "grid";
                errr.textContent = data;  
              } else {
                addmoneyForm.scrollIntoView(
                      {
                          behavior: "smooth",
                          block: "end",
                          inline: "end"
                      }
                  );
                  errorTextt.style.display = "none";
                  formFive.style.display = "grid";
                  addmoneyForm.scrollIntoView(
                      {
                          behavior: "smooth",
                          block: "end",
                          inline: "end"
                      }
                  );

                  let xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/share_installment2.php", true);
                    xhr.onload = ()=>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                                var arrayinstallments = $.parseJSON(data);
                                
                                plans.innerHTML = arrayinstallments.output;   
                                remaining.innerHTML = arrayinstallments.remain;       
                        }
                    }
                    }
                    let formData = new FormData(addmoneyForm);
                    xhr.send(formData);
              }
                                     
            
          }
      }
    }
    let formData = new FormData(addmoneyForm);
    xhr.send(formData);

    
}



savePayment.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/save_payment.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            //   errorTextt.style.display = "grid";
            //       errr.textContent = data; 

              if (data === "Successful") {
                  successTextt.style.display = "grid";
                  succc.textContent = "Record added successfully. Page will reload after 5 seconds";
                  
                    setTimeout(() => {
                        document.location.reload();
                    }, 5000);                 

              }else{
                errorTextt.style.display = "grid";
                  errr.textContent = data;                    
              }
          }
      }
    }
    let formData = new FormData(addmoneyForm);
    xhr.send(formData);
}