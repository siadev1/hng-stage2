<?php
include_once 'connection.php';
include_once('index.php');
header("Content-Type: application/JSON");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {


    case 'GET':
    
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    // Access the data and perform operations
    $id = $data['id'];
    if ($id !== null && is_int($id)) {
        // Perform further processing or respond to the request
        $result= $conn->prepare ("SELECT * FROM users where `id`=:id");
        $result->execute([
            'id'=>$id
        ]);
    
    $result = $result->FETCHAll(PDO::FETCH_ASSOC);
    // check if the requested data exists
    if(!empty($result)){

        $response=json_encode($result);
        echo $response;
    }else{
        $response= array(
            "message"=>'user data NOT found'
        );
        json_encode("user data not found");
        echo  $response;
    }
        } else {
        // JSON decoding failed
        http_response_code(400); // Bad Request
        echo "Invalid JSON data";
        }
    

    break;

    // handle post method
    case 'POST':
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    if ($data !== null  && !empty($data['name'])) {
        // Access the data and perform operations
        if(is_string($name = $data['name'])){
            
            $insert= $conn->prepare ("INSERT INTO users (`name`)VALUES
            (:fname) ");
            $check=$insert->execute ([
                ':fname' => $name,
                
            ]);
            if($check){
                $response= array(
                    "id"=>$conn->lastInsertId(),
                    "name"=>$name
                );
                $response = json_encode($response);
                echo $response;
            }

        }else{
            echo "invalid";
        }
        // Perform further processing or respond to the request
        } else {
        // JSON decoding failed
        http_response_code(400); // Bad Request
        echo "Invalid JSON data";
        }
    
    
    break;



    // handle put request
    case 'PUT':
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $id=$data['id'];
    $name = $data['name'];
    if ($id!='' && $name!='' && is_int($id) && is_string($name)) {
        // Access the data and perform operations

        $result= $conn->prepare ("SELECT * FROM users where `id`=:id");
        $result->execute([
            'id'=>$id
        ]);
            // };
        $result = $result->FETCHAll(PDO::FETCH_ASSOC);
        // to make sure the record to be updated exists
        if(!empty($result)){

            $update= $conn->prepare ("UPDATE users SET `name`=:name WHERE `id`=:id ");
            
            $check=$update->execute ([
                ':id'=>$id,
                ':name' => $name
                
            ]);
            if($check){
                $response= array(
                    
                    "message"=>'user updated successfull'
                );
                $response = json_encode($response);
                echo $response;
            }
            
        }else{
            
            $response=json_encode("data not found");
            echo  $response;
        }
        
        
        // Perform further processing or respond to the request
    } else {
        // JSON decoding failed
        http_response_code(400); // Bad Request
        echo "Invalid JSON data";
        }
    break;
    
    
    // handle delete method
    case 'DELETE':
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    if ($data !== null) {
        // Access the data and perform operations
        $id = $data['id'];
        // Perform further processing or respond to the request
        } else {
        // JSON decoding failed
        http_response_code(400); // Bad Request
        echo "Invalid JSON data";
        }
    $delete= $conn->prepare ("DELETE FROM users WHERE id=:id");
    
    $check=$delete->execute ([
        ':id' => $id,
        
    ]);
    if($check){
        $response= array(
            "message"=>"deleted"
        );
        $response = json_encode($response);
        echo $response;
    }
    
    break;

default:
    # code...
    break;
}












?>