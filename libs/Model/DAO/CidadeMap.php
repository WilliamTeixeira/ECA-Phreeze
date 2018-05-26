<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CidadeMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CidadeDAO to the tb_city datastore.
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
class CidadeMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdCity"] = new FieldMap("IdCity","tb_city","id_city",true,FM_TYPE_INT,11,null,true);
			self::$FM["StrNameCity"] = new FieldMap("StrNameCity","tb_city","str_name_city",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["StrCodSiafiCity"] = new FieldMap("StrCodSiafiCity","tb_city","str_cod_siafi_city",false,FM_TYPE_VARCHAR,4,null,false);
			self::$FM["TbStateIdState"] = new FieldMap("TbStateIdState","tb_city","tb_state_id_state",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_tb_payments_tb_city1"] = new KeyMap("fk_tb_payments_tb_city1", "IdCity", "TbPayments", "TbCityIdCity", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_tb_city_tb_state"] = new KeyMap("fk_tb_city_tb_state", "TbStateIdState", "TbState", "IdState", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>