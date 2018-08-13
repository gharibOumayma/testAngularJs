<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $_raison_sociale = mysqli_real_escape_string($connect, $data->raison_sociale); 
      $_fix = mysqli_real_escape_string($connect, $data->fix);
      $_fax= mysqli_real_escape_string($connect, $data->fax); 
      $_adresse= mysqli_real_escape_string($connect, $data->adresse);
      $_email= mysqli_real_escape_string($connect, $data->email);
      $_regionNom= mysqli_real_escape_string($connect, $data->regionNom);
      $_villeNom= mysqli_real_escape_string($connect, $data->villeNom);

      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO agences(raison_sociale,fix,fax,adresse,email,regionNom,villeNom) VALUES 
      ('$_raison_sociale','$_fix','$_fax','$_adresse','$_email','$_regionNom','$_villeNom')";  
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
           $agenceId = $data->agenceId;  
           $query = "UPDATE agences SET raison_sociale = '$_raison_sociale', fix = '$_fix' , fax = '$_fax', adresse = '$_adresse', email = '$_email', regionNom = '$_regionNom', villeNom= '$_villeNom' WHERE agenceId = '$agenceId'";  
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