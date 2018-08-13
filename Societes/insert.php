<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $_raison_sociale = mysqli_real_escape_string($connect, $data->raison_sociale);       
      $_mobile = mysqli_real_escape_string($connect, $data->mobile);
      $_fix = mysqli_real_escape_string($connect, $data->fix);
      $_fax= mysqli_real_escape_string($connect, $data->fax); 
      $_adresse= mysqli_real_escape_string($connect, $data->adresse);
      $_email= mysqli_real_escape_string($connect, $data->email);
      $_site_web= mysqli_real_escape_string($connect, $data->site_web);
      $_latitude= mysqli_real_escape_string($connect, $data->latitude);
      $_longitude= mysqli_real_escape_string($connect, $data->longitude);
      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO societe(raison_sociale, mobile,fix,fax,adresse,email,site_web,latitude,longitude) VALUES 
      ('$_raison_sociale', '$_mobile','$_fix','$_fax','$_adresse','$_email','$_site_web','$_latitude','$_longitude')";  
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
 
           $query = "UPDATE societe SET  mobile = '$_mobile' , fix = '$_fix' , fax = '$_fax', adresse = '$_adresse', email = '$_email', site_web = '$_site_web', latitude= '$_latitude', longitude = '$_longitude' WHERE raison_sociale = '$_raison_sociale'";  
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