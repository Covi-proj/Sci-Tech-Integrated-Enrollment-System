
<!DOCTYPE html>
<html lang="en">
<style>

/* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Set a background color and font family for the whole page */
body {
    background-color: #f2f2f2;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;;
}

/* Style the header */
.header {
    background-color:  #2e00c4;
    color:  #2e00c4;
    padding: 10px;
    text-align: left;
}

.header .logo {
    vertical-align: middle;
}

.header a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    margin-left: 10px;
}

/* Style the container */
.container {
    background-color: #fff;
    max-width: 700px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Style the form title */
.title {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Style input boxes and labels */
.input-box {
    margin-bottom: 15px;
}

.input-box label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.input-box input[type="text"],
.input-box input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

/* Style radio buttons */
.category {
    display: flex;
    gap: 10px;
    align-items: center;
}

.category label {
    display: flex;
    align-items: center;
}

.category input[type="radio"] {
    margin-right: 5px;
}

/* Style the submit button */
.button {
    text-align: center;
    margin-top: 20px;
}

.button input[type="submit"] {
    border: none;
    color: rgb(255, 255, 255);
    padding: 6px 10px;
    text-align: center;
    width: 100%;
    text-decoration: none;
    display: inline-block;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold;
    font-size: 20px;
    margin: 10px 9px;
    margin-top: 20px;
    cursor: pointer;
    float: center;
    transition: 0.3s;
    background-color: #2e00c4;
    border-radius: 8px;
}

.button input[type="submit"]:hover {
    background-color: #ffff00;
  color: #070707;
}

.gender {

border-radius: 10px;
text-align: center;
font-size: 20px;
font-weight: bold;
height: 30px;
width: 30%;

}
.Grade{
    border-radius: 10px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    height: 30px;
    width: 100%;
    
}
.existing-student-form{
    border-radius: 10px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    height: 30px;
    width: 30%;
}





</style>    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | Sci-Tech</title>
    <link rel="icon" type="image/x-icon" href="favicon_scitech.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <img class="logo" src="favicon_scitech.png" width="50" height="50" alt="Logo">
        <a href="#portal">Registration Form</a>
    </div>
    <div id = "enroll" class="container">
        <form action="register_submit_withESC.php" method="post">
            <div class="user-details">
				<div class="input-box">
                       
                </div>

                </div>
                
				 <h1>Education Service Contracting</h1>
                        <p> Application Form</p>

                        <h2>ESC Form 1</h2>

                        <h3>About Me</h3>
                        <div class="input-box">
                        <label for="LRN">Learner Reference Number(LRN)</label>
                        <input type="text" id="LRN" required name="LRN">
                        </div>
						<div class="input-box">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="first_name" placeholder="example: Mark Covi" required name="last_name">
                        </div>
						<div class="input-box">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="First_Name" placeholder="example: Del Rosario" required name="first_name">
                        </div>

                        <div class="input-box">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" id="middle_name" placeholder="example: Del Rosario" required name="middle_name">
                        </div>

                        <div class="input-box">
                        <label for="suffix">Suffix:</label>
                        <input type="text" id="suffix" placeholder="(i.e Jr., III)" required name="suffix">
                        </div>
                        
                        <div class="input-box">
                         <label for="Birthdate">Date of Birth:</label>
                        <input type="date" id="birthdate" name="birthdate">
						</div>
						
                        <div class="input-box">
                         <label for="nationality">Nationality:</label>
                        <input type="text" id="nationality" name="nationality">
						</div>
						
                        <div class="gender-details">
                        <label for="gender-details"> Gender:</label>
                        <select class = "gender" id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        </div>
						
						<h3>Address and Contact Details</h3>
                        <div class="input-box">
                        <label for="street">Street:</label>
                        <input type="text" id="street" name="street">

                        <label for="municipality">Municipality:</label>
                        <input type="text" id="municipality" name="municipality">

                        <label for="barangay_district">Barangay / District:</label>
                        <input type="text" id="barangay_district" name="barangay_district">

                        <label for="province">Province:</label>
                        <input type="text" id="province" name="province">

                        <label for="Zip code">Zip Code</label>
                        <input type="text" id="zip code" name="zip_zode">

                        <label for="Mobile / Landline No.">Mobile/Landline No.:</label>
                        <input type="text" id="phone" name="phone"  />

                        <label for="email address">Email Address:</label>
                        <input type="text" id="email" name="email">
						</div>
						
						<div>
                        <h3>About My Family</h3>

                        <input type="text" id="itemText" name="members">
                        <button id="addItem">Add</button>
                        <button id="removeItem">Remove</button>

                        </div>

                        <div>
                
                        <h2>Does your family own any of the following</h2>

                        <p>Motorcycle/Pedicab</p>
						
                        <label for="myCheckbox">Yes</label>
                        <input type="radio" id="myCheckbox" name="ped" value="Yes">
                        <br>
                        <label for="myCheckbox">No</label>
                        <input type="radio" id="myCheckbox" name="ped" value="No">
						
                        <p>Car, Van, Pick-up or Truck</p>     		                  

                        <label for="myCheckbox">Yes</label>
                        <input type="radio" id="myCheckbox" name="car" value="Yes">
                        <br>
                        <label for="myCheckbox">No</label>
                        <input type="radio" id="myCheckbox" name="car" value="No">                        
                        
                        <p>Land or Farm</p>

                        <label for="myCheckbox">Yes</label>
                        <input type="radio" id="myCheckbox" name="land" value="Yes">
                        <br>
                        <label for="myCheckbox">No</label>
                        <input type="radio" id="myCheckbox" name="land" value="No">
							
						</div>
						
                        <h2>Home Details</h2>
                        
                        <label for="myCheckbox">Owned</label>
                        <input type="radio" id="myCheckbox" name="home" value="Owned">
                        <br>
                        <label for="myCheckbox">Rented</label>
                        <input type="radio" id="myCheckbox" name="home" value="Rented">

                        <label for="myCheckbox">Company Provided/Living with Relatives</label>
                        <input type="radio" id="myCheckbox" name="home" value="Company Provided/ Living with Relatives">
                        
                        <label for="municipality"><br>No. of Bedrooms</label>
                        <input type="text" id="bedno" name="bedno">

                        <h2>Support for Cost of Schooling</h2>

                        <h3>Father</h3>

                        <label for="last_name">Last Name:</label>
                        <input type="text" id="fl_name" name="fl_name">

                        <label for="Mobile / Landline No.">First Name:</label>
                        <input type="text" id="ff_name" name="ff_name"  />

                        <h3> Source of Income</h3>

                        <label for="myCheckbox">Locally Employed</label>
                        <input type="radio" id="myCheckbox" name="f_soi" value="Locally Employed">

                        <label for="myCheckbox">Employed Abroad</label>
                        <input type="radio" id="myCheckbox" name="f_soi" value="Employed Abroad">

                        <label for="myCheckbox">Self-Emoployed Professional</label>
                        <input type="radio" id="myCheckbox" name="f_soi" value="Self-Emoployed Professional">

                        <label for="myCheckbox">Self-Employed Business</label>
                        <input type="radio" id="myCheckbox" name="f_soi" value="Self-Employed Business">

                        <label for="myCheckbox">Retired/Unemployed</label>
                        <input type="radio" id="myCheckbox" name="f_soi" value="Retired/Unemployed">

                        <label for="myCheckbox">Locally Employed</label>
                        <input type="radio" id="myCheckbox" name="f_soi" value="Locally Employed">

                        <h3> Gross Monthly Income</h3>

                        <label for="myCheckbox">Php 0 - 5,000</label>
                        <input type="radio" id="myCheckbox" name="f_gmi" value="Php 0 - 5,000">

                        <label for="myCheckbox">Php 5,001 - 10,000</label>
                        <input type="radio" id="myCheckbox" name="f_gmi" value="Php 5,001 - 10,000">

                        <label for="myCheckbox">Php 15,000 - 20,000</label>
                        <input type="radio" id="myCheckbox" name="f_gmi" value="Php 15,000 - 20,000">

                        <label for="myCheckbox">Php 20,001 - 25,000</label>
                        <input type="radio" id="myCheckbox" name="f_gmi" value="Php 20,001 - 25,000">

                        <label for="myCheckbox">Php 25,001 - 50,000</label>
                        <input type="radio" id="myCheckbox" name="f_gmi" value="Php 25,001 - 50,000">

                        <label for="myCheckbox">More than Php 50,000</label>
                        <input type="radio" id="myCheckbox" name="f_gmi" value="More than Php 50,000">


                        <h3>Mother</h3>

                        
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="ml_name" name="ml_name">

                        <label for="Mobile / Landline No.">First Name:</label>
                        <input type="text" id="mf_name" name="mf_name"  />

                        <h3> Source of Income</h3>

                        <label for="myCheckbox">Locally Employed</label>
                        <input type="radio" id="myCheckbox" name="m_soi" value="Locally Employed">

                        <label for="myCheckbox">Employed Abroad</label>
                        <input type="radio" id="myCheckbox" name="m_soi" value="Employed Abroad">

                        <label for="myCheckbox">Self-Emoployed Professional</label>
                        <input type="radio" id="myCheckbox" name="m_soi" value="Self-Emoployed Professional">

                        <label for="myCheckbox">Self-Employed Business</label>
                        <input type="radio" id="myCheckbox" name="m_soi" value="Self-Employed Business">

                        <label for="myCheckbox">Retired/Unemployed</label>
                        <input type="radio" id="myCheckbox" name="m_soi" value="Retired/Unemployed">

                        <label for="myCheckbox">Locally Employed</label>
                        <input type="radio" id="myCheckbox" name="m_soi" value="Locally Employed">

                        <h3> Gross Monthly Income</h3>

                        <label for="myCheckbox">Php 0 - 5,000</label>
                        <input type="radio" id="myCheckbox" name="m_gmi" value="Php 0 - 5,000">

                        <label for="myCheckbox">Php 5,001 - 10,000</label>
                        <input type="radio" id="myCheckbox" name="m_gmi" value="Php 5,001 - 10,000">

                        <label for="myCheckbox">Php 15,000 - 20,000</label>
                        <input type="radio" id="myCheckbox" name="m_gmi" value="Php 15,000 - 20,000">

                        <label for="myCheckbox">Php 20,001 - 25,000</label>
                        <input type="radio"  id="myCheckbox" name="m_gmi" value="Php 20,001 - 25,000">

                        <label for="myCheckbox">Php 25,001 - 50,000</label>
                        <input type="radio"  id="myCheckbox" name="m_gmi" value="Php 25,001 - 50,000">

                        <label for="myCheckbox">More than Php 50,000</label>
                        <input type="radio" id="myCheckbox" name="m_gmi" value="More than Php 50,000">


                        <h3>Guardian</h3>

                        <label for="last_name">Last Name:</label>
                        <input type="text" id="gl_name" name="gl_name">

                        <label for="Mobile / Landline No.">First Name:</label>
                        <input type="text" id="gf_name" name="gf_name"  />

                        <h3> Source of Income</h3>

                        <label for="myCheckbox" name = "check1">Locally Employed</label>
                        <input type="radio" id="myCheckbox" name="g_soi" value="Locally Employed">

                        <label for="myCheckbox">Employed Abroad</label>
                        <input type="radio"  id="myCheckbox" name="g_soi" value="Employed Abroad">

                        <label for="myCheckbox">Self-Emoployed Professional </label>
                        <input type="radio"  id="myCheckbox" name="g_soi" value="Self-Emoployed Professional">

                        <label for="myCheckbox">Self-Employed Business</label>
                        <input type="radio"  id="myCheckbox" name="g_soi" value="Self-Employed Business">

                        <label for="myCheckbox">Retired/Unemployed</label>
                        <input type="radio"  id="myCheckbox" name="g_soi" value="Retired/Unemployed">

                        <label for="myCheckbox">Locally Employed</label>
                        <input type="radio"  id="myCheckbox" name="g_soi" value="Locally Employed">

                        <h3> Gross Monthly Income</h3>

                        <label for="myCheckbox">Php 0 - 5,000</label>
                        <input type="radio"  id="myCheckbox" name="g_gmi" value="Php 0 - 5,000">

                        <label for="myCheckbox">Php 5,001 - 10,000</label>
                        <input type="radio"  id="myCheckbox" name="g_gmi" value="Php 5,001 - 10,000">

                        <label for="myCheckbox">Php 15,000 - 20,000 </label>
                        <input type="radio"  id="myCheckbox" name="g_gmi" value="Php 15,000 - 20,000">

                        <label for="myCheckbox">Php 20,001 - 25,000</label>
                        <input type="radio"  id="myCheckbox" name="g_gmi" value="Php 20,001 - 25,000">

                        <label for="myCheckbox">Php 25,001 - 50,000</label>
                        <input type="radio"  id="myCheckbox" name="g_gmi" value="Php 25,001 - 50,000">

                        <label for="myCheckbox">More than Php 50,000</label>
                        <input type= "radio" id="myCheckbox" name="g_gmi" value="More than Php 50,000">

                        <br><p1>*For employees, it refers to the gross mothly salaries and wages befor eand other deduction. It includes
                            basic pay, overtime pay, commission tips, allowance and one-twenthfth of annual bonuses. For all others, it refers
                            to the average monhtly earnings from their business, trade, profferssion, investments and or persons.
                        </p1>
						
						<h2>About my Elementary School</h2>

                        <div class="input-box">
                        <label for="school_name">Name of Elementary School:</label>
                        <input type="text" id="s_name" placeholder="example: Mark Covi" required name="s_name">
                        </div>

                        <h4>School Type:</h4>
                        <label for="myCheckbox">Public</label>
                        <input type="radio" id="myCheckbox" name="s_type" value="public">
                        <br>
                        <label for="myCheckbox">Private</label>
                        <input type="radio" id="myCheckbox" name="s_type" value="private">

                        <div class="input-box">
                        <label for="province">Province:</label>
                        <input type="text" id="province"  required name="s_prov">
                        </div>
                        
                        <div class="input-box">
                        <label for="c_m">City/Municipality:</label>
                        <input type="text" id="c_m"  required name="s_mun">
                        </div>

                        <div class="input-box">
                        <label for="brgy">Barangay/District:</label>
                        <input type="text" id="brgy"  required name="s_brgy">
                        

                        <p1>*If the Elementary School is Private, Please indicate the school fees charged by the Elementary School</p1>

                        <div class="input-box">
                        <label for="tuition">Tuition:</label>
                        <input type="text" id="s_tuition"  required name="s_tuition">
                        </div>


                        <div class="input-box">
                        <label for="other">Other:</label>
                        <input type="text" id="s_other"  name="s_other">
                        </div>

                        <div class="input-box">
                        <label for="mis">Miscellaneous:</label>
                        <input type="text" id="s_misc"  required name="s_misc">
                        </div>

                        
                        <h2>Attestation</h2>

                        <p1>Documents attached to this application</p1>

                        <div class="input-box">
                        <label for="files">Recent identical 2x2 ID photo (2 copies):</label>
                        <input type="file" id="files" name="IDphoto" multiple><br><br>

                        <label for="files">PSA Certified:</label>
                        <input type="file" id="files" name="PSAcert" multiple><br><br>

                        <label for="files">Photocopy of Grade 6 Report Card:</label>
                        <input type="file" id="files" name="s_card" multiple><br><br>

                        <label for="files">Latest Income Tax Return for the previous year:</label>
                        <input type="file" id="files" name="latest_ITR" multiple><br><br>

                        <label for="files">or Certificate of Tax Exemption or Municipal:</label>
                        <input type="file" id="files" name="cert_TaxEx" multiple><br><br>

                        <label for="files">Certificate of Unemployment of Parent/Guardian:</label>
                        <input type="file" id="files" name="cert_Unem" multiple><br><br>


                        <label for="myCheckbox">I certify that my answers are true correct to the best of my knowledge.</label>
                        <input type="checkbox" id="myCheckbox" required name="myCheckbox" value="checked">

                        <label for="myCheckbox">I am aware that information supplied in this form will be retained by PEAC on a databse and will be processe in 
                            compliance with DaRa Protection Act. of 2012
                        </label>
                        <input type="checkbox" id="myCheckbox" required name="myCheckbox" value="checked">

                        <label for="myCheckbox">I consent that the information herin may be used for report both internally and to the Departmen of Education</label>
                        <input type="checkbox" id="myCheckbox" required name="myCheckbox" value="checked">
                        <br>
                        </div>
				
			            <div class="button">
				        <input type="submit" name="submit" value="Submit">
			            </div>
			
			
            </form>
            </div>
        
					


</body>

<script>

        //For add item in ESC form
        document.addEventListener("DOMContentLoaded", function () {
         // Get references to the buttons and the list
        const addItemButton = document.getElementById("addItem");
        const removeItemButton = document.getElementById("removeItem");
        const list = document.getElementById("myList");
        const itemTextInput = document.getElementById("itemText");

  // Function to add a new list item with user input
        addItemButton.addEventListener("click", function () {
        const itemText = itemTextInput.value;
        if (itemText.trim() !== "") {
            const newItem = document.createElement("li");
            newItem.textContent = itemText;
            list.appendChild(newItem);
            itemTextInput.value = ""; // Clear the input field
         }
     });

  // Function to remove the last list item
         removeItemButton.addEventListener("click", function () {
         const listItems = list.getElementsByTagName("li");
        if (listItems.length > 0) {
        list.removeChild(listItems[listItems.length - 1]);
    }
    });
    });

</script>



</html>
