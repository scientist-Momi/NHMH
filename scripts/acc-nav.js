const showDash = document.getElementById('dash'),
    showProfile = document.getElementById('profile'),
    dashboard = document.getElementById('dashboard'),
    myprofile = document.getElementById('myprofile'),
    search4patient = document.getElementById('search4patient'),
    closeaddservice = document.getElementById('closeaddservice'),
    closeupservice = document.getElementById('closeupservice'),
    upService = document.getElementById('upService'),
    upservice = document.getElementById('upservice'),
    upcomingpays = document.getElementById('upcomingpays'),
    upcoming = document.getElementById('upcoming'),
    addaccount = document.getElementById('addaccount'),
    addaccountBtn = document.getElementById('addaccountBtn'),
    show_finance = document.getElementById('show_finance'),
    patient_finance = document.getElementById('patient_finance'),
    addservice = document.getElementById('addservice'),
    addaservice = document.getElementById('addaservice'),
    searchpatient = document.getElementById('searchpatient'),
    showbillings = document.getElementById('showbillings'),
    billings = document.getElementById('billings'),
    profileInfo = document.querySelector('.profile_info'),
    profileInfo1 = document.querySelector('.error-message'),
    profileInfo2 = document.querySelector('.success-message'),
    closemessage = document.querySelector('.close-message'),
    closemessage2 = document.querySelector('.close-message2');

showDash.addEventListener('click', () => { 
    dashboard.style.display = 'block';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'none';
    searchpatient.style.display = 'none';
    billings.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
    addaccount.style.display = 'none';
    upcomingpays.style.display = 'none';
    patient_finance.style.display = 'none';
});

showbillings.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    billings.style.display = 'block';
    profileInfo.style.display = 'block';
    searchpatient.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
    addaccount.style.display = 'none';
    upcomingpays.style.display = 'none';
    patient_finance.style.display = 'none';
});

showProfile.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'block';
    profileInfo.style.display = 'block';
    searchpatient.style.display = 'none';
    billings.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
    addaccount.style.display = 'none';
    upcomingpays.style.display = 'none';
    patient_finance.style.display = 'none';
});

search4patient.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    searchpatient.style.display = 'block';
    billings.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
    addaccount.style.display = 'none';
    upcomingpays.style.display = 'none';
    patient_finance.style.display = 'none';
});

addaccountBtn.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    searchpatient.style.display = 'none';
    addaccount.style.display = 'block';
    billings.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
    upcomingpays.style.display = 'none';
    patient_finance.style.display = 'none';
});

upcoming.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    searchpatient.style.display = 'none';
    addaccount.style.display = 'none';
    upcomingpays.style.display = 'block';
    billings.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
    patient_finance.style.display = 'none';
});

show_finance.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    profileInfo.style.display = 'block';
    searchpatient.style.display = 'none';
    addaccount.style.display = 'none';
    upcomingpays.style.display = 'none';
    patient_finance.style.display = 'block';
    billings.style.display = 'none';
    addservice.style.display = 'none';
    upservice.style.display = 'none';
});

addaservice.addEventListener('click', () => { 
    addservice.style.display = 'block';

});

upService.addEventListener('click', () => { 
    upservice.style.display = 'block';

});

closemessage.addEventListener('click', () => {
    profileInfo1.style.display = 'none';
});

closemessage2.addEventListener('click', () => {
    profileInfo2.style.display = 'none';
});

closeaddservice.addEventListener('click', () => {
    addservice.style.display = 'none';
});

closeupservice.addEventListener('click', () => {
    upservice.style.display = 'none';
});