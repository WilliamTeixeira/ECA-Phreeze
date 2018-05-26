<?php
	$this->assign('title','ECA | Arquivos');
	$this->assign('nav','arquivos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/arquivos.js").wait(function(){
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
	<i class="icon-th-list"></i> Arquivos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="arquivoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdFile">Id File<% if (page.orderBy == 'IdFile') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrNameFile">Str Name File<% if (page.orderBy == 'StrNameFile') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrMonth">Str Month<% if (page.orderBy == 'StrMonth') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrYear">Str Year<% if (page.orderBy == 'StrYear') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idFile')) %>">
				<td><%= _.escape(item.get('idFile') || '') %></td>
				<td><%= _.escape(item.get('strNameFile') || '') %></td>
				<td><%= _.escape(item.get('strMonth') || '') %></td>
				<td><%= _.escape(item.get('strYear') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="arquivoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idFileInputContainer" class="control-group">
					<label class="control-label" for="idFile">Id File</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idFile"><%= _.escape(item.get('idFile') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strNameFileInputContainer" class="control-group">
					<label class="control-label" for="strNameFile">Str Name File</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strNameFile" placeholder="Str Name File" value="<%= _.escape(item.get('strNameFile') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strMonthInputContainer" class="control-group">
					<label class="control-label" for="strMonth">Str Month</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strMonth" placeholder="Str Month" value="<%= _.escape(item.get('strMonth') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strYearInputContainer" class="control-group">
					<label class="control-label" for="strYear">Str Year</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strYear" placeholder="Str Year" value="<%= _.escape(item.get('strYear') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteArquivoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteArquivoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Arquivo</button>
						<span id="confirmDeleteArquivoContainer" class="hide">
							<button id="cancelDeleteArquivoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteArquivoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="arquivoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Arquivo
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="arquivoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveArquivoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="arquivoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newArquivoButton" class="btn btn-primary">Add Arquivo</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
