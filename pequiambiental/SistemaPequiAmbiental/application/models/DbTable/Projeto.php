<?php

class Application_Model_DbTable_Projeto extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_PROJETO';
	protected $_primary = 'ID_PROJETO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getProjetos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('p' => 'TB_PROJETO'))->limit(200)
             ->order("p.DT_CADASTRO DESC");
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
    
    public function getUltimasProjeto()
    {
    
    	$select =$this->_db->select()
    	->from(array('p' => 'TB_PROJETO'),array("*",'DT_CADASTRO' => new Zend_Db_Expr("DATE_FORMAT(DT_CADASTRO,'%d/%m/%Y %H:%i')")))
    	->joinLeft(array('c' => 'TB_CLIENTE'),('p.FK_CLIENTE =c.ID_CLIENTE'),array('NM_CLIENTE' => new Zend_Db_Expr("Substring_index(c.NM_CLIENTE,' ',1)")))
    	->joinLeft(array('t' => 'TB_TIPO_PROJETO'),('t.ID_TIPO_PROJETO =p.FK_TIPO_PROJETO'),array('NM_TIPO_PROJETO'))
    	->joinLeft(array('s' => 'TB_STATUS_PROJETO'),('s.ID_STATUS_PROJETO =p.FK_STATUS_PROJETO'),array('NM_STATUS_PROJETO'))
    
    	->order("p.DT_CADASTRO DESC")
    	->limit(5);
    	Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
	public function getProjetoCombo ()
    {
       $listaProjeto = new Application_Model_DbTable_Projeto();
       return $listaProjeto->getAdapter()->fetchPairs( $listaProjeto->select()->from( 'TB_PROJETO', array('ID_PROJETO', 'NM_PROJETO') )->order('NM_PROJETO'));
    }
	public function getProjeto($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_PROJETO = ' . $id);
        if (! $row) {
            throw new Exception("N�o foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getProjetos()
    {
       $ramoAtividade = new Application_Model_DbTable_Projeto();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_PROJETO', 'nome') )->where('ID_PROJETO <>1')->order('nome'));
    }*/
   
    public function addProjeto( $NM_PROJETO, $DT_CADASTRO, $FK_AGENCIA_AMBIENTAL, $NR_CONTRATO, $TX_OBSERVACAO, $FK_CLIENTE, $FK_STATUS_PROJETO, $FL_ATIVO, $Fk_GESTOR, $FK_TIPO_PROJETO, $FK_INDICACAO)
    {
    	
        $data = array('NM_PROJETO' => $NM_PROJETO,'DT_CADASTRO' => $DT_CADASTRO,'FK_AGENCIA_AMBIENTAL' => $FK_AGENCIA_AMBIENTAL,'NR_CONTRATO' => $NR_CONTRATO,'TX_OBSERVACAO' => $TX_OBSERVACAO,'FK_CLIENTE' => $FK_CLIENTE,'FK_STATUS_PROJETO' => $FK_STATUS_PROJETO,'FL_ATIVO' => $FL_ATIVO,'Fk_GESTOR' => $Fk_GESTOR,'FK_TIPO_PROJETO' => $FK_TIPO_PROJETO,'FK_INDICACAO' => $FK_INDICACAO);
        $this->insert($data);
    }
     
    public function updateProjeto ($ID_PROJETO, $NM_PROJETO, $DT_CADASTRO, $FK_AGENCIA_AMBIENTAL, $NR_CONTRATO, $TX_OBSERVACAO, $FK_CLIENTE, $FK_STATUS_PROJETO, $FL_ATIVO, $Fk_GESTOR, $FK_TIPO_PROJETO, $FK_INDICACAOO)
    {
    	$data = array('ID_PROJETO'=>$ID_PROJETO,'NM_PROJETO' => $NM_PROJETO,'DT_CADASTRO' => $DT_CADASTRO,'FK_AGENCIA_AMBIENTAL' => $FK_AGENCIA_AMBIENTAL,'NR_CONTRATO' => $NR_CONTRATO,'TX_OBSERVACAO' => $TX_OBSERVACAO,'FK_CLIENTE' => $FK_CLIENTE,'FK_STATUS_PROJETO' => $FK_STATUS_PROJETO,'FL_ATIVO' => $FL_ATIVO,'Fk_GESTOR' => $Fk_GESTOR,'FK_TIPO_PROJETO' => $FK_TIPO_PROJETO,'FK_INDICACAO' => $FK_INDICACAO);
		
		$this->update($data, 'ID_PROJETO = ' . (int) $ID_PROJETO);
    }
	
    public function deleteProjeto ($id)
    {
        $this->delete('ID_PROJETO =' . (int) $id);
    }


}

