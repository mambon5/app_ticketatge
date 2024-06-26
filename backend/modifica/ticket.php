
<?php
include("/var/www/app_ticketatge/php/connexion_base.php");//contains all passwords
include("/var/www/app_ticketatge/php/get_elems.php");//contains function to extract db data

// pillant els valors de les variables enviades amb el form

$tipus = $_POST['tipus'];
$id_usuari = $_POST['usuari'];
$id_event = $_POST['event'];
$comentari = $_POST['comentari'];
$tipusreg = $_POST['tipusreg'];

//variables per redireccio:
$pagina_resultant = "/frontend/veure/tickets.php";
$etiqueta = "ticket";
$taula = "tickets";

if($tipusreg == "nou") {
    global $message;
    //tots els tickets poden ser valids, nomes han de tenir un ticket id diferent, aixi que no comprovem res aqui
    // ... no es comprova si ja existeix un tiquet amb aquests paràmetres...
    // ara sí, afegeix la usuària sino hi ha ja una usuària així:
    $sql = "INSERT INTO ". $taula." (tipus, id_usuari, id_event, comentari)
    VALUES ('" . $tipus . "', " . $id_usuari .
            ", " . $id_event . ", '" . $comentari . "')";

    echo "mysql command: " . $sql;
            //$failmsg="Error afegint linia a ".$taula.": Query: " . $sql . " " ;
    $failmsg="Error al afegir un nou ".$etiqueta ;
    $successmessage= $etiqueta." afegit correctament";

    if ($conn->query($sql) === TRUE) {
    
        $message = $successmessage;
        
        } else {
        $message = $failmsg;            
        
        }
    
    header("Location: ".$pagina_resultant."?result=".$message);
}
else{
    echo "<br> 
    modificar o eliminar registres de la base de dades encara no ha estat impelementat <br>";
}