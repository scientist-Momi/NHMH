const searchBar22 = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = () => {
    
    searchBar22.classList.toggle("show");
    
    searchIcon.classList.toggle("active");
    
    searchBar22.focus();
    
  if(searchBar22.classList.contains("active")){
    searchBar22.value = "";
    searchBar22.classList.remove("active");
  }
}


searchBar22.onkeyup = ()=>{
  let searchTerm = searchBar22.value;
  if(searchTerm != ""){
    searchBar22.classList.add("active");
  }else{
    searchBar22.classList.remove("active");
  }
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "php/search.php", true);
//   xhr.onload = ()=>{
//     if(xhr.readyState === XMLHttpRequest.DONE){
//         if(xhr.status === 200){
//           let data = xhr.response;
//           usersList.innerHTML = data;
//         }
//     }
//   }
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhr.send("searchTerm=" + searchTerm);
}