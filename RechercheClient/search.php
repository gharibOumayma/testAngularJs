 <?php  
 //select.php  
 $connect = mysqli_connect("localhost", "root", "", "samah");  
 $data = json_decode(file_get_contents("php://input"));
 $output = array();  

 $query = "SELECT * FROM produits";
  //Check if post has some params
 if (count($data)>0) {
    $query .= " where "; 
    foreach($data as $filter=>$value){
        $query .= $filter." = '".$value."' and ";
     }
     //Just for the remaining 'and' 
     $query .= '1 = 1';
 }
 
 $result = mysqli_query($connect, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {   
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?> 
  
