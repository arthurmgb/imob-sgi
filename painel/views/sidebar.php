<aside class="main-sidebar">
	<section class="sidebar scroll-sb">
		<div class="user-panel" style="margin-bottom: 10px; margin-top: 0px; display: flex; align-items: center; justify-content: center; padding: 5px;">
			<a href="<?php echo BASE_URL; ?>">
				<img class="mdn-dash-logo" style="width: 154px;" src="<?php echo BASE_URL; ?>assets/images/logo.png">
			</a>
		</div>
		<ul class="sidebar-menu" data-widget="tree">
			<li class=" <?php echo ($viewData['menu_ativo'] == 'dashboard') ? 'active' : ''; ?>">
				<a href="<?php echo BASE_URL; ?>">
					<i class="fa fa-bar-chart"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'imoveis') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-home"></i>
					<span>Imóveis</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>imovel/adicionar">
							<i class="fa fa-plus-circle"></i>
							Cadastrar
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>imovel">
							<i class="fa fa-list-ul"></i>
							Listar
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'proprietarios') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-users"></i>
					<span>Proprietários</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>proprietarios/adicionar">
							<i class="fa fa-plus-circle"></i>
							Cadastrar
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>proprietarios">
							<i class="fa fa-list-ul"></i>
							Listar
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'inquilinos') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-user"></i>
					<span>Inquilinos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>inquilinos/adicionar">
							<i class="fa fa-plus-circle"></i>
							Cadastrar
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>inquilinos">
							<i class="fa fa-list-ul"></i>
							Listar
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'fiadores') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-user-o"></i>
					<span>Fiadores</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>fiadores/adicionar">
							<i class="fa fa-plus-circle"></i>
							Cadastrar
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>fiadores">
							<i class="fa fa-list-ul"></i>
							Listar
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'contratos') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-list-alt"></i>
					<span>Contratos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>contratos/adicionar">
							<i class="fa fa-plus-circle"></i>
							Cadastrar
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>contratos/buscar">
							<i class="fa fa-list-ul"></i>
							Listar
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'financeiro') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-money"></i>
					<span>Financeiro</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo BASE_URL; ?>financeiro">
							<i class="fa fa-usd"></i>
							Pagamentos
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>financeiro/gerarecibo">
							<i class="fa fa-files-o"></i>
							Gerar Recibos
						</a>
					</li>
					<!-- <li>
						<a href="<?php echo BASE_URL; ?>financeiro/recb">
							<i class="fa fa-file-o"></i>
							Recibo em Branco
						</a>
					</li> -->
					<!-- <li>
						<a href="<?php echo BASE_URL; ?>financeiro/caixa">
							<i class="fa fa-circle-o"></i>
							Caixa
						</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>financeiro/lancamentos">
							<i class="fa fa-circle-o"></i>
							Lançamentos
						</a>
					</li> -->
				</ul>
			</li>
			<li class="treeview <?php echo ($viewData['menu_ativo'] == 'relatorios') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-file-text-o"></i>
					<span>Relatórios</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">

					<li>
						<a href="<?php echo BASE_URL; ?>relatorios/parcelasClientes">
							<i class="fa fa-user-circle-o"></i>
							Relatórios de Parcelas de Clientes
						</a>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-file-powerpoint-o"></i>
							Relatórios Personalizados
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>

						<ul class="treeview-menu">
							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/contratos">
									<i class="fa fa-external-link"></i>
									Contratos
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/imoveis">
									<i class="fa fa-external-link"></i>
									Imóveis
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/disponiveis">
									<i class="fa fa-external-link"></i>
									Imóveis Disponíveis <b>(Lista)</b>
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/blocosDisponiveis">
									<i class="fa fa-external-link"></i>
									Imóveis Disponíveis <b>(Blocos)</b>
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/proprietarios">
									<i class="fa fa-external-link"></i>
									Proprietários
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/inquilinos">
									<i class="fa fa-external-link"></i>
									Inquilinos
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/banco">
									<i class="fa fa-external-link"></i>
									Proprietários <b>com Banco</b>
								</a>
							</li>

							<li>
								<a target="_blank" href="<?php echo BASE_URL; ?>relatorios/iptu">
									<i class="fa fa-external-link"></i>
									Inquilinos <b>com IPTU</b>
								</a>
							</li>
						</ul>

					</li>

				</ul>
			</li>

			<?php if ($_SESSION['user']['nivel'] == '1'): ?>
				<li class="treeview <?php echo ($viewData['menu_ativo'] == 'configuracoes' || $viewData['menu_ativo'] == 'usuarios' || $viewData['menu_ativo'] == 'aprovacoes') ? 'active' : ''; ?>">
					<a href="#">
						<i class="fa fa-cogs"></i>
						<span>Configurações</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li>
							<a href="<?php echo BASE_URL; ?>aprovacoes">
								<i class="fa fa-gavel"></i>
								Painel de Aprovação
							</a>
						</li>
						<li>
							<a href="<?php echo BASE_URL; ?>configuracoes/empresa">
								<i class="fa fa-briefcase"></i>
								Gerenciar Imobiliária
							</a>
						</li>
						<li class="treeview <?php echo ($viewData['menu_ativo'] == 'usuarios') ? 'active' : ''; ?>">
							<a href="#">
								<i class="fa fa-user-circle"></i>
								<span>Usuários</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="<?php echo BASE_URL; ?>usuarios/adicionar">
										<i class="fa fa-plus-circle"></i>
										Cadastrar
									</a>
								</li>
								<li>
									<a href="<?php echo BASE_URL; ?>usuarios">
										<i class="fa fa-list-ul"></i>
										Listar
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			<?php endif; ?>
		</ul>
	</section>
</aside>