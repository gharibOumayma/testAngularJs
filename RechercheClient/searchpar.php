<?php  
 //insert.php  
$connect = mysqli_connect("localhost", "root", "", "samah");  
$data = json_decode(file_get_contents("php://input")); 
$connect->set_charset("utf8"); 
 
      $_nom_commercial = mysqli_real_escape_string($connect, $data->nom_commercial); 
      $_num_homologation = mysqli_real_escape_string($connect, $data->num_homologation); 
      $_tableau_toxicologique = mysqli_real_escape_string($connect, $data->tableau_toxicologique); 
      $_teneur = mysqli_real_escape_string($connect, $data->teneur); 
      $_dose = mysqli_real_escape_string($connect, $data->dose); 
      $_dar = mysqli_real_escape_string($connect, $data->dar);
      $_prix= mysqli_real_escape_string($connect, $data->prix); 
      $_cultureNom= mysqli_real_escape_string($connect, $data->cultureNom);
      $_ennemisNom= mysqli_real_escape_string($connect, $data->ennemisNom);
      $_raison_sociale= mysqli_real_escape_string($connect, $data->raison_sociale);
      $_nomCategorie= mysqli_real_escape_string($connect, $data->nomCategorie);

  
 
           $produitId = $data->produitId;  
           $query = "SELECT * FROM produits";  
           if(mysqli_query($connect, $query))  
           {  
                echo 'Data Selected...';  
           }  
           else  
           {  
                echo 'Error';  
           }     
 
 ?>  