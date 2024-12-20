function upFac_searchUser() {
    var facultyID = document.getElementById('facultyID').value;

    // Perform an asynchronous request to the server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'up_facSearch.php?facultyID=' + encodeURIComponent(facultyID), true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var userData = JSON.parse(xhr.responseText);

            // Update fields
            document.getElementById('facID').value = userData.fac_ID;
            document.getElementById('facName').value = userData.fac_name;
			document.getElementById('facPosition').value = userData.fac_pos;
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Network error');
    };

    xhr.send();
}
