const finsearch = document.querySelector(".finsearch"),
err5 = document.querySelector(".err"),
succ5 = document.querySelector(".succ"),
errorText5 = document.querySelector(".error-message"),
successText5 = document.querySelector(".success-message");

finsearch.addEventListener('click', () => {
    const data = finsearch.dataset.patid;
    errorText5.style.display = "grid";
    err5.textContent = data;

});
// patient_detail.onkeyup = () => {
//     let searchTerm = patient_detail.value;
//     if (searchTerm == "")
//     {
//         record.innerHTML = "<span class='material-icons-sharp'> error </span><p>No Search Result.</p>";
//         records.style.display = 'none';
//     }
//     else {
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "php/get_finance_profile.php", true);
//         xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 // alert(data);
//                 if (data === "error") {
//                     record.innerHTML = "<span class='material-icons-sharp red'> error </span><p class='red'>Patient not found. Wrong ID.</p>";
//                     record2.style.display = "none";
//                     records.style.display = 'none';
//                 }
//                 else {
//                     record.innerHTML = data;
//                     let xhr = new XMLHttpRequest();
//                     xhr.open("POST", "php/get_finance.php", true);
//                     xhr.onload = () => {
//                         if (xhr.readyState === XMLHttpRequest.DONE) {
//                             if (xhr.status === 200) {
//                                 let data = xhr.response;

//                                 record2.innerHTML = data;
//                                 records.style.display = 'block';
//                                 record2.style.display = 'block';
                                
//                             } 
                             
//                         }
//                     }
//                     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//                     xhr.send("searchTerm=" + searchTerm);
//                 }
                
//             }

//         }
//         }
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.send("searchTerm=" + searchTerm);
        
//     }
// }
