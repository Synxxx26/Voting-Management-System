<?php
include 'db_connect.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    // Delete votes associated with the user first
    $deleteVotesQuery = $conn->query("DELETE FROM votes WHERE user_id = $id");

    if($deleteVotesQuery){
        // Now delete the user
        $deleteUserQuery = $conn->query("DELETE FROM users WHERE id = $id");

        if($deleteUserQuery){
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete user."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to delete user's votes."]);
    }
}
?>
