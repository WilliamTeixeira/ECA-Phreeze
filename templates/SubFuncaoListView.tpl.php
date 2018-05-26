<?php
	$this->assign('title','ECA | SubFuncoes');
	$this->assign('nav','subfuncoes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/subfuncoes.js").wait(function(){
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
	<i class="icon-th-list"></i> SubFuncoes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="subFuncaoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdSubfunction">Id Subfunction<% if (page.orderBy == 'IdSubfunction') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrCodSubfunction">Str Cod Subfunction<% if (page.orderBy == 'StrCodSubfunction') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrNameSubfunction">Str Name Subfunction<% if (page.orderBy == 'StrNameSubfunction') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idSubfunction')) %>">
				<td><%= _.escape(item.get('idSubfunction') || '') %></td>
				<td><%= _.escape(item.get('strCodSubfunction') || '') %></td>
				<td><%= _.escape(item.get('strNameSubfunction') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="subFuncaoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idSubfunctionInputContainer" class="control-group">
					<label class="control-label" for="idSubfunction">Id Subfunction</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idSubfunction"><%= _.escape(item.get('idSubfunction') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strCodSubfunctionInputContainer" class="control-group">
					<label class="control-label" for="strCodSubfunction">Str Cod Subfunction</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strCodSubfunction" placeholder="Str Cod Subfunction" value="<%= _.escape(item.get('strCodSubfunction') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strNameSubfunctionInputContainer" class="control-group">
					<label class="control-label" for="strNameSubfunction">Str Name Subfunction</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strNameSubfunction" placeholder="Str Name Subfunction" value="<%= _.escape(item.get('strNameSubfunction') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteSubFuncaoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteSubFuncaoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete SubFuncao</button>
						<span id="confirmDeleteSubFuncaoContainer" class="hide">
							<button id="cancelDeleteSubFuncaoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteSubFuncaoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="subFuncaoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit SubFuncao
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="subFuncaoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveSubFuncaoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="subFuncaoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newSubFuncaoButton" class="btn btn-primary">Add SubFuncao</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
