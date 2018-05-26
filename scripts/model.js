/**
 * backbone model definitions for ECA
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Acao Backbone Model
 */
model.AcaoModel = Backbone.Model.extend({
	urlRoot: 'api/acao',
	idAttribute: 'idAction',
	idAction: '',
	strCodAction: '',
	strNameAction: '',
	defaults: {
		'idAction': null,
		'strCodAction': '',
		'strNameAction': ''
	}
});

/**
 * Acao Backbone Collection
 */
model.AcaoCollection = model.AbstractCollection.extend({
	url: 'api/acoes',
	model: model.AcaoModel
});

/**
 * Beneficiario Backbone Model
 */
model.BeneficiarioModel = Backbone.Model.extend({
	urlRoot: 'api/beneficiario',
	idAttribute: 'idBeneficiaries',
	idBeneficiaries: '',
	strNis: '',
	strNamePerson: '',
	defaults: {
		'idBeneficiaries': null,
		'strNis': '',
		'strNamePerson': ''
	}
});

/**
 * Beneficiario Backbone Collection
 */
model.BeneficiarioCollection = model.AbstractCollection.extend({
	url: 'api/beneficiarios',
	model: model.BeneficiarioModel
});

/**
 * Cidade Backbone Model
 */
model.CidadeModel = Backbone.Model.extend({
	urlRoot: 'api/cidade',
	idAttribute: 'idCity',
	idCity: '',
	strNameCity: '',
	strCodSiafiCity: '',
	tbStateIdState: '',
	defaults: {
		'idCity': null,
		'strNameCity': '',
		'strCodSiafiCity': '',
		'tbStateIdState': ''
	}
});

/**
 * Cidade Backbone Collection
 */
model.CidadeCollection = model.AbstractCollection.extend({
	url: 'api/cidades',
	model: model.CidadeModel
});

/**
 * Arquivo Backbone Model
 */
model.ArquivoModel = Backbone.Model.extend({
	urlRoot: 'api/arquivo',
	idAttribute: 'idFile',
	idFile: '',
	strNameFile: '',
	strMonth: '',
	strYear: '',
	defaults: {
		'idFile': null,
		'strNameFile': '',
		'strMonth': '',
		'strYear': ''
	}
});

/**
 * Arquivo Backbone Collection
 */
model.ArquivoCollection = model.AbstractCollection.extend({
	url: 'api/arquivos',
	model: model.ArquivoModel
});

/**
 * Funcao Backbone Model
 */
model.FuncaoModel = Backbone.Model.extend({
	urlRoot: 'api/funcao',
	idAttribute: 'idFunction',
	idFunction: '',
	strCodFunction: '',
	strNameFunction: '',
	defaults: {
		'idFunction': null,
		'strCodFunction': '',
		'strNameFunction': ''
	}
});

/**
 * Funcao Backbone Collection
 */
model.FuncaoCollection = model.AbstractCollection.extend({
	url: 'api/funcoes',
	model: model.FuncaoModel
});

/**
 * Pagamento Backbone Model
 */
model.PagamentoModel = Backbone.Model.extend({
	urlRoot: 'api/pagamento',
	idAttribute: 'idPayment',
	idPayment: '',
	tbCityIdCity: '',
	tbFunctionsIdFunction: '',
	tbSubfunctionsIdSubfunction: '',
	tbProgramIdProgram: '',
	tbActionIdAction: '',
	tbBeneficiariesIdBeneficiaries: '',
	tbSourceIdSource: '',
	tbFilesIdFile: '',
	dbValue: '',
	defaults: {
		'idPayment': null,
		'tbCityIdCity': '',
		'tbFunctionsIdFunction': '',
		'tbSubfunctionsIdSubfunction': '',
		'tbProgramIdProgram': '',
		'tbActionIdAction': '',
		'tbBeneficiariesIdBeneficiaries': '',
		'tbSourceIdSource': '',
		'tbFilesIdFile': '',
		'dbValue': ''
	}
});

/**
 * Pagamento Backbone Collection
 */
model.PagamentoCollection = model.AbstractCollection.extend({
	url: 'api/pagamentos',
	model: model.PagamentoModel
});

/**
 * Programa Backbone Model
 */
model.ProgramaModel = Backbone.Model.extend({
	urlRoot: 'api/programa',
	idAttribute: 'idProgram',
	idProgram: '',
	strCodProgram: '',
	strNameProgram: '',
	defaults: {
		'idProgram': null,
		'strCodProgram': '',
		'strNameProgram': ''
	}
});

/**
 * Programa Backbone Collection
 */
model.ProgramaCollection = model.AbstractCollection.extend({
	url: 'api/programas',
	model: model.ProgramaModel
});

/**
 * Regiao Backbone Model
 */
model.RegiaoModel = Backbone.Model.extend({
	urlRoot: 'api/regiao',
	idAttribute: 'idRegion',
	idRegion: '',
	strNameRegion: '',
	defaults: {
		'idRegion': null,
		'strNameRegion': ''
	}
});

/**
 * Regiao Backbone Collection
 */
model.RegiaoCollection = model.AbstractCollection.extend({
	url: 'api/regioes',
	model: model.RegiaoModel
});

/**
 * Fonte Backbone Model
 */
model.FonteModel = Backbone.Model.extend({
	urlRoot: 'api/fonte',
	idAttribute: 'idSource',
	idSource: '',
	strGoal: '',
	strOrigin: '',
	strPeriodicity: '',
	defaults: {
		'idSource': null,
		'strGoal': '',
		'strOrigin': '',
		'strPeriodicity': ''
	}
});

/**
 * Fonte Backbone Collection
 */
model.FonteCollection = model.AbstractCollection.extend({
	url: 'api/fontes',
	model: model.FonteModel
});

/**
 * Estado Backbone Model
 */
model.EstadoModel = Backbone.Model.extend({
	urlRoot: 'api/estado',
	idAttribute: 'idState',
	idState: '',
	strUf: '',
	strName: '',
	tbRegionIdRegion: '',
	defaults: {
		'idState': null,
		'strUf': '',
		'strName': '',
		'tbRegionIdRegion': ''
	}
});

/**
 * Estado Backbone Collection
 */
model.EstadoCollection = model.AbstractCollection.extend({
	url: 'api/estados',
	model: model.EstadoModel
});

/**
 * SubFuncao Backbone Model
 */
model.SubFuncaoModel = Backbone.Model.extend({
	urlRoot: 'api/subfuncao',
	idAttribute: 'idSubfunction',
	idSubfunction: '',
	strCodSubfunction: '',
	strNameSubfunction: '',
	defaults: {
		'idSubfunction': null,
		'strCodSubfunction': '',
		'strNameSubfunction': ''
	}
});

/**
 * SubFuncao Backbone Collection
 */
model.SubFuncaoCollection = model.AbstractCollection.extend({
	url: 'api/subfuncoes',
	model: model.SubFuncaoModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'iduser',
	iduser: '',
	usuario: '',
	senha: '',
	nome: '',
	email: '',
	resetar: '',
	perfil: '',
	defaults: {
		'iduser': null,
		'usuario': '',
		'senha': '',
		'nome': '',
		'email': '',
		'resetar': '',
		'perfil': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

