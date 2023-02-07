const sideMenu = document.querySelector("aside"),
    menuBtn = document.querySelector("#menu-btn"),
    closeBtn = document.querySelector("#close-btn"),
    themeToggler = document.querySelector(".theme-toggler");

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    // themeToggler.querySelector('span').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
});

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});


// upload button
var fullPath = document.getElementById('file');
var fullPath2 = document.getElementById('staffphoto');
var fullPath3 = document.getElementById('pphoto');
var label = document.querySelector('#label');
var label2 = document.querySelector('#label2');
var label3 = document.querySelector('#label3');


fullPath.addEventListener('change', () => { 
    var filename = fullPath.files[0].name;
    label.innerHTML = filename;
});

fullPath2.addEventListener('change', () => { 
    var filename2 = fullPath2.files[0].name;
    label2.innerHTML = filename2;
});




