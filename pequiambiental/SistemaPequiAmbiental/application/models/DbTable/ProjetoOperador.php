<?php

class Application_Model_DbTable_ProjetoOperador extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_PROJETO_OPERADOR';
	//protected $_primary = 'ID_PROJETO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	
    public function addProjetoOperador( $FK_PROJETO, $FK_OPERADOR)
    {
    	 
    	$data = array('FK_PROJETO' => $FK_PROJETO,'FK_OPERADOR' => $FK_OPERADOR);
    	$this->insert($data);
    }
     
  
    public function deleteProjetoOperador ( $FK_PROJETO, $FK_OPERADOR)
    {
       $this->delete('FK_PROJETO =' . (int) $FK_PROJETO. ' and FK_OPERADOR='.(int) $FK_OPERADOR);
       //echo 'FK_PROJETO =' . (int) $FK_PROJETO. ' and FK_OPERADOR='.(int) $FK_OPERADOR;
    }


}

