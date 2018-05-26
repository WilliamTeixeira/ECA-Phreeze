<?php
	$this->assign('title','ECA | Cidades');
	$this->assign('nav','cidades');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/cidades.js").wait(function(){
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
	<i class="icon-th-list"></i> Cidades
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="cidadeCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdCity">Id City<% if (page.orderBy == 'IdCity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrNameCity">Str Name City<% if (page.orderBy == 'StrNameCity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrCodSiafiCity">Str Cod Siafi City<% if (page.orderBy == 'StrCodSiafiCity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbStateIdState">Tb State Id State<% if (page.orderBy == 'TbStateIdState') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idCity')) %>">
				<td><%= _.escape(item.get('idCity') || '') %></td>
				<td><%= _.escape(item.get('strNameCity') || '') %></td>
				<td><%= _.escape(item.get('strCodSiafiCity') || '') %></td>
				<td><%= _.escape(item.get('tbStateIdState') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="cidadeModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idCityInputContainer" class="control-group">
					<label class="control-label" for="idCity">Id City</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idCity"><%= _.escape(item.get('idCity') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strNameCityInputContainer" class="control-group">
					<label class="control-label" for="strNameCity">Str Name City</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strNameCity" placeholder="Str Name City" value="<%= _.escape(item.get('strNameCity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strCodSiafiCityInputContainer" class="control-group">
					<label class="control-label" for="strCodSiafiCity">Str Cod Siafi City</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strCodSiafiCity" placeholder="Str Cod Siafi City" value="<%= _.escape(item.get('strCodSiafiCity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbStateIdStateInputContainer" class="control-group">
					<label class="control-label" for="tbStateIdState">Tb State Id State</label>
					<div class="controls inline-inputs">
						<select id="tbStateIdState" name="tbStateIdState"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCidadeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCidadeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Cidade</button>
						<span id="confirmDeleteCidadeContainer" class="hide">
							<button id="cancelDeleteCidadeButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCidadeButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="cidadeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Cidade
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="cidadeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCidadeButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="cidadeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCidadeButton" class="btn btn-primary">Add Cidade</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
