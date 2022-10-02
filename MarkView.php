<!DOCTYPE html>
<html>
  <head>
    <title>Mark View</title>
    <style>
     th {
  background: #95f985;
 }
    </style>
  </head>
<body style="height:100%">
<div style='float: left; width:100%; height:15vh;background-color:#95f985;text-align: center; border:solid;'>
<h1>View B.Tech Course Details</h1>
</div>

<div style='float: left; width:10%; height:45%;background-color:#95f985;text-align: center; border:solid;margin-top:2vh'>
<b >Choose Semester :</b>
    <form action='' method='POST' style=' font-weight: bold ;'>
    <br><br>




    <select name='sem'>
    <option  value=1>Fall_19-20</option>  
    <option  value=2>Winter_19-20</option>  
    <option  value=3>Fall_20-21</option>
    <option  value=4>Winter_20-21</option>  
    <option  value=5>Fall_21-22</option>  
    <option  value=6>Winter_21-22</option>
    <option  value=7>Fall_22-23</option>  
    <option  value=8>Winter_22-23</option>  
    </select><br><br>


<br><br>
    <input type='submit' name='save' value='Submit' style=' font-size: larger ;'> 
    <br>
    <br>
    
   
</form>
</div>   


<div style='float: left; width:70%; height:30vh;background-color:white;text-align: center; border:solid;margin:2vh ;margin-right:7.25%;margin-left:7.25%;'>







 <?php
$course_arr=array();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "practice";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(!$conn)
{
    die("Connect failed: " . mysqli_connect_error());
}
if(isset($_POST['save']))
    {  $s= $_POST['sem'];
      echo"
      <table   style='type:1;margin:3% auto;border:solid;border-color:green;'>
       <tr>
       <th>Semester</th>
       <th>Code</th>
       <th>Title</th>
       <th>Credit</th>
       <th>Category</th>
       <th>Slot</th>
       <th>Faculty</th>
       </tr>";
    
    $sql = "SELECT * FROM semester where Semester=$s";
    $result = $conn->query($sql);
    $i=0;
    
    if ($result->num_rows > 0) {
    
      while($row = $result->fetch_assoc()) {
    
    
    $sem=$row["Semester"];
    $cod=$row["code"];
    $title=$row["title"];
    $cre=$row["credit"];
    $cat=$row["category"];
    $slo=$row["slot"];
    $fac=$row["faculty"];


    $course_arr[$i]=$title;
    $i++;
    
      echo'<tr>';
      echo'<td>';
      echo $sem;
      echo '</td>';
      echo'<td>';
      echo $cod;
      echo '</td>';
      echo'<td>';
      echo $title;
      echo'</td>';
      echo'<td>';
      echo $cre;
      echo'<td>';
      echo  $cat;
      echo'</td>';
      echo'<td>';
      echo $slo;
      echo'</td>';
      echo'<td>';
      echo $fac;
      echo'</td>';
      echo'</tr>';
    
    
      
      }
    } else {
      echo "0 results";
    }

  
    echo"
    </table>
</div>

<div style='float: left; width:10%; height:45%;background-color:#95f985;text-align: center; border:solid;margin-top:2vh'>
<b >Choose Subject :</b>
    <form action='' method='POST' style=' font-weight: bold ;'>
    <br><br>




    <select name='sem'>
    <option  value='$course_arr[0]'>$course_arr[0]</option>  
    <option  value='$course_arr[1]'>$course_arr[1]</option>  
    <option  value='$course_arr[2]'>$course_arr[2]</option>
    <option  value='$course_arr[3]'>$course_arr[3]</option>  
    <option  value='$course_arr[4]'>$course_arr[4]</option>  
    <option  value='$course_arr[5]'>$course_arr[5]</option>

    </select><br><br>


<br><br>
    <input type='submit' name='save2' value='Submit' style=' font-size: larger ;'> 
    <br>
    <br>
    
   
</form>
</div>
    ";
  }
    if(isset($_POST['save2'])){
      

      echo"

      <b> MARKS</b>
      <BR>
      <table   style='margin:3% auto;border:solid;border-color:green;'>
      <tr>
      <th>TITLE</th>
      <th>CAT1</th>
      <th>CAT2</th>
      <th>DA1</th>
      <th>DA2</th>
      <th>QUIZ</th>
      </tr>";
      $marks_course=$_POST['sem'];
      $sql2 = "SELECT * FROM sem_marks where title='$marks_course' ";
      $result = $conn->query($sql2);

      if ( !empty($result->num_rows) && $result->num_rows > 0)  {

      while($row = $result->fetch_assoc()) {

        $vcn =  $row["title"];
        $vc1 =  $row["cat1"];
        $vc2 =  $row["cat2"];
        $vd1  = $row["da1"];
        $vd2 =  $row["da2"];
        $vqz  = $row["quiz"];
       
       
       
       
         echo'<tr>';
         echo'<td>';
         echo $vcn;
         echo '</td>';

         echo'<td>';
         echo $vc1;
         echo'</td>';
         echo'<td>';
         echo $vc2;
         echo'<td>';
         echo  $vd1;
         echo'</td>';
         echo'<td>';
         echo $vd2;
         echo'</td>';
         echo'<td>';
         echo $vqz;
         echo'</td>';
       
         echo'</tr>';
            

          }
        }

        


 }?>

   

</body>
</html>




