<?php
include 'database.php';
$_POST = json_decode(file_get_contents('php://input'),true);
if(isset($_POST) && !empty($_POST)){
    $all = $_POST['all'];
    
    $sql = "SELECT * FROM ticket_table";
    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
        $data = array();
        while($row = $result->fetch_assoc()) {
           // echo "id: ". $row["id"]. "<br>". " - username: " . $row["username"]. "<br>"." - phone: " .$row["phone"]. "<br>". " - ticket description: " .$row["ticketName"]. "<br>"." - prize: " . $row["prize"]."<br>";
           
          
               $data['user']= $row;
          
           $mydata = json_encode($data);
           echo $mydata;
        }
           
            
         
            ?>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            ?>
            {
                "success":false,
                "message":"Your ticket purchase was  not successfull, you did not pay the right amount"
            }
       
    <?php
        
    }
   
}