<?php

class Models_Db_Rescues_Model extends Database{
	
	
	public function __construct($pk, $tablename) {
	    
	    parent::__construct();
	    
	    $this->_pk = $pk;
	    $this->_tablename = $tablename;
	    
	    $this->load();
	
	}

}
