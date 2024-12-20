function upSubj_searchUser() {
    var subjectID = document.getElementById('subjectID').value;

    // Perform an asynchronous request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'up_subjSearch.php?subjectID=' + encodeURIComponent(subjectID), true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var userData = JSON.parse(xhr.responseText);

            // Update fields
            document.getElementById('subjID').value = userData.subj_ID;
            document.getElementById('subjName').value = userData.subj_name;
			document.getElementById('subjTime').value = userData.subj_time;
			document.getElementById('subjDay').value = userData.subj_day;
			document.getElementById('subjProf').value = userData.subj_prof;
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Network error');
    };

    xhr.send();
}
