<?php
/** @package    DbEca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UsuarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UsuarioDAO to the tb_user datastore.
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
class UsuarioMap implements IDaoMap, IDaoMap2
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
			self::$FM["Iduser"] = new FieldMap("Iduser","tb_user","iduser",true,FM_TYPE_INT,11,null,true);
			self::$FM["Usuario"] = new FieldMap("Usuario","tb_user","usuario",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Senha"] = new FieldMap("Senha","tb_user","senha",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","tb_user","nome",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Email"] = new FieldMap("Email","tb_user","email",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Resetar"] = new FieldMap("Resetar","tb_user","resetar",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Perfil"] = new FieldMap("Perfil","tb_user","perfil",false,FM_TYPE_TINYINT,4,null,false);
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
		}
		return self::$KM;
	}

}

?>