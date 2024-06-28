<?php

function templ_addform($objecte) {   
    global $form_events, $form_tickets, $form_usuaris;
    $accio = "";

    $form_extra_style = "";

    if($objecte == "usuaris") {
        $formad = $form_usuaris;
        $accio = "/backend/modifica/usuari.php";
    }
    else if($objecte == "events"){
        $formad = $form_events;
        $accio = "/backend/modifica/event.php";
    }
    else if($objecte == "tickets"){
        $formad = $form_tickets;
        $accio = "/backend/modifica/ticket.php";
        $form_extra_style = "display:none";
    }
    
    

    $form ='
    <form id="regForm" action="'.$accio.'" method="post" onsubmit="return validateForm()"
        >
        <h1>Nous '.$objecte.'</h1>
        <!-- One "tab" for each step in the form: -->
        

        <div class="tab">
        <input  id="tipusreg" placeholder=""  style="display:none" value="nou"
        name="tipusreg" type="text" required>

        '. $formad .'
        
        <div style="overflow:auto;'.$form_extra_style.'">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-arrow-left"></i> Anterior</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Següent</button>
        </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;'.$form_extra_style.'">
            <span class="step"></span>
            <span class="step"></span>
        </div>
        </form>';


    return $form; 
}




$form_usuaris = '
<p>  <label for="cars">Nom i cognoms:</label> 
    <input name="nom" id="nom" placeholder="Maria Maldalev" type="text" 
           onkeyup="fill_inp(\'acronim\',rand_acronim(this.value,0))" required>
        

    </p>
 
    <p>   
    <label for="cars">Email:</label> 
            <input name="email" id="email" type="email" required
                placeholder="mariamaldalev@gmail.com, paugasol@viscaelbarça.com, ..." multiple>
    </p>

    <p>  <label for="cars">Telèfon:</label> 
    <input name="telefon" id="telefon" type="number" placeholder="654773..." 
            required>
    </p> 
    </div>
';


//"nom","data_event","contrasenya","comentari"


$form_events = '
    <p>  <label for="cars">Nom:</label> 
    <input name="nom" id="nom" placeholder="Maria Maldalev" type="text" 
           onkeyup="fill_inp(\'acronim\',rand_acronim(this.value,0))" required>
    </p>
 
    <p> <label for="cars">Data event</label> 
    <input  id="data_event" placeholder="data event..."  oninput="this.className = \'\'" 
    name="data_event" type="date" required></p>

    <p >  <label for="cars">Contrasenya:</label> 
       <input name="contrasenya" id="contrasenya" placeholder="secret123..." 
       type="text" required>
           

     </p>

    
    </div>

    <div class="tab">
    <p>  <label >Comentari:</label> 
    <input type="text" name="comentari" id="comentari" 
            placeholder="I moved to his place..."  
            oninput="this.className = \'\'"></p>
    </div>
';

//"tipus","id_usuari","id_event","comentari"

$form_tickets = '

       <p style="display:none">  <label  >usuari:</label> 
       <select name="usuari" id="usuari" onclick="deleteinvalid(this)">
           <option value="">tria usuari</option>

    </select></p>
    <p style="display:none">  <label  >event:</label> 
            <select name="event" id="event" onclick="deleteinvalid(this)">
                <option value="">tria event</option>

    </select></p>

       <p style="display:none">  <label >Tipus de ticket:</label> 
       <input name="tipus" id="tipus" type="number" placeholder="654773..." 
               required>
       </p> 


    

    <!--grid amb els 4 butonets per clicar el concepte que es vol -->
    
    
        <table class="table-grid-buttons">
            <tr >
                <td >
                    <button type="button"  class="nou-ticket" 
                    onclick="set_ticket_type(\'tipus\', 1)">
                    birra</button>
                </td>
                <td>
                <button type="button" class="elimina-ticket" 
                    onclick="set_ticket_type(\'tipus\', -2)">
                    cancela entrepà</button>
                </td>
            </tr>
            <tr >
                <td >
                    <button type="button" class="nou-ticket" 
                    onclick="set_ticket_type(\'tipus\', 2)">
                    entrepà</button>
                </td>
                <td>
                    <button type="button" class="elimina-ticket"
                    onclick="set_ticket_type(\'tipus\', -2)" >
                    cancela birra</button>
                </td>
            </tr>
        </table>
    
      
        <p style="display:none">  <label >Comentari:</label> 
        <input type="text" name="comentari" id="comentari" 
                placeholder="I moved to his place..."  
                oninput="this.className = \'\'">
                </p>
                </div>

';