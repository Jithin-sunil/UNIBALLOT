<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include("Header.php");
if(isset($_GET['aid']))
{
   $upQry= "update tbl_result set polling_status = 3 where polling_status = 1";
  $con->query($upQry);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     
.custom-button {
    display: inline-block;
    padding: 12px 24px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    background-color: #007bff; /* Primary color for the button */
    color: #ffffff; /* White text color */
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease; /* Smooth transition for hover effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle box shadow for depth */
}

.custom-button:hover {
    background-color: #0056b3; /* Darker color on hover */
    transform: translateY(-3px); /* Move the button slightly up */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Lift the button on hover */
    text-decoration: none;
    color: white;
}

.custom-button:active {
    background-color: #003366; /* Darker color when the button is clicked */
    transform: translateY(0); /* Reset the button position */
    box-shadow: none; /* Remove box shadow on click */
}

      </style>
</head>
<body>
<td><a href="ShowResult.php?aid=1" class="custom-button">Show</a></td>


</body>
</html>
<?php 
ob_end_flush();
include("Footer.php");
?>