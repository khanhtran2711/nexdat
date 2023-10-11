<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "shop_demo";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

// Execute your SQL query to retrieve data
$query = "SELECT * FROM products";
$result = $conn->query($query);

if ($result !== false) {
    $data = $result->fetchAll(PDO::FETCH_BOTH);
    $ps = array();
    foreach ($data as $key => $value) {
        $p = array("path" => $value[1],
    "fields" => array("name" => $value[2],"description"=>$value[3],"sets"=>$value[4],"technicaldata"=>$value[5],"scope"=>$value[6],"download"=>$value[7],"image"=>$value[8],"tags"=>$value[9]));
        array_push($ps,$p);
    }
    
    $newarray = array("products"=>$ps);
    // Convert data to JSON
    $json = json_encode($newarray, JSON_PRETTY_PRINT);

    // Output JSON
    header('Content-Type: application/json');
    echo $json;

    // If you want to save to a file
    file_put_contents('products.json', $json);
    header("Location: allnexproduct.php");
    
} else {
    die(print_r($conn->errorInfo(), true));
}

?>
