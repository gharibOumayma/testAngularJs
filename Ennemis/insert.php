<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $_ennemisNom = mysqli_real_escape_string($connect, $data->ennemisNom);
      $_description = mysqli_real_escape_string($connect, $data->description);     
      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO ennemis(ennemisNom,description) VALUES ('$_ennemisNom','$_description')";  
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
           $query = "UPDATE ennemis SET description='$_description' WHERE ennemisNom = 
           '$_ennemisNom'";  
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