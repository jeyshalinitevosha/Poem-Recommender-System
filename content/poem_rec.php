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

if(isset($_POST['submit']))
{
    $POEM=$_POST['poem'];
    $query = $db->query("SELECT cluster FROM poem_cluster WHERE poemname='$POEM'");
    while($row = $query->fetchArray())
      {
        $clusterNo=$row['cluster'];
      }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>POEM RECOMMENDER SYSTEM</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">

    body
    {
    background-image: url("../img/bg4.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    }

    .search-container
    {
    float: right;
    }

    input[type=text] 
    {
     padding: 10px;
    margin-top: 8px;
     font-size: 17px;
    border: none;
    }

    
.abcde .Fresh.Mango {
  background-image: url(https://image.flaticon.com/icons/svg/8/8764.svg);
  cursor: pointer;
  width: 30px;
  height: 30px;

 left: 30px;
 top: 30px
}


table {
  border-collapse: collapse;
  width: 80%;
}
table.center {
    margin-left:auto; 
    margin-right:auto;
  }

th, td {
  text-align: left;
  padding: 8px;
}


tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: black;
  color: white;
}
th[scope=row] {
  position: -webkit-sticky;
  position: sticky;
  left: 0;
  z-index: 1;
}



</style>
<body>
   <br>
<br>
<div class="abcde" id="abcde">
      <div class="Fresh Mango"onclick="window.location='../index.php'"></div>

<br><br><br><br><br><br>

<center><h2>THE POEM(S) RECOMMENDED FOR YOU IS/ARE:</h2></center><br>
<?php
if(!isset($clusterNo))
{
  echo "<script>alert('No Records Available! Try Requesting Other Poems.'); window.location.href = '../index.php';</script>";

}
else
{
$query = $db->query("SELECT * FROM poem_cluster WHERE cluster='$clusterNo'");
$rows = 0;
?>
<table  class="center">
    <tr> 
    <th>AUTHOR</th>
    <th>POEM NAME</th>
    <th>AGE</th>
    <th>TYPE</th>
    <th></th>
    </tr>
<?php
    while($row = $query->fetchArray()) 
    {
    $AUTHOR=$row['author'];
    $NAME=$row['poemname'];
    $AGE=$row['age'];
    $TYPE=$row['type'];
    ?>
    <tr>
    <td><?php echo $AUTHOR;?></td>
    <td><?php echo $NAME;?></td>
    <td><?php echo $AGE; ?></td>
    <td><?php echo $TYPE; ?></td>
    <td><input type="submit"value="View" onclick="window.location.href='view-content.php?poemname=<?php echo $NAME; ?>'"></td>
    </tr>
    </center>
    <?php 
    }
  }
?>
</body>
</html>    