const inschoice = document.querySelector("#inschoice"),
formFour = document.querySelector("#formFour"),
formThree = document.querySelector("#formThree"),
    downPrice = document.querySelector("#downPrice")
    ;

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

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/retrieve_installOne.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // alert(data);
                formFour.style.display = "none";
                formThree.style.display = "grid";
                downPrice.innerHTML = data;
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
        
    }
}