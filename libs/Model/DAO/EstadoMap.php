<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EstadoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EstadoDAO to the tb_state datastore.
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
class EstadoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdState"] = new FieldMap("IdState","tb_state","id_state",true,FM_TYPE_INT,11,null,true);
			self::$FM["StrUf"] = new FieldMap("StrUf","tb_state","str_uf",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["StrName"] = new FieldMap("StrName","tb_state","str_name",false,FM_TYPE_VARCHAR,19,null,false);
			self::$FM["TbRegionIdRegion"] = new FieldMap("TbRegionIdRegion","tb_state","tb_region_id_region",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_tb_city_tb_state"] = new KeyMap("fk_tb_city_tb_state", "IdState", "TbCity", "TbStateIdState", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_tb_state_tb_region1"] = new KeyMap("fk_tb_state_tb_region1", "TbRegionIdRegion", "TbRegion", "IdRegion", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>