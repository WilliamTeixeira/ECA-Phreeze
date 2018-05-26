<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ArquivoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ArquivoDAO to the tb_files datastore.
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
class ArquivoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdFile"] = new FieldMap("IdFile","tb_files","id_file",true,FM_TYPE_INT,11,null,true);
			self::$FM["StrNameFile"] = new FieldMap("StrNameFile","tb_files","str_name_file",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["StrMonth"] = new FieldMap("StrMonth","tb_files","str_month",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["StrYear"] = new FieldMap("StrYear","tb_files","str_year",false,FM_TYPE_VARCHAR,4,null,false);
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
			self::$KM["fk_tb_payments_tb_files1"] = new KeyMap("fk_tb_payments_tb_files1", "IdFile", "TbPayments", "TbFilesIdFile", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>