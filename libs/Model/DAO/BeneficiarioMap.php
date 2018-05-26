<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * BeneficiarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the BeneficiarioDAO to the tb_beneficiaries datastore.
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
class BeneficiarioMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdBeneficiaries"] = new FieldMap("IdBeneficiaries","tb_beneficiaries","id_beneficiaries",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["StrNis"] = new FieldMap("StrNis","tb_beneficiaries","str_nis",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["StrNamePerson"] = new FieldMap("StrNamePerson","tb_beneficiaries","str_name_person",false,FM_TYPE_VARCHAR,255,null,false);
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
			self::$KM["fk_tb_payments_tb_beneficiaries"] = new KeyMap("fk_tb_payments_tb_beneficiaries", "IdBeneficiaries", "TbPayments", "TbBeneficiariesIdBeneficiaries", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>