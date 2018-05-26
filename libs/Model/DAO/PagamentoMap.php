<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PagamentoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PagamentoDAO to the tb_payments datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package DbEca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["IdPayment"] = new FieldMap("IdPayment","tb_payments","id_payment",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["TbCityIdCity"] = new FieldMap("TbCityIdCity","tb_payments","tb_city_id_city",false,FM_TYPE_INT,11,null,false);
			self::$FM["TbFunctionsIdFunction"] = new FieldMap("TbFunctionsIdFunction","tb_payments","tb_functions_id_function",false,FM_TYPE_INT,11,null,false);
			self::$FM["TbSubfunctionsIdSubfunction"] = new FieldMap("TbSubfunctionsIdSubfunction","tb_payments","tb_subfunctions_id_subfunction",false,FM_TYPE_INT,11,null,false);
			self::$FM["TbProgramIdProgram"] = new FieldMap("TbProgramIdProgram","tb_payments","tb_program_id_program",false,FM_TYPE_INT,11,null,false);
			self::$FM["TbActionIdAction"] = new FieldMap("TbActionIdAction","tb_payments","tb_action_id_action",false,FM_TYPE_INT,11,null,false);
			self::$FM["TbBeneficiariesIdBeneficiaries"] = new FieldMap("TbBeneficiariesIdBeneficiaries","tb_payments","tb_beneficiaries_id_beneficiaries",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["TbSourceIdSource"] = new FieldMap("TbSourceIdSource","tb_payments","tb_source_id_source",false,FM_TYPE_INT,11,null,false);
			self::$FM["TbFilesIdFile"] = new FieldMap("TbFilesIdFile","tb_payments","tb_files_id_file",false,FM_TYPE_INT,11,null,false);
			self::$FM["DbValue"] = new FieldMap("DbValue","tb_payments","db_value",false,FM_TYPE_UNKNOWN,null,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["fk_tb_payments_tb_action1"] = new KeyMap("fk_tb_payments_tb_action1", "TbActionIdAction", "TbAction", "IdAction", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_beneficiaries"] = new KeyMap("fk_tb_payments_tb_beneficiaries", "TbBeneficiariesIdBeneficiaries", "TbBeneficiaries", "IdBeneficiaries", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_city1"] = new KeyMap("fk_tb_payments_tb_city1", "TbCityIdCity", "TbCity", "IdCity", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_files1"] = new KeyMap("fk_tb_payments_tb_files1", "TbFilesIdFile", "TbFiles", "IdFile", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_functions1"] = new KeyMap("fk_tb_payments_tb_functions1", "TbFunctionsIdFunction", "TbFunctions", "IdFunction", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_program1"] = new KeyMap("fk_tb_payments_tb_program1", "TbProgramIdProgram", "TbProgram", "IdProgram", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_source1"] = new KeyMap("fk_tb_payments_tb_source1", "TbSourceIdSource", "TbSource", "IdSource", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tb_payments_tb_subfunctions1"] = new KeyMap("fk_tb_payments_tb_subfunctions1", "TbSubfunctionsIdSubfunction", "TbSubfunctions", "IdSubfunction", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>