const showDash = document.getElementById('dash'),
    showProfile = document.getElementById('profile'),
    medrecsearch = document.getElementById('medrecsearch'),
    searchmedrec = document.getElementById('searchmedrec'),
    bookappoint = document.getElementById('bookappoint'),
    newappointment = document.getElementById('newappointment'),
    edd = document.getElementById('edd'),
    eddcalculator = document.getElementById('eddcalculator'),
    dashboard = document.getElementById('dashboard'),
    myprofile = document.getElementById('myprofile'),
    profileInfo = document.querySelector('.profile_info'),
    profileInfo1 = document.querySelector('.error-message'),
    profileInfo2 = document.querySelector('.success-message'),
    finrecord = document.querySelector('#finrecord'),
    finance = document.querySelector('#finance'),
    closemessage = document.querySelector('.close-message'),
    closemessage2 = document.querySelector('.close-message2');

showDash.addEventListener('click', () => { 
    dashboard.style.display = 'block';
    myprofile.style.display = 'none';
    newappointment.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'none';
    eddcalculator.style.display = 'none';
    finrecord.style.display = 'none';
});

showProfile.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'block';
    newappointment.style.display = 'none';
    eddcalculator.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    finrecord.style.display = 'none';
});
medrecsearch.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    searchmedrec.style.display = 'block';
    profileInfo.style.display = 'block';
    newappointment.style.display = 'none';
    eddcalculator.style.display = 'none';
    finrecord.style.display = 'none';
});


edd.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    newappointment.style.display = 'none';
    eddcalculator.style.display = 'block';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    finrecord.style.display = 'none';
});

bookappoint.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    newappointment.style.display = 'block';
    eddcalculator.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    finrecord.style.display = 'none';
});

finance.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    newappointment.style.display = 'none';
    eddcalculator.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    finrecord.style.display = 'block';
});

closemessage.addEventListener('click', () => {
    profileInfo1.style.display = 'none';
    // profileInfo2.style.display = 'none';
});

closemessage2.addEventListener('click', () => {
    // profileInfo1.style.display = 'none';
    profileInfo2.style.display = 'none';
});