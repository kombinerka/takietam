
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}
.menu {
  float:left;
  width:20%;
  text-align:center;
}
.menu a {
  background-color:#e5e5e5;
  padding:8px;
  margin-top:7px;
  display:block;
  width:100%;
  color:black;
}
.main {
  float:left;
  width:80%;
  padding:0 20px;
}

/*form */

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-15 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-65 {
  float: left;
  width: 65%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  .menu, .main, .col-15, .col-65, input[type=submit]{
    width:100%;
  }
}

</style>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">

<div style="background-color:#e5e5e5;padding:15px;text-align:center;">
  <h1>Contact</h1>
</div>

<div style="overflow:auto">
  <div class="menu">
    <a href="../index.html">Home</a>
    <a href="/pages/vraag.html">Uitleg</a>
    <a href="/pages/contact.html">Contact</a>
    
  </div>

  <div class="main">
    
    <body>
  <body>
<h4>Bedankt: <?php echo $_GET["firstname"]; ?> <?php echo $_GET["lastname"]; ?><br></h4>
<h4>Uw doel voor contact openemen is: <?php echo $_GET["Reden"]; ?></h4>
<h5>En uw bericht is als volgt: <?php echo $_GET["subject"]; ?></h5>

</body>

  </div>
  
   
</div>
  
  
</div>

<div style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">© copyright PJSDV: WNGON</div>



</html>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
              
$reden=$_GET["Reden"];
$vnaam=$_GET["firstname"];
$anaam=$_GET["lastname"];
$subject=$_GET["subject"];
$fp = fopen("/var/www/html/madebyphp/test.txt", "w");
fwrite($fp, " $vnaam $anaam \n Reden aanvraag: $reden \n $subject");

fclose($fp);

?>
