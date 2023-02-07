const showDash = document.getElementById('dash'),
    showProfile = document.getElementById('profile'),
    newpatient = document.getElementById('newpatient'),
    addnewvital = document.getElementById('addnewvital'),
    newvital = document.getElementById('newvital'),
    search4patient = document.getElementById('search4patient'),
    searchpatient = document.getElementById('searchpatient'),
    medrecsearch = document.getElementById('medrecsearch'),
    searchmedrec = document.getElementById('searchmedrec'),
    allappoint = document.getElementById('allappoint'),
    todayappoint = document.getElementById('todayappoint'),
    edd = document.getElementById('edd'),
    eddcalculator = document.getElementById('eddcalculator'),
    add_staff = document.getElementById('add_staff'),
    dashboard = document.getElementById('dashboard'),
    myprofile = document.getElementById('myprofile'),
    profileInfo = document.querySelector('.profile_info'),
    profileInfo1 = document.querySelector('.error-message'),
    profileInfo2 = document.querySelector('.success-message'),
    closemessage = document.querySelector('.close-message');
    closemessage2 = document.querySelector('.close-message2');

showDash.addEventListener('click', () => { 
    dashboard.style.display = 'block';
    myprofile.style.display = 'none';
    newvital.style.display = 'none';
    searchpatient.style.display = 'none';
    todayappoint.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'none';
    add_staff.style.display = 'none';
    eddcalculator.style.display = 'none';
});

showProfile.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    add_staff.style.display = 'none';
    myprofile.style.display = 'block';
    newvital.style.display = 'none';
    searchpatient.style.display = 'none';
    todayappoint.style.display = 'none';
    eddcalculator.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';

});

newpatient.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    add_staff.style.display = 'block';
    newvital.style.display = 'none';
    searchpatient.style.display = 'none';
    todayappoint.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    eddcalculator.style.display = 'none';
});

addnewvital.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    add_staff.style.display = 'none';
    newvital.style.display = 'block';
    searchpatient.style.display = 'none';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    todayappoint.style.display = 'none';
    eddcalculator.style.display = 'none';
});

search4patient.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    add_staff.style.display = 'none';
    newvital.style.display = 'none';
    searchpatient.style.display = 'block';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
    todayappoint.style.display = 'none';
    eddcalculator.style.display = 'none';
});

medrecsearch.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    add_staff.style.display = 'none';
    newvital.style.display = 'none';
    searchpatient.style.display = 'none';
    searchmedrec.style.display = 'block';
    profileInfo.style.display = 'block';
    todayappoint.style.display = 'none';
    eddcalculator.style.display = 'none';
});

allappoint.addEventListener('click', () => { 
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    add_staff.style.display = 'none';
    newvital.style.display = 'none';
    searchpatient.style.display = 'none';
    eddcalculator.style.display = 'none';
    todayappoint.style.display = 'block';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
});

edd.addEventListener('click', () => {
    dashboard.style.display = 'none';
    myprofile.style.display = 'none';
    add_staff.style.display = 'none';
    newvital.style.display = 'none';
    searchpatient.style.display = 'none';
    todayappoint.style.display = 'none';
    eddcalculator.style.display = 'block';
    searchmedrec.style.display = 'none';
    profileInfo.style.display = 'block';
});

closemessage.addEventListener('click', () => {
    profileInfo1.style.display = 'none';
    profileInfo2.style.display = 'none';
});

closemessage2.addEventListener('click', () => {
    profileInfo2.style.display = 'none';
});