const form22 = document.querySelector(".typing-area"),

inputField = document.querySelector(".input-field"),
sendBtn = document.querySelector("#sendMsg"),
chatBox = document.querySelector(".chat-box");

form22.onsubmit = (e)=>{
    e.preventDefault();
}

// inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form22);
    xhr.send(formData);
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


    $(document).ready(function () { 
                //WORKING ON MESSAGING
        $('.gomessage').click(function () {

            incoming_id = $(this).data("unique");
        }); 
    });

setInterval(() => {



    // const incoming_id1 = document.querySelector("#showmessage");

    // const incoming_id = incoming_id1.dataset.unique;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
  
// setInterval(() => {
//     // document.location.reload();

//     $('.messaging_list').load(window.location.href + " .messaging_list");
// }, 5000);
