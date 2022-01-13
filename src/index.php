<?php
include_once 'includes/dbc.php';
?>

<?php
echo "MTG Credit App";

# $mysqli = new mysqli("db", "root", "DEcaLbcqMoGLbfj7", "mtgcredit");

$sql = 'SELECT * FROM Players';

if ( $result = $conn->query( $sql )) {
    while ( $data = $result->fetch_object() ) {
        $Players[] = $data;
    }
}

foreach ($Players as $Player) {
    echo "<br>";
    echo $Player->FirstName ;
    echo "<br>";
}

?>