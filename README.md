# WooCommerce Settings Tab
Criando uma nova tab de opções dentro das configurações do WooCommerce.

<b>COMO USAR A CLASS:</b><br>
Instancie a class e crie as suas opções no método get_settings().

<b>COMO USAR AS OPÇÕES SALVAS:</b><br>
Para usar as opções basta usar um código semelhante a este abaixo:
<br><br>
$option = get_option('nome_da_opcao');<br>
echo $option;
