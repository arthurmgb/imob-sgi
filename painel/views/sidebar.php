<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel" style="margin-bottom: 20px; margin-top: 10px">
			<a href="<?php echo BASE_URL; ?>">
				<img src="<?php echo BASE_URL;?>assets/images/logo.png" width="205" >
			</a>	
		</div>
		<ul class="sidebar-menu" data-widget="tree">
			<li class=" <?php echo ($viewData['menu_ativo']=='dashboard')? 'active': ''; ?>">
				<a href="<?php echo BASE_URL; ?>" title="Dashboard" > 
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='proprietarios')? 'active': ''; ?>">
				<a href="#">
					<i class="fa fa-laptop"></i>
					<span>Proprietários</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>proprietarios/adicionar"><i class="fa fa-circle-o"></i> Novo</a></li>
					<li><a href="<?php echo BASE_URL; ?>proprietarios"><i class="fa fa-circle-o"></i> Listar</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='imoveis') ?'active':'';?>">
				<a href="#">
					<i class="fa fa-home"></i>
					<span>Imóveis</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>imovel/adicionar"><i class="fa fa-circle-o"></i> Novo</a></li>
					<li><a href="<?php echo BASE_URL; ?>imovel"><i class="fa fa-circle-o"></i> Listar</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='inquilinos') ? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-user"></i> 
					<span>Inquilinos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>inquilinos/adicionar"><i class="fa fa-circle-o"></i> Novo</a></li>
					<li><a href="<?php echo BASE_URL; ?>inquilinos"><i class="fa fa-circle-o"></i> Listar</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='fiadores') ? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-laptop"></i>
					<span>Fiadores</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>fiadores/adicionar"><i class="fa fa-circle-o"></i> Novo</a></li>
					<li><a href="<?php echo BASE_URL; ?>fiadores"><i class="fa fa-circle-o"></i> Listar</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='contratos')? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-table"></i> 
					<span>Contratos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>contratos/adicionar" target="_blank"><i class="fa fa-circle-o"></i>Novo</a></li>
					<li><a href="<?php echo BASE_URL; ?>contratos"><i class="fa fa-circle-o"></i>Listar</a></li>
					<li><a href="<?php echo BASE_URL; ?>contratos/buscar"><i class="fa fa-circle-o"></i>Buscar</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='financeiro') ? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-money"></i> 
					<span>Financeiro</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>financeiro"><i class="fa fa-circle-o"></i>Receber</a></li>
					<li><a href="<?php echo BASE_URL; ?>financeiro/gerarecibo"><i class="fa fa-circle-o"></i>Gerar Recibos por Datas</a></li>
					<li><a href="<?php echo BASE_URL; ?>financeiro/caixa"><i class="fa fa-circle-o"></i>Caixa</a></li>
					<li><a href="<?php echo BASE_URL; ?>financeiro/recb"><i class="fa fa-circle-o"></i>Recibo em Branco</a></li>
					<li><a href="<?php echo BASE_URL; ?>financeiro/lancamentos"><i class="fa fa-circle-o"></i>Lançamentos</a></li>
					<li><a href="<?php echo BASE_URL; ?>financeiro/repasse"><i class="fa fa-circle-o"></i>Repasse do Proprietario</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='relatorios') ? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-file-text-o"></i> 
					<span>Relatórios</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">

					<li>
						<a href="<?php echo BASE_URL;?>relatorios/clientes">
							<i class="fa fa-circle-o"></i>Relatório Clientes
						</a>
					</li>

					<!-- <li><a target="_blank" href="<?php echo BASE_URL;?>relatorios/financeiro"><i class="fa fa-circle-o"></i>Relatório Mensal</a></li> -->
				
					<li><a target="_blank" href="<?php echo BASE_URL;?>relatorios/imoveis"><i class="fa fa-circle-o"></i>Imóveis Cadastrados</a></li>

					<li><a target="_blank" href="<?php echo BASE_URL;?>relatorios/disponiveis"><i class="fa fa-circle-o"></i>Imóveis Disponiveis</a></li>

					<li><a target="_blank" href="<?php echo BASE_URL;?>relatorios/proprietarios"><i class="fa fa-circle-o"></i>Proprietarios Cadastrados</a></li>

					<li><a target="_blank" href="<?php echo BASE_URL;?>relatorios/inquilinos"><i class="fa fa-circle-o"></i>Inquilinos Cadastrados</a></li>


					<li><a target="_blank" href="<?php echo BASE_URL;?>relatorios/iptu"><i class="fa fa-circle-o"></i>Inquilinos com IPTU</a></li>

				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='configuracoes') ? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-cog"></i> 
					<span>Configurações</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>configuracoes"><i class="fa fa-circle-o"></i>Informações</a></li>
					<li><a href="<?php echo BASE_URL; ?>configuracoes/empresa"><i class="fa fa-circle-o"></i>Cadastra Empresa</a></li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo']=='usuarios') ? 'active':''; ?>">
				<a href="#">
					<i class="fa fa-user"></i> 
					<span>Usuários</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE_URL; ?>usuarios/adicionar"><i class="fa fa-circle-o"></i> Novo</a></li>
					<li><a href="<?php echo BASE_URL; ?>usuarios"><i class="fa fa-circle-o"></i> Listar</a></li>
				</ul>
			</li>
			<li class="">
				<a href="<?php echo BASE_URL;?>logout">
					<i class="fa fa-power-off"></i> <span>Sair</span>
				</a>
			</li>
		</ul>
	</section>
</aside>