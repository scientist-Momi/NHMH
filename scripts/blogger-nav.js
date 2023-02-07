const showDash = document.getElementById('dash'),
    showProfile = document.getElementById('profile'),
    addstaff = document.getElementById('addstaff'),
    showallstaff = document.getElementById('allmystaff'),
    staffform = document.getElementById('add_staff'),
    dashboard = document.getElementById('dashboard'),
    myprofile = document.getElementById('myprofile'),
    allstaff = document.getElementById('allstaff'),
    profileInfo = document.querySelector('.profile_info'),
    profileInfo1 = document.querySelector('.error-message'),
    profileInfo2 = document.querySelector('.success-message'),
    closemessage = document.querySelector('.close-message'),
    closemessage2 = document.querySelector('.close-message2');

showDash.addEventListener('click', () => { 
    dashboard.style.display = 'block';
    myprofile.style.display = 'none';
    staffform.style.display = 'none';
    profileInfo.style.display = 'none';
    allstaff.style.display = 'none';
});

showProfile.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    staffform.style.display = 'none';
    myprofile.style.display = 'block';
    profileInfo.style.display = 'block';
    allstaff.style.display = 'none';
});

addstaff.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    staffform.style.display = 'block';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    allstaff.style.display = 'none';
});

showallstaff.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    staffform.style.display = 'none';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    allstaff.style.display = 'block';
});

closemessage.addEventListener('click', () => {
    profileInfo1.style.display = 'none';
});

closemessage2.addEventListener('click', () => {
    profileInfo2.style.display = 'none';
});