const folm = document.querySelector("#folm"),
concept = document.getElementById("concept"),
gestage = document.getElementById("gestage"),
edd2 = document.getElementById("edd_cak");


folm.onchange = () => {
    let searchTerm = folm.value;
    if (searchTerm == "")
    {
        concept.value = "";
        gestage.value = "";
        edd2.value = "";
        
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/edd_calculator.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                var arrayEdd = $.parseJSON(data);
                    concept.value = arrayEdd.conceptiony;
                    gestage.value = arrayEdd.gesticu;
                    edd2.value = arrayEdd.edd;
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm="+searchTerm);
        
    }
}
