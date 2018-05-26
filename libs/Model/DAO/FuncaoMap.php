<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * FuncaoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the FuncaoDAO to the tb_functions datastore.
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
class FuncaoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdFunction"] = new FieldMap("IdFunction","tb_functions","id_function",true,FM_TYPE_INT,11,null,true);
			self::$FM["StrCodFunction"] = new FieldMap("StrCodFunction","tb_functions","str_cod_function",false,FM_TYPE_VARCHAR,4,null,false);
			self::$FM["StrNameFunction"] = new FieldMap("StrNameFunction","tb_functions","str_name_function",false,FM_TYPE_VARCHAR,255,null,false);
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
			self::$KM["fk_tb_payments_tb_functions1"] = new KeyMap("fk_tb_payments_tb_functions1", "IdFunction", "TbPayments", "TbFunctionsIdFunction", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>