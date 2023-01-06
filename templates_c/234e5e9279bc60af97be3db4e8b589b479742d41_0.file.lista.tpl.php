<?php
/* Smarty version 4.1.0, created on 2023-01-06 02:30:37
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Diversos\locadora\template\cliente\lista.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63b779bd933511_60486402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '234e5e9279bc60af97be3db4e8b589b479742d41' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Diversos\\locadora\\template\\cliente\\lista.tpl',
      1 => 1672968635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
  ),
),false)) {
function content_63b779bd933511_60486402 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>

<title>Projeto Locadora</title>
<?php echo '<script'; ?>
 type="text/javascript" src="js/formulario/home.js"> <?php echo '</script'; ?>
>

<head>
<body>


<?php $_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h4><?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</h4>

<div class="table-responsive-sm">
<table class="table table-bordered" style="width: 75%;margin-left:5%">
  <thead>
    <tr class="table-active">
      <th scope="col">Codigo</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>cliente 01</td>
      <td>Otto</td>
      <td><img src="imagens/icones/lupa.png" style="width:15x;height:15px" ></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>cliente 02</td>
      <td>cliente2@gmail.com</td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>cliente 03</td>
      <td>cliente3@gmail.com</td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>

</body>
</html>





<?php }
}
