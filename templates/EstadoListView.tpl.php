<?php
	$this->assign('title','ECA | Estados');
	$this->assign('nav','estados');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/estados.js").wait(function(){
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
	<i class="icon-th-list"></i> Estados
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="estadoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdState">Id State<% if (page.orderBy == 'IdState') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrUf">Str Uf<% if (page.orderBy == 'StrUf') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StrName">Str Name<% if (page.orderBy == 'StrName') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TbRegionIdRegion">Tb Region Id Region<% if (page.orderBy == 'TbRegionIdRegion') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idState')) %>">
				<td><%= _.escape(item.get('idState') || '') %></td>
				<td><%= _.escape(item.get('strUf') || '') %></td>
				<td><%= _.escape(item.get('strName') || '') %></td>
				<td><%= _.escape(item.get('tbRegionIdRegion') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="estadoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idStateInputContainer" class="control-group">
					<label class="control-label" for="idState">Id State</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idState"><%= _.escape(item.get('idState') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strUfInputContainer" class="control-group">
					<label class="control-label" for="strUf">Str Uf</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strUf" placeholder="Str Uf" value="<%= _.escape(item.get('strUf') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="strNameInputContainer" class="control-group">
					<label class="control-label" for="strName">Str Name</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="strName" placeholder="Str Name" value="<%= _.escape(item.get('strName') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tbRegionIdRegionInputContainer" class="control-group">
					<label class="control-label" for="tbRegionIdRegion">Tb Region Id Region</label>
					<div class="controls inline-inputs">
						<select id="tbRegionIdRegion" name="tbRegionIdRegion"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEstadoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEstadoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Estado</button>
						<span id="confirmDeleteEstadoContainer" class="hide">
							<button id="cancelDeleteEstadoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteEstadoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="estadoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Estado
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="estadoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEstadoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="estadoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEstadoButton" class="btn btn-primary">Add Estado</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
