function functionName ( inVars ) {
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set up prepared statements and paramaters.
    $stmt = $conn->prepare(" call databaseName . QueryName ( ?, @OutputVar );");
    $stmt -> bind_param ( "input types" , $in_Var, $in_Var);

    // Send the query to the database. 
    $in_Var = #inVar;
    $stmt -> execute();

    // if outputs
    // Query for the new set that is the output of the previouse query
    $results = $conn -> query ("SELECT @OutputVar as _QueryName_out");
    $result = $results -> fetch_assoc();
    return $result['_QueryName_out'];

    $stmt -> close();
}
