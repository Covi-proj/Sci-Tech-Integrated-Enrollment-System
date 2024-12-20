function up_searchUser() {
    var sup_userId = document.getElementById('sup_userId').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'up_studSearch.php?sup_userId=' + encodeURIComponent(sup_userId), true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var userData = JSON.parse(xhr.responseText);
            // Update fields
			document.getElementById('sup_studnum').value = userData.studID;
            document.getElementById('sup_firstName').value = userData.studFirst;
            document.getElementById('sup_lastName').value = userData.studLast;
			document.getElementById('sup_middlename').value = userData.StudMiddle;
			document.getElementById('sup_bdate').value = userData.studDate;
			document.getElementById('sup_grade').value = userData.studLevel;
            document.getElementById('sup_parent_guardian').value = userData.parent_guardian; 
            document.getElementById('sup_address').value = userData.address; 
			document.getElementById('sup_ptype').value = userData.studPayType;

            document.getElementById('sup_gmc').value = userData.gmc;
            document.getElementById('sup_form138').value = userData.form138; 
            document.getElementById('sup_form137').value = userData.form137; 
			document.getElementById('sup_psa').value = userData.psa;
            
			document.getElementById('sup_reg_date').value = userData.regDate;
            document.getElementById('sup_reg_date').value = userData.regDate;
        } else {
            console.error('Error:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Network error');
    };

    xhr.send();
}

function submitForm(action) {
    // Function to submit the form to the specified action (update or delete)
    document.getElementById('upstud').action = action;
    document.getElementById('upstud').submit();
}


