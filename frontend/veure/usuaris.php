<?php


include("/var/www/app_ticketatge/frontend/php/page_template.php");//contains html webpage templates to save code

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
