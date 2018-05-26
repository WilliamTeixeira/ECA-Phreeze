<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * PagamentoCriteria allows custom querying for the Pagamento object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package DbEca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoCriteriaDAO extends Criteria
{

	public $IdPayment_Equals;
	public $IdPayment_NotEquals;
	public $IdPayment_IsLike;
	public $IdPayment_IsNotLike;
	public $IdPayment_BeginsWith;
	public $IdPayment_EndsWith;
	public $IdPayment_GreaterThan;
	public $IdPayment_GreaterThanOrEqual;
	public $IdPayment_LessThan;
	public $IdPayment_LessThanOrEqual;
	public $IdPayment_In;
	public $IdPayment_IsNotEmpty;
	public $IdPayment_IsEmpty;
	public $IdPayment_BitwiseOr;
	public $IdPayment_BitwiseAnd;
	public $TbCityIdCity_Equals;
	public $TbCityIdCity_NotEquals;
	public $TbCityIdCity_IsLike;
	public $TbCityIdCity_IsNotLike;
	public $TbCityIdCity_BeginsWith;
	public $TbCityIdCity_EndsWith;
	public $TbCityIdCity_GreaterThan;
	public $TbCityIdCity_GreaterThanOrEqual;
	public $TbCityIdCity_LessThan;
	public $TbCityIdCity_LessThanOrEqual;
	public $TbCityIdCity_In;
	public $TbCityIdCity_IsNotEmpty;
	public $TbCityIdCity_IsEmpty;
	public $TbCityIdCity_BitwiseOr;
	public $TbCityIdCity_BitwiseAnd;
	public $TbFunctionsIdFunction_Equals;
	public $TbFunctionsIdFunction_NotEquals;
	public $TbFunctionsIdFunction_IsLike;
	public $TbFunctionsIdFunction_IsNotLike;
	public $TbFunctionsIdFunction_BeginsWith;
	public $TbFunctionsIdFunction_EndsWith;
	public $TbFunctionsIdFunction_GreaterThan;
	public $TbFunctionsIdFunction_GreaterThanOrEqual;
	public $TbFunctionsIdFunction_LessThan;
	public $TbFunctionsIdFunction_LessThanOrEqual;
	public $TbFunctionsIdFunction_In;
	public $TbFunctionsIdFunction_IsNotEmpty;
	public $TbFunctionsIdFunction_IsEmpty;
	public $TbFunctionsIdFunction_BitwiseOr;
	public $TbFunctionsIdFunction_BitwiseAnd;
	public $TbSubfunctionsIdSubfunction_Equals;
	public $TbSubfunctionsIdSubfunction_NotEquals;
	public $TbSubfunctionsIdSubfunction_IsLike;
	public $TbSubfunctionsIdSubfunction_IsNotLike;
	public $TbSubfunctionsIdSubfunction_BeginsWith;
	public $TbSubfunctionsIdSubfunction_EndsWith;
	public $TbSubfunctionsIdSubfunction_GreaterThan;
	public $TbSubfunctionsIdSubfunction_GreaterThanOrEqual;
	public $TbSubfunctionsIdSubfunction_LessThan;
	public $TbSubfunctionsIdSubfunction_LessThanOrEqual;
	public $TbSubfunctionsIdSubfunction_In;
	public $TbSubfunctionsIdSubfunction_IsNotEmpty;
	public $TbSubfunctionsIdSubfunction_IsEmpty;
	public $TbSubfunctionsIdSubfunction_BitwiseOr;
	public $TbSubfunctionsIdSubfunction_BitwiseAnd;
	public $TbProgramIdProgram_Equals;
	public $TbProgramIdProgram_NotEquals;
	public $TbProgramIdProgram_IsLike;
	public $TbProgramIdProgram_IsNotLike;
	public $TbProgramIdProgram_BeginsWith;
	public $TbProgramIdProgram_EndsWith;
	public $TbProgramIdProgram_GreaterThan;
	public $TbProgramIdProgram_GreaterThanOrEqual;
	public $TbProgramIdProgram_LessThan;
	public $TbProgramIdProgram_LessThanOrEqual;
	public $TbProgramIdProgram_In;
	public $TbProgramIdProgram_IsNotEmpty;
	public $TbProgramIdProgram_IsEmpty;
	public $TbProgramIdProgram_BitwiseOr;
	public $TbProgramIdProgram_BitwiseAnd;
	public $TbActionIdAction_Equals;
	public $TbActionIdAction_NotEquals;
	public $TbActionIdAction_IsLike;
	public $TbActionIdAction_IsNotLike;
	public $TbActionIdAction_BeginsWith;
	public $TbActionIdAction_EndsWith;
	public $TbActionIdAction_GreaterThan;
	public $TbActionIdAction_GreaterThanOrEqual;
	public $TbActionIdAction_LessThan;
	public $TbActionIdAction_LessThanOrEqual;
	public $TbActionIdAction_In;
	public $TbActionIdAction_IsNotEmpty;
	public $TbActionIdAction_IsEmpty;
	public $TbActionIdAction_BitwiseOr;
	public $TbActionIdAction_BitwiseAnd;
	public $TbBeneficiariesIdBeneficiaries_Equals;
	public $TbBeneficiariesIdBeneficiaries_NotEquals;
	public $TbBeneficiariesIdBeneficiaries_IsLike;
	public $TbBeneficiariesIdBeneficiaries_IsNotLike;
	public $TbBeneficiariesIdBeneficiaries_BeginsWith;
	public $TbBeneficiariesIdBeneficiaries_EndsWith;
	public $TbBeneficiariesIdBeneficiaries_GreaterThan;
	public $TbBeneficiariesIdBeneficiaries_GreaterThanOrEqual;
	public $TbBeneficiariesIdBeneficiaries_LessThan;
	public $TbBeneficiariesIdBeneficiaries_LessThanOrEqual;
	public $TbBeneficiariesIdBeneficiaries_In;
	public $TbBeneficiariesIdBeneficiaries_IsNotEmpty;
	public $TbBeneficiariesIdBeneficiaries_IsEmpty;
	public $TbBeneficiariesIdBeneficiaries_BitwiseOr;
	public $TbBeneficiariesIdBeneficiaries_BitwiseAnd;
	public $TbSourceIdSource_Equals;
	public $TbSourceIdSource_NotEquals;
	public $TbSourceIdSource_IsLike;
	public $TbSourceIdSource_IsNotLike;
	public $TbSourceIdSource_BeginsWith;
	public $TbSourceIdSource_EndsWith;
	public $TbSourceIdSource_GreaterThan;
	public $TbSourceIdSource_GreaterThanOrEqual;
	public $TbSourceIdSource_LessThan;
	public $TbSourceIdSource_LessThanOrEqual;
	public $TbSourceIdSource_In;
	public $TbSourceIdSource_IsNotEmpty;
	public $TbSourceIdSource_IsEmpty;
	public $TbSourceIdSource_BitwiseOr;
	public $TbSourceIdSource_BitwiseAnd;
	public $TbFilesIdFile_Equals;
	public $TbFilesIdFile_NotEquals;
	public $TbFilesIdFile_IsLike;
	public $TbFilesIdFile_IsNotLike;
	public $TbFilesIdFile_BeginsWith;
	public $TbFilesIdFile_EndsWith;
	public $TbFilesIdFile_GreaterThan;
	public $TbFilesIdFile_GreaterThanOrEqual;
	public $TbFilesIdFile_LessThan;
	public $TbFilesIdFile_LessThanOrEqual;
	public $TbFilesIdFile_In;
	public $TbFilesIdFile_IsNotEmpty;
	public $TbFilesIdFile_IsEmpty;
	public $TbFilesIdFile_BitwiseOr;
	public $TbFilesIdFile_BitwiseAnd;
	public $DbValue_Equals;
	public $DbValue_NotEquals;
	public $DbValue_IsLike;
	public $DbValue_IsNotLike;
	public $DbValue_BeginsWith;
	public $DbValue_EndsWith;
	public $DbValue_GreaterThan;
	public $DbValue_GreaterThanOrEqual;
	public $DbValue_LessThan;
	public $DbValue_LessThanOrEqual;
	public $DbValue_In;
	public $DbValue_IsNotEmpty;
	public $DbValue_IsEmpty;
	public $DbValue_BitwiseOr;
	public $DbValue_BitwiseAnd;

}

?>