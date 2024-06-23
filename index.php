<?php

include("/var/www/ticket_webapp/frontend/php/page_template.php");//contains html webpage templates to save code

//now print template parts:
echo templ_header1("Ticketatge");
?>

<h1>Benvinguts a la app d'etiquetatge</h1>

<table style="width:100%"
        class="w3-table w3-center-all w3-text-black  w3-bordered w3-hoverable-gray" >
        <tr onclick="window.location.href = 'frontend/veure/usuaris.php';"><th > veure usuaris</th></tr>
        <tr onclick="window.location.href = 'frontend/veure/tickets.php';"><th > veure tickets</th></tr>
        <tr onclick="window.location.href = 'frontend/veure/events.php';"><th >veure events</th></tr>
    </table>  
</body>