
<?php
include("/var/www/app_ticketatge/php/connexion_base.php");//contains all passwords
include("/var/www/app_ticketatge/php/get_elems.php");//contains function to extract db data

// pillant els valors de les variables enviades amb el form
$nom = $_POST['nom'];
//be cafeful wiht 'comentari'. Si el comentari té una coma ', donarà
        //error.
$nom = mysqli_real_escape_string($conn, $nom);
$data_event = $_POST['data_event'];
$contrasenya = $_POST['contrasenya'];
$comentari = $_POST['comentari'];
$tipusreg = $_POST['tipusreg'];

//variables per redireccio:
$pagina_resultant = "/frontend/veure/events.php";
$etiqueta = "event";

if($tipusreg == "nou") {
    global $message;
    //farem una comprovació prèvia de que no s'ha enviat ja un objecte amb 
    //aquestes dades.
    $taula = "events";
    $where = " WHERE "            
            . "nom = '" . $nom . "' AND "
            . "data_event = '" . $data_event . "'";
     
     // comprovant que no hi ha cap classe amb aquests paràmetres:
     $sql = "SELECT * FROM ". $taula. " " . $where;
     echo "Mysql command: " . $sql;
     
     $result=mysqli_query($conn,$sql );
     
     $json = array();
//    echo "<br><br> result: " . $result;
    while( $row = mysqli_fetch_assoc($result))     
     {
        $json[]= $row;
    }
    if( count($json) > 0) {
        //modified
        $failmsg="error: Ja hi ha un ".$etiqueta." amb aquests paràmetres!"; 
//                . $sql. " <br>";
        $message = $failmsg; 
    } else {   // ara sí, afegeix la usuària sino hi ha ja una usuària així:
        $sql = "INSERT INTO ". $taula." (nom, data_event, contrasenya, comentari)
       VALUES ('" . $nom . "', '" . $data_event .
                "', '" . $contrasenya . "', '" . $comentari . "')";

        //$failmsg="Error afegint linia a ".$taula.": Query: " . $sql . " " ;
        $failmsg="Error al afegir un nou ".$etiqueta ;
        $successmessage= $etiqueta." afegit correctament";

        if ($conn->query($sql) === TRUE) {
        
            $message = $successmessage;
            
          } else {
            $message = $failmsg;            
           
          }
    }
    header("Location: ".$pagina_resultant."?result=".$message);
}
else{
    echo "<br> 
    modificar o eliminar registres de la base de dades encara no ha estat impelementat <br>";
}