


<style>
  
  
body{

margin: 10px;
padding: 0;
box-sizing: border-box;
font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;



    
}

.btn_logout {

  border: none;
  color: rgb(255, 252, 252);
  background-color: #2e00c4;
  padding: 6px 10px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-weight: bold;
  font-size: 16px;
  margin: 10px 9px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 8px;


}

  

</style>
<h2> welcome student </h2>

<button class = "btn_logout" id = "logout">Log Out</button>
<script>
document.getElementById("logout").addEventListener("click", function() {
    
    window.location.href = "login.php"; 
});
</script>
