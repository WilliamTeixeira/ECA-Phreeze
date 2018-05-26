<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ProgramaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ProgramaDAO to the tb_program datastore.
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
class ProgramaMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdProgram"] = new FieldMap("IdProgram","tb_program","id_program",true,FM_TYPE_INT,11,null,true);
			self::$FM["StrCodProgram"] = new FieldMap("StrCodProgram","tb_program","str_cod_program",false,FM_TYPE_VARCHAR,4,null,false);
			self::$FM["StrNameProgram"] = new FieldMap("StrNameProgram","tb_program","str_name_program",false,FM_TYPE_VARCHAR,255,null,false);
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
			self::$KM["fk_tb_payments_tb_program1"] = new KeyMap("fk_tb_payments_tb_program1", "IdProgram", "TbPayments", "TbProgramIdProgram", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>