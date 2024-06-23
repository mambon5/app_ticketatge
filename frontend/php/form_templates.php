<?php

function templ_addform($objecte) {
    $form_add ='
    <form id="regForm" action="" method="post" onsubmit="return validateForm()"
        >
        <h1>Nous '.$objecte.'</h1>
        <!-- One "tab" for each step in the form: -->
        
        <div class="tab">
            <p>  <label for="cars">Profe:</label> 
                    <select name="nomprofes" id="nomprofes" onclick="deleteinvalid(this)">
                        <option value="">tria profe</option>
                    </select>
            </p>

            <p>  <label for="cars">Alumne:</label> 
                    <select name="nomalumnes" id="nomalumnes" onclick="deleteinvalid(this)">
                        <option value="">tria alumne</option>
                    </select>
            </p>
            
            <p>
                    Dia:
            <input  id="dia" placeholder="yyyy-mm-dd"  oninput="this.className = \'\'" 
                        name="dia" type="date" required>
            </p>
                
            <input  id="tipureg" placeholder=""  style="display:none" value="nou"
                        name="tipureg" type="text" required>
        </div>
        
        <div class="tab">
            <p>  <label for="cars">Hores fetes (min):</label> 
                <select name="temps" id="temps" >
                    <option value="">Tria hora</option>
                </select></p>
        
            <p>  <label>Temps de desplaçament fins a l\'alumn@ (min):</label> 
                <select name="tdesp" id="tdesp" >
                    <option value="">Tria temps</option>
                </select></p>
        
            <p>  <label>Clase feta en un cafè/restaurant:</label> 
                <select name="cafe" id="cafe" >
                    <option value="0">Nop</option>
                    <option value="1">Sí</option>
                </select></p>
        
            <p>  <label >Comentari:</label> 
                <input type="text" name="comentari" id="comentari" 
                        placeholder="I moved to his place..."  
                        oninput="this.className = \'\'"></p>
        </div>
        
        <div style="overflow:auto;">
            <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-arrow-left"></i> Anterior</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Següent</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
    ';


    return $form_add; 
}
