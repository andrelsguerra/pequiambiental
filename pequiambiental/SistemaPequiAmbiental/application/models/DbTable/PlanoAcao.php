<?php

class Application_Model_DbTable_PlanoAcao extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_PLANO_ACAO';
	protected $_primary = 'ID_PLANO_ACAO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getPlanoAcoes()
    {
    	
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_PLANO_ACAO'),array("*",'DT_ATUALIZACAO' => new Zend_Db_Expr("DATE_FORMAT(DT_ATUALIZACAO,'%d/%m/%Y')"),'DT_CONTROLE' => new Zend_Db_Expr("DATE_FORMAT(DT_CONTROLE,'%d/%m/%Y')"),'DT_CONCLUSAO' => new Zend_Db_Expr("DATE_FORMAT(DT_CONCLUSAO,'%d/%m/%Y')"),'DT_PREVISAO' => new Zend_Db_Expr("DATE_FORMAT(DT_PREVISAO,'%d/%m/%Y')")))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	 ->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =n.FK_PROJETO'))
    	->joinLeft(array('st' => 'TB_STATUS_PLANO_ACAO'),('st.ID_STATUS_PLANO_ACAO=n.FK_STATUS_PLANO_ACAO'));
    	
    	
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getPlanoAcoesProjeto($ID_PROJETO)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_PLANO_ACAO'),array("*",'DT_ATUALIZACAO' => new Zend_Db_Expr("DATE_FORMAT(DT_ATUALIZACAO,'%d/%m/%Y')"),'DT_CONTROLE' => new Zend_Db_Expr("DATE_FORMAT(DT_CONTROLE,'%d/%m/%Y')"),'DT_CONCLUSAO' => new Zend_Db_Expr("DATE_FORMAT(DT_CONCLUSAO,'%d/%m/%Y')"),'DT_PREVISAO' => new Zend_Db_Expr("DATE_FORMAT(DT_PREVISAO,'%d/%m/%Y')")))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =n.FK_PROJETO'))
    	->joinLeft(array('st' => 'TB_STATUS_PLANO_ACAO'),('st.ID_STATUS_PLANO_ACAO=n.FK_STATUS_PLANO_ACAO'))
    	->where(' p.ID_PROJETO ='.$ID_PROJETO);
    	 
    	 
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getServicos($ID_PROJETO)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PLANO_ACAO'),('p.ID_PROJETO =s.FK_PROJETO'))
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
    	->joinInner(array('p' => 'TB_PLANO_ACAO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->joinInner(array('tps' => 'TB_TIPO_SERVICO'),('tps.ID_TIPO_SERVICO =s.FK_TIPO_SERVICO'))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('o.ID_OPERADOR =s.FK_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->where('s.FL_PCP=1 and p.ID_PROJETO ='.$ID_PROJETO)
    	->order("s.DT_SERVICO DESC");
    
    
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getUltimasPlanoAcao()
    {
    
    	$select =$this->_db->select()
    	->from(array('p' => 'TB_PLANO_ACAO'),array("*",'DT_CADASTRO' => new Zend_Db_Expr("DATE_FORMAT(DT_CADASTRO,'%d/%m/%Y')")))
    	->joinLeft(array('c' => 'TB_CLIENTE'),('p.FK_CLIENTE =c.ID_CLIENTE'),array('NM_CLIENTE' => new Zend_Db_Expr("Substring_index(c.NM_CLIENTE,' ',1)")))
    	->joinLeft(array('t' => 'TB_TIPO_PROJETO'),('t.ID_TIPO_PROJETO =p.FK_TIPO_PROJETO'),array('NM_TIPO_PROJETO'))
    	->joinLeft(array('s' => 'TB_STATUS_PROJETO'),('s.ID_STATUS_PROJETO =p.FK_STATUS_PROJETO'),array('NM_STATUS_PROJETO'))
    
    	->order("p.DT_CADASTRO DESC")
    	->limit(5);
    	Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
	public function getPlanoAcaoCombo ()
    {
       $listaPlanoAcao = new Application_Model_DbTable_PlanoAcao();
       return $listaPlanoAcao->getAdapter()->fetchPairs( $listaPlanoAcao->select()->from( 'TB_PLANO_ACAO', array('ID_PROJETO', 'NM_PROJETO') )->order('NM_PROJETO'));
    }
	/*public function getPlanoAcao($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_PROJETO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }*/
    public function getPlanoAcao($id)
    {
    	$id = (int) $id;
    	// $row = $this->fetchRow("nome",null,'id = ' . $id);
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_PLANO_ACAO'),array("*",'DT_ATUALIZACAO' => new Zend_Db_Expr("DATE_FORMAT(DT_ATUALIZACAO,'%d/%m/%Y')"),'DT_CONTROLE' => new Zend_Db_Expr("DATE_FORMAT(DT_CONTROLE,'%d/%m/%Y')"),'DT_CONCLUSAO' => new Zend_Db_Expr("DATE_FORMAT(DT_CONCLUSAO,'%d/%m/%Y')"),'DT_PREVISAO' => new Zend_Db_Expr("DATE_FORMAT(DT_PREVISAO,'%d/%m/%Y')")))
    	->joinLeft(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	 ->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =n.FK_PROJETO'))
    	->joinLeft(array('st' => 'TB_STATUS_PLANO_ACAO'),('st.ID_STATUS_PLANO_ACAO=n.FK_STATUS_PLANO_ACAO'))
    	
    	->where('ID_PLANO_ACAO='.$id);
    	$row = $this->getAdapter()->fetchRow($select);
    	if (! $row) {
    		throw new Exception("Não foi possivel encontrar a linha $id");
    	}
    
    
    	// $row["fk_usuario"]=$usuarioHasReuniao->getParticipanteReuniaoCombo ($id);
    
    	return $row;
    }
   
    /*public function getPlanoAcaos()
    {
       $ramoAtividade = new Application_Model_DbTable_PlanoAcao();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_PROJETO', 'nome') )->where('ID_PROJETO <>1')->order('nome'));
    }*/
    
    /*DS_ASSUNTO
    TX_PLANO_ACAO
    FK_PROJETO
    DT_ATUALIZACAO
    FK_STATUS
    FK_OPERADOR
    DT_PREVISAO
    DT_CONCLUSAO
    DT_CONTROLE*/
    public function addPlanoAcao( $DS_ASSUNTO, $TX_PLANO_ACAO, $FK_PROJETO, $DT_ATUALIZACAO, $FK_STATUS_PLANO_ACAO, $FK_OPERADOR, $DT_PREVISAO, $DT_CONCLUSAO, $DT_CONTROLE)
    {
    	
        $data = array('DS_ASSUNTO' => $DS_ASSUNTO,'TX_PLANO_ACAO' => $TX_PLANO_ACAO,'FK_PROJETO' => $FK_PROJETO,'DT_ATUALIZACAO' => $DT_ATUALIZACAO,'FK_STATUS_PLANO_ACAO' => $FK_STATUS_PLANO_ACAO,'FK_OPERADOR' => $FK_OPERADOR,'DT_PREVISAO' => $DT_PREVISAO,'DT_CONCLUSAO' => $DT_CONCLUSAO,'DT_CONTROLE' => $DT_CONTROLE);
        $this->insert($data);
    }
     
    public function updatePlanoAcao ($ID_PLANO_ACAO,$DS_ASSUNTO, $TX_PLANO_ACAO, $FK_PROJETO, $DT_ATUALIZACAO, $FK_STATUS_PLANO_ACAO, $FK_OPERADOR, $DT_PREVISAO, $DT_CONCLUSAO, $DT_CONTROLE)
    {
    	$data = array('ID_PLANO_ACAO'=>$ID_PLANO_ACAO,'DS_ASSUNTO' => $DS_ASSUNTO,'TX_PLANO_ACAO' => $TX_PLANO_ACAO,'FK_PROJETO' => $FK_PROJETO,'DT_ATUALIZACAO' => $DT_ATUALIZACAO,'FK_STATUS_PLANO_ACAO' => $FK_STATUS_PLANO_ACAO,'FK_OPERADOR' => $FK_OPERADOR,'DT_PREVISAO' => $DT_PREVISAO,'DT_CONCLUSAO' => $DT_CONCLUSAO,'DT_CONTROLE' => $DT_CONTROLE);
		
		$this->update($data, 'ID_PLANO_ACAO = ' . (int) $ID_PLANO_ACAO);
    }
	
    public function deletePlanoAcao ($id)
    {
        $this->delete('ID_PLANO_ACAO =' . (int) $id);
    }


}

