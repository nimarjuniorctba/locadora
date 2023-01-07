<?php
/* Smarty version 4.1.0, created on 2023-01-07 18:49:23
  from 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\Diversos\locadora\template\cliente\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63b9b0a396f801_73311075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87a384038b7387441a4985f85dcab0ea8dc616b8' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\Diversos\\locadora\\template\\cliente\\formulario.tpl',
      1 => 1673113637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:topo.tpl' => 1,
  ),
),false)) {
function content_63b9b0a396f801_73311075 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>

<title>Projeto Locadora</title>

<head>
<body>


<?php $_smarty_tpl->_subTemplateRender("file:topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<br>
<br>
			<h5 class="text-primary" style="margin-left: 33px;"><?php echo $_smarty_tpl->tpl_vars['pagina']->value->titulo;?>
</h5>
<br>
<ul class="nav nav-tabs" style="width:94%;margin-left: 3%;">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="clientes.php?acao=listar">Listar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="clientes.php?acao=<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
"><?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?></a>
  </li>
</ul>
<table class="table border" style="width:94%;margin-top:-1;margin-left: 3%;">

	<tr>
		<td>			
				<br>
					<div class="table-responsive-sm">
					<form name="form" method="POST">
						<table class="table table-bordered" style="width: 75%;margin-left:5%">
						  <thead>
							<tr class="table-active">
							  <th scope="col" colspan="2">Preencha os dados</th>
							</tr>
						  </thead>
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?>
								<tr>
								  <td>Codigo</td>
								  <td>
									<input type="text" class="form-control"disabled<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id;?>
" <?php }?>>
								  </td>
								</tr>
							<?php }?>						
							<tr>
							  <td>Nome<span class="obrigatorio">*<span></td>
							  <td>
								<input type="text" class="form-control" id="cli_nome" name="cli_nome"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->nome;?>
" <?php }?>>
							  </td>
							</tr>
							<tr>
							  <td>E-mail<span class="obrigatorio">*<span></td>
							  <td>
							  
									<input type="text" class="form-control" id="cli_email" name="cli_email"<?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'alterar') {?> value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->email;?>
" <?php }?>>						  
							  
							  </td>
							</tr>
							<tr>
								<td scope="col"  colspan="2">
									<span style="float:right;"><button type="submit" name="submit"  id="submit" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value->acao;?>
" class="btn btn-success"><?php if ($_smarty_tpl->tpl_vars['pagina']->value->acao == 'cadastrar') {?>Cadastrar<?php } else { ?>Alterar<?php }?></button></span>
								</td>
							</tr>

						  </tbody>
						</table>
					</form>
					</div>	
	</td>
    </tr>
</table>

<?php echo '<script'; ?>
 type="text/javascript" src="js/formulario/cliente.js"> <?php echo '</script'; ?>
>
</body>
</html>





<?php }
}
