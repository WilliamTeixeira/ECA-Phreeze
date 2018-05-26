<?php
/** @package    DbEca::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Pagamento object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package DbEca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `tb_payments` table
	public $CustomFieldExample;

	public $IdPayment;
	public $TbCityIdCity;
	public $TbFunctionsIdFunction;
	public $TbSubfunctionsIdSubfunction;
	public $TbProgramIdProgram;
	public $TbActionIdAction;
	public $TbBeneficiariesIdBeneficiaries;
	public $TbSourceIdSource;
	public $TbFilesIdFile;
	public $DbValue;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`tb_payments`.`id_payment` as IdPayment
			,`tb_payments`.`tb_city_id_city` as TbCityIdCity
			,`tb_payments`.`tb_functions_id_function` as TbFunctionsIdFunction
			,`tb_payments`.`tb_subfunctions_id_subfunction` as TbSubfunctionsIdSubfunction
			,`tb_payments`.`tb_program_id_program` as TbProgramIdProgram
			,`tb_payments`.`tb_action_id_action` as TbActionIdAction
			,`tb_payments`.`tb_beneficiaries_id_beneficiaries` as TbBeneficiariesIdBeneficiaries
			,`tb_payments`.`tb_source_id_source` as TbSourceIdSource
			,`tb_payments`.`tb_files_id_file` as TbFilesIdFile
			,`tb_payments`.`db_value` as DbValue
		from `tb_payments`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `tb_payments`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>