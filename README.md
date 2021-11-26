# WooCommerce Settings Tab
Criando uma nova tab de opções dentro das configurações do WooCommerce.

<p><b>COMO USAR:</b></p>
<ul>
  <li>1 - Instancie a class.</li>
  <li>2 - Troque o texto <code>meu_plugin</code> pelo nome que deseja usar.</li>
  <li>3 - Edite as opções no método get_settings() com o que deseja.</li>
</ul>


<p><b>COMO USAR AS OPÇÕES SALVAS:</b><br>
Para usar as opções que foram salvas é só usar seu código como no exemplo abaixo.</p>


<pre>$option = get_option('nome_da_opcao');
echo $option;</pre>
