<?php
   //  using the browser url:  
   //  http://localhost/PHPexec.php?f=C:\Roma\Nebeans_repsol\Helico\public_html\php\sendscore.php


function match_cols_to_vals_sql( $wherec="",$wherev="") { //two arrays one of cols ano
    //ther of values, all columns must match the values
    $n = count($wherec);
    if($n != count($wherev) or $n <1) {
        exit("error, el número de columns en el WHERE i de valors no coincideixen");
    }
    $col = $wherec[0];
    $val = $wherev[0];
    $condition = $col . "='" . $val . "'";
    for($i = 1; $i < $n ; $i++){
        $col = $wherec[$i];
        $val = $wherev[$i];
        $condition = $condition . " AND " . $col . "='" . $val ."'";
    }
    return $condition;
}
 
function sel_query($array, $table, $wherec="",$wherev="") {
    $camps = implode(", ", $array);
     
    $sql = "SELECT " . $camps ." FROM " . $table;
    if($wherec != "") {        
       $condition = match_cols_to_vals_sql( $wherec,$wherev);
       $sql = $sql . " WHERE " . $condition;
    }
    return $sql;
}

function get_elements($array, $table, $condition = "") {   
    //wherec stands for where columns, and wherev stands for where values.

    $camps = implode(", ", $array);
     
    $sql = "SELECT " . $camps ." FROM " . $table . " " . $condition; // get sql query
    
   
    global $conn;
    $result=mysqli_query($conn,$sql );
    $json = array();
    while($row = mysqli_fetch_assoc($result))     
     {
        $json[]= $row;
    }

    $jsonstring = json_encode($json);
    return $jsonstring;
}


function acronim($acro) {
    global $acros;
    $res = in_array($acro, $acros);
       
    return $res;
}

function get_users() {     
    $arr = array("nom", "telefon",
     "email", "data_registre");
    $elements = get_elements($arr, "usuaris");
    return $elements;
   
}

function get_tickets() {     
    $arr = array("id","tipus","id_usuari","id_event","comentari","data_registre");
    $elements = get_elements($arr, "tickets");
    return $elements;
   
}

function get_events() {     
    $arr = array("id","nom","data_event","contrasenya","comentari","data_registre");
    $elements = get_elements($arr, "events");
    return $elements;
   
}

get_events()
?>

