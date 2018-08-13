<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {     

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

      $btn_name = $data->btnName;  
      if($btn_name == "ADD") { 
      $query = "INSERT INTO produits(nom_commercial,num_homologation,tableau_toxicologique,teneur,dose,dar,prix,cultureNom,
      ennemisNom,raison_sociale,nomCategorie) VALUES 
      ('$_nom_commercial','$_num_homologation','$_tableau_toxicologique','$_teneur','$_dose','$_dar','$_prix','$_cultureNom','$_ennemisNom','$_raison_sociale','$_nomCategorie')";  
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
           $produitId = $data->produitId;  
           $query = "UPDATE produits SET nom_commercial = '$_nom_commercial', num_homologation = '$_num_homologation' , tableau_toxicologique = '$_tableau_toxicologique', teneur = '$_teneur', dose = '$_dose', dar = '$_dar', prix= '$_prix',cultureNom= '$_cultureNom',ennemisNom= '$_ennemisNom',raison_sociale= '$_raison_sociale',nomCategorie= '$_nomCategorie' WHERE produitId = '$produitId'";  
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