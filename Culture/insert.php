<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $_cultureNom = mysqli_real_escape_string($connect, $data->cultureNom);
      $_description = mysqli_real_escape_string($connect, $data->description);     
      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO culture(cultureNom,description) VALUES ('$_cultureNom','$_description')";  
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
           $query = "UPDATE culture SET description='$_description' WHERE cultureNom = 
           '$_cultureNom'";  
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