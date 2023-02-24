<?php

global $wpdb;
$tablename = $wpdb->prefix."customplugin";

// Delete record
if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All Entries</h1>

<table class="t-r">
  <tr>
   <th>No</th>
   <th>Name</th>
   <th>Username</th>
   <th>Email</th>
   <th>&nbsp;</th>
  </tr>


  <?php

  // Select records

  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($entriesList) > 0){
    $count = 1;
    foreach($entriesList as $entry){
      $id = $entry->id;
      $name = $entry->name;
      $uname = $entry->username;
      $email = $entry->email;

      echo "<tr>
      <td>".$count."</td>
      <td>".$name."</td>
      <td>".$uname."</td>
      <td>".$email."</td>
      <td><a href='?page=allentries&delid=".$id."'>Delete</a></td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No record found</td></tr>";
 }
?>
</table>












<style>
  
    .t-r {
       width:100%;
       border: 2px solid red; 
       font-size:20px; 
       background-color: aqua; 
       color:black;
    }
    .t-r th, td{        
        padding-top: 12px;
        padding-bottom: 12px;
        text-align:center;        
        background-color: #04AA6D;
        color: white;      
    }

    .t-r td:hover {
        background-color:#eab73d75;
    }
   

</style>