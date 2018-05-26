<?php
	$this->assign('title','ECA | Pagamentos');
	$this->assign('nav','pagamentos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/pagamentos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Pagamentos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="pagamentoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdPayment">Id Payment<% if (page.orderBy == 'IdPayment') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbCityIdCity">Tb City Id City<% if (page.orderBy == 'TbCityIdCity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbFunctionsIdFunction">Tb Functions Id Function<% if (page.orderBy == 'TbFunctionsIdFunction') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbSubfunctionsIdSubfunction">Tb Subfunctions Id Subfunction<% if (page.orderBy == 'TbSubfunctionsIdSubfunction') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbProgramIdProgram">Tb Program Id Program<% if (page.orderBy == 'TbProgramIdProgram') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_TbActionIdAction">Tb Action Id Action<% if (page.orderBy == 'TbActionIdAction') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbBeneficiariesIdBeneficiaries">Tb Beneficiaries Id Beneficiaries<% if (page.orderBy == 'TbBeneficiariesIdBeneficiaries') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbSourceIdSource">Tb Source Id Source<% if (page.orderBy == 'TbSourceIdSource') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbFilesIdFile">Tb Files Id File<% if (page.orderBy == 'TbFilesIdFile') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DbValue">Db Value<% if (page.orderBy == 'DbValue') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idPayment')) %>">
				<td><%= _.escape(item.get('idPayment') || '') %></td>
				<td><%= _.escape(item.get('tbCityIdCity') || '') %></td>
				<td><%= _.escape(item.get('tbFunctionsIdFunction') || '') %></td>
				<td><%= _.escape(item.get('tbSubfunctionsIdSubfunction') || '') %></td>
				<td><%= _.escape(item.get('tbProgramIdProgram') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('tbActionIdAction') || '') %></td>
				<td><%= _.escape(item.get('tbBeneficiariesIdBeneficiaries') || '') %></td>
				<td><%= _.escape(item.get('tbSourceIdSource') || '') %></td>
				<td><%= _.escape(item.get('tbFilesIdFile') || '') %></td>
				<td><%= _.escape(item.get('dbValue') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="pagamentoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idPaymentInputContainer" class="control-group">
					<label class="control-label" for="idPayment">Id Payment</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idPayment"><%= _.escape(item.get('idPayment') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbCityIdCityInputContainer" class="control-group">
					<label class="control-label" for="tbCityIdCity">Tb City Id City</label>
					<div class="controls inline-inputs">
						<select id="tbCityIdCity" name="tbCityIdCity"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbFunctionsIdFunctionInputContainer" class="control-group">
					<label class="control-label" for="tbFunctionsIdFunction">Tb Functions Id Function</label>
					<div class="controls inline-inputs">
						<select id="tbFunctionsIdFunction" name="tbFunctionsIdFunction"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbSubfunctionsIdSubfunctionInputContainer" class="control-group">
					<label class="control-label" for="tbSubfunctionsIdSubfunction">Tb Subfunctions Id Subfunction</label>
					<div class="controls inline-inputs">
						<select id="tbSubfunctionsIdSubfunction" name="tbSubfunctionsIdSubfunction"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbProgramIdProgramInputContainer" class="control-group">
					<label class="control-label" for="tbProgramIdProgram">Tb Program Id Program</label>
					<div class="controls inline-inputs">
						<select id="tbProgramIdProgram" name="tbProgramIdProgram"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbActionIdActionInputContainer" class="control-group">
					<label class="control-label" for="tbActionIdAction">Tb Action Id Action</label>
					<div class="controls inline-inputs">
						<select id="tbActionIdAction" name="tbActionIdAction"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbBeneficiariesIdBeneficiariesInputContainer" class="control-group">
					<label class="control-label" for="tbBeneficiariesIdBeneficiaries">Tb Beneficiaries Id Beneficiaries</label>
					<div class="controls inline-inputs">
						<select id="tbBeneficiariesIdBeneficiaries" name="tbBeneficiariesIdBeneficiaries"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbSourceIdSourceInputContainer" class="control-group">
					<label class="control-label" for="tbSourceIdSource">Tb Source Id Source</label>
					<div class="controls inline-inputs">
						<select id="tbSourceIdSource" name="tbSourceIdSource"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbFilesIdFileInputContainer" class="control-group">
					<label class="control-label" for="tbFilesIdFile">Tb Files Id File</label>
					<div class="controls inline-inputs">
						<select id="tbFilesIdFile" name="tbFilesIdFile"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dbValueInputContainer" class="control-group">
					<label class="control-label" for="dbValue">Db Value</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="dbValue" placeholder="Db Value" value="<%= _.escape(item.get('dbValue') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePagamentoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePagamentoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Pagamento</button>
						<span id="confirmDeletePagamentoContainer" class="hide">
							<button id="cancelDeletePagamentoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePagamentoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="pagamentoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Pagamento
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="pagamentoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePagamentoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="pagamentoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPagamentoButton" class="btn btn-primary">Add Pagamento</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
