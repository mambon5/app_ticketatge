<?php

include("/var/www/ticket_webapp/php/connexion_base.php");//contains all passwords
include("/var/www/ticket_webapp/php/get_elems.php");//contains function to extract db data

include("/var/www/ticket_webapp/frontend/php/page_template.php");//contains html webpage templates to save code

$usuaris = get_users();

//now print template parts:
echo templ_header2("usuaris");
?> 

<script>
      var usuaris=<?php  echo $usuaris ?>;
      print_table(usuaris,["nom","telefon","email","data_registre"] ,"taula_vistes", 
                          ["nom","telefon","email","data registre"])
</script>

<?php 
echo $template_footer
?>
