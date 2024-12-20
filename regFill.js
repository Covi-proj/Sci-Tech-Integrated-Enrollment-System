function searchUser() {
    var userId = document.getElementById('userId').value;

    // Perform an asynchronous request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'regSearch.php?userId=' + encodeURIComponent(userId), true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var userData = JSON.parse(xhr.responseText);

            // Update fields
            document.getElementById('studSY').value = userData.academic_year;
            document.getElementById('studFirst').value = userData.First_Name;
            document.getElementById('studLast').value = userData.Last_Name;
            document.getElementById('middlename').value = userData.Middle_Name;
            document.getElementById('birthdate').value = userData.Birthdate;
            document.getElementById('studGrade').value = userData.grade_level;
            document.getElementById('parent').value = userData.parent_guardian;
            document.getElementById('address').value = userData.address;
            document.getElementById('studPType').value = userData.Payment_Type;
            document.getElementById('psaP').innerHTML = userData.psaName;
            document.getElementById('f1137').innerHTML = userData.form137Name;
            document.getElementById('f1138').innerHTML = userData.form138Name;
            document.getElementById('gmc').innerHTML = userData.gmcName;

            document.getElementById('en_tuiFee').innerHTML = 'Tuition Fee = ' + userData.tui_fee;
            document.getElementById('en_tuiMisc').innerHTML = 'Miscellaneous Fee = ' + userData.tui_misc;
            document.getElementById('en_tuiSocio').innerHTML = 'Socio-cultural Fee = ' + userData.socio;
            document.getElementById('en_tuiOther').innerHTML = 'Other Fee = ' + userData.tui_other;
            document.getElementById('en_tuiTotal').innerHTML = 'Total = ' + userData.tui_total;
            document.getElementById('en_tuiUpon').innerHTML = 'Upon Enrollment = ' + userData.tui_upon;
            document.getElementById('en_tui2nd').innerHTML = '2nd Payment = ' + userData.tui_2nd;
            document.getElementById('en_tui3rd').innerHTML = '3rd Payment = ' + userData.tui_3rd;
            document.getElementById('en_tui4th').innerHTML = '4th Payment = ' + userData.tui_4th;
            document.getElementById('en_tui5th').innerHTML = '5th Payment = ' + userData.tui_5th;
            document.getElementById('en_tui6th').innerHTML = '6th Payment = ' + userData.tui_6th;
            document.getElementById('en_tui7th').innerHTML = '7th Payment = ' + userData.tui_7th;
            document.getElementById('en_tui8th').innerHTML = '8th Payment = ' + userData.tui_8th;
            document.getElementById('en_tui9th').innerHTML = '9th Payment = ' + userData.tuit_9th;

            // Add download links
            document.getElementById('download137').setAttribute('href', 'download.php?filename=' + encodeURIComponent(userData.form137Path));
            document.getElementById('download138').setAttribute('href', 'download.php?filename=' + encodeURIComponent(userData.form138Path));
            document.getElementById('downloadGMC').setAttribute('href', 'download.php?filename=' + encodeURIComponent(userData.gmcPath));
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Network error');
    };

    xhr.send();
}
