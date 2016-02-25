<?php

class Application_Model_DbTable_StatusProjeto extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_STATUS_PROJETO';
	protected $_primary = 'ID_STATUS_PROJETO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getStatusProjetos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_STATUS_PROJETO'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getStatusProjetoCombo ()
    {
       $listaStatusProjeto = new Application_Model_DbTable_StatusProjeto();
       return $listaStatusProjeto->getAdapter()->fetchPairs( $listaStatusProjeto->select()->from( 'TB_STATUS_PROJETO', array('ID_STATUS_PROJETO', 'NM_STATUS_PROJETO') )->order('NM_STATUS_PROJETO'));
    }
	public function getStatusProjeto($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_STATUS_PROJETO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getStatusProjetos()
    {
       $ramoAtividade = new Application_Model_DbTable_StatusProjeto();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_STATUS_PROJETO', 'nome') )->where('ID_STATUS_PROJETO <>1')->order('nome'));
    }*/
   
    public function addStatusProjeto($NM_STATUS_PROJETO)
    {
    	
        $data = array('NM_STATUS_PROJETO' => $NM_STATUS_PROJETO);
        $this->insert($data);
    }
     
    public function updateStatusProjeto ($ID_STATUS_PROJETO,$NM_STATUS_PROJETO)
    {
    	$data = array('ID_STATUS_PROJETO'=>$ID_STATUS_PROJETO,'NM_STATUS_PROJETO' => $NM_STATUS_PROJETO);
		
		$this->update($data, 'ID_STATUS_PROJETO = ' . (int) $ID_STATUS_PROJETO);
    }
	
    public function deleteStatusProjeto ($id)
    {
        $this->delete('ID_STATUS_PROJETO =' . (int) $id);
    }


}

