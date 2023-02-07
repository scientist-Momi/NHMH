const addcomment = document.querySelector("#addcomment"),
    addcommentbtn = document.querySelector("#addcommentbtn"),
comment_err = document.querySelector(".comment_err"),
comment_succ = document.querySelector(".comment_succ"),
input = document.querySelector("#commentname"),
input2 = document.querySelector("#commentbody"),
comment_error = document.querySelector(".comment_error"),
comment_success = document.querySelector(".comment_success");

addcomment.onsubmit = (e)=>{
    e.preventDefault();
}


addcommentbtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_comment.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

            // comment_error.style.display = "grid";
            // comment_err.textContent = data;
            // setTimeout(() => {
            //     comment_error.style.display = "none";
            // }, 10000);

              if (data === "Successful") {
                  comment_success.style.display = "grid";
                  comment_succ.textContent = "Your comment or contribution has been added. Thanks.";

                  input.value = "";
                  input2.value = "";
                  
                  $('#view_comments12').load(window.location.href + " #view_comments12");

                                  
                setTimeout(() => {
                comment_success.style.display = "none";
                }, 5000);

              } 
              else {
                comment_error.style.display = "grid";
                comment_err.textContent = data;   
                
                setTimeout(() => {
                comment_error.style.display = "none";
                }, 10000);

              }
          }
      }
    }
    let formData = new FormData(addcomment);
    xhr.send(formData);
}
