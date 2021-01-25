<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('poem_cluster.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
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
    <div class="modal-header"> <a class="close" href="../index.php">&times;</a>
      <h2><center>The Apparition</center></h2>
      <hr>
     
      
    </div>
    <div class="modal-body">
      <?php
      $sql =<<<EOF
      SELECT * FROM poem_cluster WHERE poemname='The Apparition' ;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      // echo $row['content'];
          // echo str_replace(",","</br>",$row['content']); 
            echo nl2br($row['ori_content']);
   }
   echo "";
   $db->close();
?>
    </div>
  </div>

</div>
</body>
