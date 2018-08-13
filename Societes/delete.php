 <?php  
 //delete.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $raison_sociale = $data->raison_sociale;  
      $query = "DELETE FROM societe WHERE raison_sociale='$raison_sociale'";  
      if(mysqli_query($connect, $query))  
      {  
           echo 'Data Deleted';  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?> 
 