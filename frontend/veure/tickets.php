<?php


include("/var/www/app_ticketatge/frontend/php/page_template.php");//contains html webpage templates to save code

$tickets = get_tickets();

//now print template parts:
echo templ_header2("tickets");
?> 

<script>
      var tickets=<?php  echo $tickets ?>;
      print_table(tickets,["id","tipus","id_usuari","id_event","comentari","data_registre"] ,"taula_vistes",  
                            ["id","tipus","id_usuari","id_event","comentari","data registre"])
</script>

<?php 
echo $template_footer
?>
