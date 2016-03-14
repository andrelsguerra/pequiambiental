<?php

class Application_Model_DbTable_StatusPlanoAcao extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_STATUS_PLANO_ACAO';
	protected $_primary = 'ID_STATUS_PLANO_ACAO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getStatusPlanoAcaos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_STATUS_PLANO_ACAO'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getStatusPlanoAcaoCombo ()
    {
       $listaStatusPlanoAcao = new Application_Model_DbTable_StatusPlanoAcao();
       return $listaStatusPlanoAcao->getAdapter()->fetchPairs( $listaStatusPlanoAcao->select()->from( 'TB_STATUS_PLANO_ACAO', array('ID_STATUS_PLANO_ACAO', 'NM_STATUS_PLANO_ACAO') )->order('NM_STATUS_PLANO_ACAO'));
    }
	public function getStatusPlanoAcao($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_STATUS_PLANO_ACAO= ' . $id);
        if (! $row) {
            throw new Exception("N�o foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getStatusPlanoAcaos()
    {
       $ramoAtividade = new Application_Model_DbTable_StatusPlanoAcao();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_STATUS_PLANO_ACAO', 'nome') )->where('ID_STATUS_PLANO_ACAO<>1')->order('nome'));
    }*/
   
    public function addStatusPlanoAcao($NM_STATUS_PLANO_ACAO)
    {
    	
        $data = array('NM_STATUS_PLANO_ACAO' => $NM_STATUS_PLANO_ACAO);
        $this->insert($data);
    }
     
    public function updateStatusPlanoAcao ($ID_STATUS_PLANO_ACAO,$NM_STATUS_PLANO_ACAO)
    {
    	$data = array('ID_STATUS_PLANO_ACAO'=>$ID_STATUS_PLANO_ACAO,'NM_STATUS_PLANO_ACAO' => $NM_STATUS_PLANO_ACAO);
		
		$this->update($data, 'ID_STATUS_PLANO_ACAO= ' . (int) $ID_STATUS_PLANO_ACAO);
    }
	
    public function deleteStatusPlanoAcao ($id)
    {
        $this->delete('ID_STATUS_PLANO_ACAO=' . (int) $id);
    }


}

