<?php
include("/var/www/app_ticketatge/php/connexion_base.php");//contains all passwords
include("/var/www/app_ticketatge/php/get_elems.php");//contains function to extract db data

include("/var/www/app_ticketatge/frontend/php/form_templates.php");//contains html webpage templates to save code

// loading html templates
// $ch = curl_init("http://ticket_app:80/frontend/php/template_head1.html");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
// $head1 = curl_exec($ch);
// curl_close($ch);



function templ_header1($titol) {
    $template_header = '
    <!DOCTYPE html>
    <html lang="ca">
    <head>
    <title>'. $titol .'</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/frontend/css/w3mod.css">
    <link rel="stylesheet" href="/frontend/css/slideformw3.css">

    <script src="/frontend/js/print_table.js"></script>
    <script src="/frontend/js/slideformw3.js"></script>
    <link rel="icon" type="image/x-icon" href="/w3images/favicon.png">

    </head>


    <style>
    body {font-family: Pier}
    </style>

    <body id="pagina" onload="emptyform(\'regForm\')">';

    return $template_header;
}

function templ_header2($objecte) {
    $form = templ_addform($objecte);

    $template_header = templ_header1("Veient " . $objecte) . '

    <!-- Navbar -->
    <div class="w3-top">
    <div class="w3-bar w3-left-align ">
        <a class=" mediumcolor bold w3-button w3-buttonw3-hover-white  w3-hover-white " href="/" >
        Torna enrere
        </a>
       
    </div>
    </div>

    <br>
    <br>
    <table style="width:100%"
        class="w3-table w3-center-all w3-text-black  w3-bordered w3-hoverable-gray" >
        <tr ><th class="w3-th"> Llistant '. $objecte . '</th></tr>
        <tr id="myBtn" class="lightcolor"><th > + Nous '. $objecte . '</th></tr>
    </table>  

    <table id="taula_vistes" style="width:100%"
        class="w3-table w3-center-all w3-text-black  w3-bordered w3-hoverable-gray" >
    </table>  

    <!-- The Modal -->
    <div id="myModal" class="w3-modal">

    <!-- Modal content -->
    <div class="w3-modal-content">
        <span class="w3-close">&times;</span>
         ' . $form . '
        
    </div>

    </div>
   

    </body>
    ';
    return $template_header;
}


$template_footer= '
<script src="/frontend/js/modal_div.js"></script>
</html>
';