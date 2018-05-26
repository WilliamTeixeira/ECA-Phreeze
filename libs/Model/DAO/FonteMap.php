<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * FonteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the FonteDAO to the tb_source datastore.
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
class FonteMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdSource"] = new FieldMap("IdSource","tb_source","id_source",true,FM_TYPE_INT,11,null,true);
			self::$FM["StrGoal"] = new FieldMap("StrGoal","tb_source","str_goal",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["StrOrigin"] = new FieldMap("StrOrigin","tb_source","str_origin",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["StrPeriodicity"] = new FieldMap("StrPeriodicity","tb_source","str_periodicity",false,FM_TYPE_VARCHAR,9,null,false);
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
			self::$KM["fk_tb_payments_tb_source1"] = new KeyMap("fk_tb_payments_tb_source1", "IdSource", "TbPayments", "TbSourceIdSource", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>