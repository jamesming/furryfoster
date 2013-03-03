<?php

abstract class Models_Db extends Models_Generic {
	
	public static function factory($type, $data = array()) {
		$class = 'Models_Db_'.$type.'_Model';
		if ( ! class_exists($class)) throw new Exception("Class $class does not exist");
		return new $class($data);
	}
}