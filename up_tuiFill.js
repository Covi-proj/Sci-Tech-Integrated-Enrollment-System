function upTui_searchUser() {
    var tuitionID = document.getElementById('tuitionID').value;

    // Perform an asynchronous request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'up_tuiSearch.php?tuitionID=' + encodeURIComponent(tuitionID), true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var userData = JSON.parse(xhr.responseText);

            // Update fields
            document.getElementById('tuiID').value = userData.tui_ID;
            document.getElementById('tuiGrade').value = userData.tui_grade;
			document.getElementById('tuiPType').value = userData.tui_ptype;
			document.getElementById('tuiFee').value = userData.tui_fee;
			document.getElementById('tuiMisc').value = userData.tui_misc;
            document.getElementById('tuiSocio').value = userData.socio;
			document.getElementById('tuiOther').value = userData.tui_other;
			document.getElementById('tuiTotal').value = userData.tui_total;
			document.getElementById('tuiUpon').value = userData.tui_upon;
			document.getElementById('tui2nd').value = userData.tui_2nd;
			document.getElementById('tui3rd').value = userData.tui_3rd;
			document.getElementById('tui4th').value = userData.tui_4th;
			document.getElementById('tui5th').value = userData.tui_5th;
			document.getElementById('tui6th').value = userData.tui_6th;
			document.getElementById('tui7th').value = userData.tui_7th;
			document.getElementById('tui8th').value = userData.tui_8th;
			document.getElementById('tui9th').value = userData.tuit_9th;
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Network error');
    };

    xhr.send();
}


