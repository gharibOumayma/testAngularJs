<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $_nomCategorie = mysqli_real_escape_string($connect, $data->nomCategorie);
      $_description = mysqli_real_escape_string($connect, $data->description);     
      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO categorie(nomCategorie,description) VALUES ('$_nomCategorie','$_description')";  
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
           $query = "UPDATE categorie SET description='$_description' WHERE nomCategorie = 
           '$_nomCategorie'";  
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