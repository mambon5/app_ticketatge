<?php



include("/var/www/app_ticketatge/frontend/php/page_template.php");//contains html webpage templates to save code

$events = get_events();

//now print template parts:
$template_header = templ_header2("events");
echo $template_header;
?> 

<script>
      var events=<?php  echo $events ?>;
      print_table(events,["id","nom","data_event","contrasenya","comentari","data_registre"] ,"taula_vistes",  
                            ["id","nom","data event","contrasenya","comentari","data registre"])
</script>

<?php 
echo $template_footer
?>