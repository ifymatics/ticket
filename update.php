<?php
 include 'database.php';
$_POST = json_decode(file_get_contents('php://input'),true);
if(isset($_POST) && !empty($_POST)){
    $user_name = $_POST['username'];
    $tickect_type = $_POST['ticket_type'];
    $user_phone = $_POST['phone'];
    $tickeck_prize = $_POST['prize'];
    if( $tickeck_prize >='1000'){ 
        $sql = "UPDATE  ticket_table SET ticketType = '$tickect_type',
        phone = '$user_phone',
        prize = '$tickeck_prize' WHERE username = '$user_name'";
        if ($conn->query($sql) === TRUE) {
            ?>
            {
                "success":true,
                "message":"updated successfully"
            }
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            ?>
            {
                "success":false,
                "message":"Your update was  not successfull"
            }
       
    <?php
        }
    }
   
}