
<?php
include("/var/www/app_ticketatge/php/connexion_base.php");//contains all passwords
include("/var/www/app_ticketatge/php/get_elems.php");//contains function to extract db data

// pillant els valors de les variables enviades amb el form
$nom = $_POST['nom'];
//be cafeful wiht 'comentari'. Si el comentari té una coma ', donarà
        //error.
$nom = mysqli_real_escape_string($conn, $nom);
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$tipusreg = $_POST['tipusreg'];
echo "valor de tipusreg: " .$tipusreg;

if($tipusreg == "nou") {
    //farem una comprovació prèvia de que no s'ha enviat ja una classe amb 
    //aquestes dades.
    $taula = "usuaris";
    $where = " WHERE "            
            . "nom = '" . $nom . "' AND "
            . "email = '" . $email . "' AND "            
            . "telefon = '" . $telefon . "'";
     
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
        $failmsg="error: Ja hi ha un usuari amb aquests paràmetres! Query: "; 
//                . $sql. " <br>";
        $failed=true;
        exit($failmsg);
    } else {   // ara sí, afegeix la usuària sino hi ha ja una usuària així:
        $sql = "INSERT INTO ". $taula." (nom, email, telefon)
       VALUES ('" . $nom . "', '" . $email .
                "', '" . $telefon . "')";

        $failmsg="<br>Error afegint linia a ".$taula.": Query: " . $sql . " " ;
        $successmessage="<br>Linia afegida a ".$taula." correctament";

        if ($conn->query($sql) === TRUE) {
        
            echo $successmessage;
          } else {
              $error = "error";
           exit($failmsg . $conn->error);
          }
    }
}
else{
    echo "<br> 
    modificar o eliminar registres de la base de dades encara no ha estat impelementat <br>";
}