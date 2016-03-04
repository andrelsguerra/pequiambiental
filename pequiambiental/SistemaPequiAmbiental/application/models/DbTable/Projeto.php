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
    	->from(array('p' => 'TB_PROJETO'),array("*",'DT_CADASTRO' => new Zend_Db_Expr("DATE_FORMAT(DT_CADASTRO,'%d/%m/%Y %H:%i')")))
    	->joinLeft(array('c' => 'TB_CLIENTE'),('p.FK_CLIENTE =c.ID_CLIENTE'),array('NM_CLIENTE' => new Zend_Db_Expr("Substring_index(c.NM_CLIENTE,' ',1)")))
    	->joinLeft(array('t' => 'TB_TIPO_PROJETO'),('t.ID_TIPO_PROJETO =p.FK_TIPO_PROJETO'),array('NM_TIPO_PROJETO'))
    	->joinLeft(array('s' => 'TB_STATUS_PROJETO'),('s.ID_STATUS_PROJETO =p.FK_STATUS_PROJETO'),array('NM_STATUS_PROJETO'))
    
    	->order("p.DT_CADASTRO DESC")
    	->limit(30);
    	
    	
    	
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getServicos($ID_PROJETO)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->joinInner(array('tps' => 'TB_TIPO_SERVICO'),('tps.ID_TIPO_SERVICO =s.FK_TIPO_SERVICO'))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('o.ID_OPERADOR =s.FK_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->where('s.FL_PCP=0 and p.ID_PROJETO ='.$ID_PROJETO)
    	->order("s.DT_SERVICO DESC");
    	 
    	 
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getPcps($ID_PROJETO)
    {
    
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->joinInner(array('tps' => 'TB_TIPO_SERVICO'),('tps.ID_TIPO_SERVICO =s.FK_TIPO_SERVICO'))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('o.ID_OPERADOR =s.FK_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->where('s.FL_PCP=1 and p.ID_PROJETO ='.$ID_PROJETO)
    	->order("s.DT_SERVICO DESC");
    
    
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
	/*public function getProjeto($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_PROJETO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }*/
    public function getProjeto($id)
    {
    	$id = (int) $id;
    	// $row = $this->fetchRow("nome",null,'id = ' . $id);
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_PROJETO'),array("*",'DT_CADASTRO' => new Zend_Db_Expr("DATE_FORMAT(DT_CADASTRO,'%d/%m/%Y %H:%i')")))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('n.FK_GESTOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->joinLeft(array('t' => 'TB_TIPO_PROJETO'),('t.ID_TIPO_PROJETO =n.FK_TIPO_PROJETO'),array('*'))
    	->joinLeft(array('ag' => 'TB_AGENCIA_AMBIENTAL'),('ag.ID_AGENCIA_AMBIENTAL =n.FK_AGENCIA_AMBIENTAL'))
    	->joinLeft(array('st' => 'TB_STATUS_PROJETO'),('st.ID_STATUS_PROJETO =n.FK_STATUS_PROJETO'))
    	->joinLeft(array('c' => 'TB_CLIENTE'),('c.ID_CLIENTE =n.FK_CLIENTE'))
    	->joinLeft(array('tp' => 'TB_TIPO_PROJETO'),('tp.ID_TIPO_PROJETO =n.FK_TIPO_PROJETO'))
    	->where('ID_PROJETO='.$id);
    	$row = $this->getAdapter()->fetchRow($select);
    	if (! $row) {
    		throw new Exception("Não foi possivel encontrar a linha $id");
    	}
    
    
    	// $row["fk_usuario"]=$usuarioHasReuniao->getParticipanteReuniaoCombo ($id);
    
    	return $row;
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

