<?php
 $conn = oci_connect("Proyecto", "1", "localhost:1521/xe");
 if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    
}
?>