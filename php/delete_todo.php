<?php
 
/*
 * Following code will delete a todo from table
 * A product is identified by todo id (tid)
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['tid'])) {
    $tid = $_POST['tid'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql update row with matched tid
    $result = mysql_query("DELETE FROM todo_list WHERE tid = $tid");
 
    // check if row deleted or not
    if (mysql_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "todo successfully deleted";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // no todo found
        $response["success"] = 0;
        $response["message"] = "No todo found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>