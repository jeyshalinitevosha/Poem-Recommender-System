<?php
class MyDB extends SQLite3 
{
    function __construct() 
    {
        $this->open('poem_cluster.db');
    }
}
$db = new MyDB();
if(!$db) 
{
    echo $db->lastErrorMsg();
} 
else 
{
	echo "";
}
?>
<html>
<head>
    <title>The Apparition</title>
</head>
<style type="text/css">

    body{   

    background-image: url(../img/poem.jpg);
    background-size: cover;
    background-position: center;
    }
    /* The Modal (background) */
.modal {
 padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 70%;  Full width 
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  font-size:23px;
  text-align: center;
  vertical-align: middle;

  position: absolute;
  top: 10%;
  left: 25%;
  margin: -25px 0 0 -25px; /* apply negative top and left margins to truly center the element */
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.modal-body { padding: 2px 16px;}
</style>
<body>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <script>
function goBack() {
    window.history.back();
}
</script>
    <div class="modal-header"> <a class="close" onclick="goBack();">&times;</a>
     
  </div>

  
     
    <div class="modal-body">
      <?php

    $id = $_GET['poemname'];
    $query = $db->query("SELECT ori_content FROM poem_cluster WHERE  poemname = '$id'");
    while($row = $query->fetchArray()){
        
        ?>
        <h2><?php echo $id; ?></h2> <hr>
        <?php
        echo nl2br($row['ori_content']);
        ?>
        <tr>
    <td></td>
</tr>     </div></div>
      <?php 
}
?>
    </div>
  </div>

</div>
</body>


    