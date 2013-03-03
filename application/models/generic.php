<?php

abstract class Models_Generic {
	

	public function __construct($input = array()) {

	}
	
	public function values($values) {
		foreach ($values as $k => $v) {
			$this->{$k} = $v;
		}
		
		return $this;
	}
	

}