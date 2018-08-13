<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $_titre = mysqli_real_escape_string($connect, $data->titre);       
      $_description = mysqli_real_escape_string($connect, $data->description);
      $_url= mysqli_real_escape_string($connect, $data->url); 
      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO actualites(titre, description,url) VALUES ('$_titre', '$_description','$_url')";  
      if(mysqli_query($connect, $query))  
      {  
           echo "Data Inserted...";  
      }  
      else  
      {  
           echo 'Error';  
      }
      }
      if($btn_name == 'Update') 
      {  
           $actualiteId = $data->actualiteId;  
           $query = "UPDATE actualites SET titre = '$_titre', description = '$_description' , url = '$_url' WHERE actualiteId = '$actualiteId'";  
           if(mysqli_query($connect, $query))  
           {  
                echo 'Data Updated...';  
           }  
           else  
           {  
                echo 'Error';  
           }  
      }    
 }  
 ?>  