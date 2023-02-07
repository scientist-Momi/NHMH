const showDash = document.getElementById('dash'),
    showProfile = document.getElementById('profile'),
    searchforpatient = document.getElementById('searchforpatient'),
    createmedical = document.getElementById('createmedical'),
    makeappoint = document.getElementById('makeappoint'),
    searchmedical = document.getElementById('searchmedical'),
    dashboard = document.getElementById('dashboard'),
    myprofile = document.getElementById('myprofile'),
    searchpatient = document.getElementById('searchpatient'),
    createmed = document.getElementById('createmed'),
    searchmedrec = document.getElementById('searchmedrec'),
    newappointment = document.getElementById('newappointment'),
    manageappointment = document.getElementById('manageappointment'),
    manage = document.getElementById('manage'),
    profileInfo = document.querySelector('.profile_info'),
    profileInfo1 = document.querySelector('.error-message'),
    profileInfo2 = document.querySelector('.success-message'),
    closemessage = document.querySelector('.close-message'),
    closemessage2 = document.querySelector('.close-message2');

showDash.addEventListener('click', () => { 
    dashboard.style.display = 'block';
    myprofile.style.display = 'none';
    createmed.style.display = 'none';
    newappointment.style.display = 'none';
    searchmedrec.style.display = 'none';
    searchpatient.style.display = 'none';
    profileInfo.style.display = 'none';
    profileInfo1.style.display = 'none';
    profileInfo2.style.display = 'none';
    manageappointment.style.display = 'none';
    // allstaff.style.display = 'none';
    // allpatient.style.display = 'none';
});

showProfile.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    searchpatient.style.display = 'none';
    myprofile.style.display = 'block';
    newappointment.style.display = 'none';
    createmed.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    manageappointment.style.display = 'none';
});

searchforpatient.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    searchpatient.style.display = 'block';
    myprofile.style.display = 'none';
    newappointment.style.display = 'none';
    createmed.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    manageappointment.style.display = 'none';
});

createmedical.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    searchpatient.style.display = 'none';
    newappointment.style.display = 'none';
    createmed.style.display = 'block';
    myprofile.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    manageappointment.style.display = 'none';
});

searchmedical.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    searchpatient.style.display = 'none';
    createmed.style.display = 'none';
    newappointment.style.display = 'none';
    searchmedrec.style.display = 'block';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    manageappointment.style.display = 'none';
});

makeappoint.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    searchpatient.style.display = 'none';
    createmed.style.display = 'none';
    searchmedrec.style.display = 'none';
    newappointment.style.display = 'block';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    manageappointment.style.display = 'none';
});

manage.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    searchpatient.style.display = 'none';
    createmed.style.display = 'none';
    searchmedrec.style.display = 'none';
    newappointment.style.display = 'none';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    manageappointment.style.display = 'block';

        // $('.appdetails').load(window.location.href + " .appdetails");
                  
});

closemessage.addEventListener('click', () => {
    profileInfo1.style.display = 'none';
    profileInfo2.style.display = 'none';
});

closemessage2.addEventListener('click', () => {
    profileInfo2.style.display = 'none';
});