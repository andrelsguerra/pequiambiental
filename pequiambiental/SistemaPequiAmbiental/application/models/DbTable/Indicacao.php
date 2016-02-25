<?php

class Application_Model_DbTable_Indicacao extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_INDICACAO';
	protected $_primary = 'ID_INDICACAO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getIndicacoes()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_INDICACAO'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getIndicacaoCombo ()
    {
       $listaIndicacao = new Application_Model_DbTable_Indicacao();
       return $listaIndicacao->getAdapter()->fetchPairs( $listaIndicacao->select()->from( 'TB_INDICACAO', array('ID_INDICACAO', 'NM_INDICACAO') )->order('NM_INDICACAO'));
    }
	public function getIndicacao($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_INDICACAO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getIndicacaos()
    {
       $ramoAtividade = new Application_Model_DbTable_Indicacao();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_INDICACAO', 'nome') )->where('ID_INDICACAO <>1')->order('nome'));
    }*/
   
    public function addIndicacao($NM_INDICACAO)
    {
    	
        $data = array('NM_INDICACAO' => $NM_INDICACAO);
        $this->insert($data);
    }
     
    public function updateIndicacao ($ID_INDICACAO,$NM_INDICACAO)
    {
    	$data = array('ID_INDICACAO'=>$ID_INDICACAO,'NM_INDICACAO' => $NM_INDICACAO);
		
		$this->update($data, 'ID_INDICACAO = ' . (int) $ID_INDICACAO);
    }
	
    public function deleteIndicacao ($id)
    {
        $this->delete('ID_INDICACAO =' . (int) $id);
    }


}

