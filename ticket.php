<?php
 include 'database.php';
$_POST = json_decode(file_get_contents('php://input'),true);
if(isset($_POST) && !empty($_POST)){
    $user_name = $_POST['username'];
    $tickeck_type = $_POST['ticket_type'];
    $user_phone = $_POST['phone'];
    $tickeck_prize = $_POST['prize'];
    if( $tickeck_prize >='1000'){ 
        $sql = "INSERT INTO ticket_table (username,ticketType,phone,prize)
        VALUES ('$user_name',  '$tickeck_type', '$user_phone', '$tickeck_prize' )";
        if ($conn->query($sql) === TRUE) {
            ?>
            {
                "success":true,
                "message":"Your ticket purchase was successfull"
            }
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
   
}