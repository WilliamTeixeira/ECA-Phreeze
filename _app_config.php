<?php
/**
 * @package ECA
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		'phar://' . GlobalConfig::$APP_ROOT . '/libs/phreeze-3.3.8.phar' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Acao
	'GET:acoes' => array('route' => 'Acao.ListView'),
	'GET:acao/(:num)' => array('route' => 'Acao.SingleView', 'params' => array('idAction' => 1)),
	'GET:api/acoes' => array('route' => 'Acao.Query'),
	'POST:api/acao' => array('route' => 'Acao.Create'),
	'GET:api/acao/(:num)' => array('route' => 'Acao.Read', 'params' => array('idAction' => 2)),
	'PUT:api/acao/(:num)' => array('route' => 'Acao.Update', 'params' => array('idAction' => 2)),
	'DELETE:api/acao/(:num)' => array('route' => 'Acao.Delete', 'params' => array('idAction' => 2)),
		
	// Beneficiario
	'GET:beneficiarios' => array('route' => 'Beneficiario.ListView'),
	'GET:beneficiario/(:num)' => array('route' => 'Beneficiario.SingleView', 'params' => array('idBeneficiaries' => 1)),
	'GET:api/beneficiarios' => array('route' => 'Beneficiario.Query'),
	'POST:api/beneficiario' => array('route' => 'Beneficiario.Create'),
	'GET:api/beneficiario/(:num)' => array('route' => 'Beneficiario.Read', 'params' => array('idBeneficiaries' => 2)),
	'PUT:api/beneficiario/(:num)' => array('route' => 'Beneficiario.Update', 'params' => array('idBeneficiaries' => 2)),
	'DELETE:api/beneficiario/(:num)' => array('route' => 'Beneficiario.Delete', 'params' => array('idBeneficiaries' => 2)),
		
	// Cidade
	'GET:cidades' => array('route' => 'Cidade.ListView'),
	'GET:cidade/(:num)' => array('route' => 'Cidade.SingleView', 'params' => array('idCity' => 1)),
	'GET:api/cidades' => array('route' => 'Cidade.Query'),
	'POST:api/cidade' => array('route' => 'Cidade.Create'),
	'GET:api/cidade/(:num)' => array('route' => 'Cidade.Read', 'params' => array('idCity' => 2)),
	'PUT:api/cidade/(:num)' => array('route' => 'Cidade.Update', 'params' => array('idCity' => 2)),
	'DELETE:api/cidade/(:num)' => array('route' => 'Cidade.Delete', 'params' => array('idCity' => 2)),
		
	// Arquivo
	'GET:arquivos' => array('route' => 'Arquivo.ListView'),
	'GET:arquivo/(:num)' => array('route' => 'Arquivo.SingleView', 'params' => array('idFile' => 1)),
	'GET:api/arquivos' => array('route' => 'Arquivo.Query'),
	'POST:api/arquivo' => array('route' => 'Arquivo.Create'),
	'GET:api/arquivo/(:num)' => array('route' => 'Arquivo.Read', 'params' => array('idFile' => 2)),
	'PUT:api/arquivo/(:num)' => array('route' => 'Arquivo.Update', 'params' => array('idFile' => 2)),
	'DELETE:api/arquivo/(:num)' => array('route' => 'Arquivo.Delete', 'params' => array('idFile' => 2)),
		
	// Funcao
	'GET:funcoes' => array('route' => 'Funcao.ListView'),
	'GET:funcao/(:num)' => array('route' => 'Funcao.SingleView', 'params' => array('idFunction' => 1)),
	'GET:api/funcoes' => array('route' => 'Funcao.Query'),
	'POST:api/funcao' => array('route' => 'Funcao.Create'),
	'GET:api/funcao/(:num)' => array('route' => 'Funcao.Read', 'params' => array('idFunction' => 2)),
	'PUT:api/funcao/(:num)' => array('route' => 'Funcao.Update', 'params' => array('idFunction' => 2)),
	'DELETE:api/funcao/(:num)' => array('route' => 'Funcao.Delete', 'params' => array('idFunction' => 2)),
		
	// Pagamento
	'GET:pagamentos' => array('route' => 'Pagamento.ListView'),
	'GET:pagamento/(:num)' => array('route' => 'Pagamento.SingleView', 'params' => array('idPayment' => 1)),
	'GET:api/pagamentos' => array('route' => 'Pagamento.Query'),
	'POST:api/pagamento' => array('route' => 'Pagamento.Create'),
	'GET:api/pagamento/(:num)' => array('route' => 'Pagamento.Read', 'params' => array('idPayment' => 2)),
	'PUT:api/pagamento/(:num)' => array('route' => 'Pagamento.Update', 'params' => array('idPayment' => 2)),
	'DELETE:api/pagamento/(:num)' => array('route' => 'Pagamento.Delete', 'params' => array('idPayment' => 2)),
		
	// Programa
	'GET:programas' => array('route' => 'Programa.ListView'),
	'GET:programa/(:num)' => array('route' => 'Programa.SingleView', 'params' => array('idProgram' => 1)),
	'GET:api/programas' => array('route' => 'Programa.Query'),
	'POST:api/programa' => array('route' => 'Programa.Create'),
	'GET:api/programa/(:num)' => array('route' => 'Programa.Read', 'params' => array('idProgram' => 2)),
	'PUT:api/programa/(:num)' => array('route' => 'Programa.Update', 'params' => array('idProgram' => 2)),
	'DELETE:api/programa/(:num)' => array('route' => 'Programa.Delete', 'params' => array('idProgram' => 2)),
		
	// Regiao
	'GET:regioes' => array('route' => 'Regiao.ListView'),
	'GET:regiao/(:num)' => array('route' => 'Regiao.SingleView', 'params' => array('idRegion' => 1)),
	'GET:api/regioes' => array('route' => 'Regiao.Query'),
	'POST:api/regiao' => array('route' => 'Regiao.Create'),
	'GET:api/regiao/(:num)' => array('route' => 'Regiao.Read', 'params' => array('idRegion' => 2)),
	'PUT:api/regiao/(:num)' => array('route' => 'Regiao.Update', 'params' => array('idRegion' => 2)),
	'DELETE:api/regiao/(:num)' => array('route' => 'Regiao.Delete', 'params' => array('idRegion' => 2)),
		
	// Fonte
	'GET:fontes' => array('route' => 'Fonte.ListView'),
	'GET:fonte/(:num)' => array('route' => 'Fonte.SingleView', 'params' => array('idSource' => 1)),
	'GET:api/fontes' => array('route' => 'Fonte.Query'),
	'POST:api/fonte' => array('route' => 'Fonte.Create'),
	'GET:api/fonte/(:num)' => array('route' => 'Fonte.Read', 'params' => array('idSource' => 2)),
	'PUT:api/fonte/(:num)' => array('route' => 'Fonte.Update', 'params' => array('idSource' => 2)),
	'DELETE:api/fonte/(:num)' => array('route' => 'Fonte.Delete', 'params' => array('idSource' => 2)),
		
	// Estado
	'GET:estados' => array('route' => 'Estado.ListView'),
	'GET:estado/(:num)' => array('route' => 'Estado.SingleView', 'params' => array('idState' => 1)),
	'GET:api/estados' => array('route' => 'Estado.Query'),
	'POST:api/estado' => array('route' => 'Estado.Create'),
	'GET:api/estado/(:num)' => array('route' => 'Estado.Read', 'params' => array('idState' => 2)),
	'PUT:api/estado/(:num)' => array('route' => 'Estado.Update', 'params' => array('idState' => 2)),
	'DELETE:api/estado/(:num)' => array('route' => 'Estado.Delete', 'params' => array('idState' => 2)),
		
	// SubFuncao
	'GET:subfuncoes' => array('route' => 'SubFuncao.ListView'),
	'GET:subfuncao/(:num)' => array('route' => 'SubFuncao.SingleView', 'params' => array('idSubfunction' => 1)),
	'GET:api/subfuncoes' => array('route' => 'SubFuncao.Query'),
	'POST:api/subfuncao' => array('route' => 'SubFuncao.Create'),
	'GET:api/subfuncao/(:num)' => array('route' => 'SubFuncao.Read', 'params' => array('idSubfunction' => 2)),
	'PUT:api/subfuncao/(:num)' => array('route' => 'SubFuncao.Update', 'params' => array('idSubfunction' => 2)),
	'DELETE:api/subfuncao/(:num)' => array('route' => 'SubFuncao.Delete', 'params' => array('idSubfunction' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:num)' => array('route' => 'Usuario.SingleView', 'params' => array('iduser' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:num)' => array('route' => 'Usuario.Read', 'params' => array('iduser' => 2)),
	'PUT:api/usuario/(:num)' => array('route' => 'Usuario.Update', 'params' => array('iduser' => 2)),
	'DELETE:api/usuario/(:num)' => array('route' => 'Usuario.Delete', 'params' => array('iduser' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbCity","fk_tb_city_tb_state",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_action1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_beneficiaries",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_city1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_files1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_functions1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_program1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_source1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbPayments","fk_tb_payments_tb_subfunctions1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("TbState","fk_tb_state_tb_region1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>