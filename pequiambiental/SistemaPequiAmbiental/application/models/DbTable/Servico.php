<?php

class Application_Model_DbTable_Servico extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_SERVICO';
	protected $_primary = 'ID_SERVICO';
	
    
	public function getServicoCombo ()
    {
       $listaServico = new Application_Model_DbTable_Servico();
       return $listaServico->getAdapter()->fetchPairs( $listaServico->select()->from( 'TB_SERVICO', array('ID_SERVICO', 'NM_SERVICO') )->order('NM_SERVICO'));
    }
    public function getServicos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
             ->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
             ->where('s.FL_PCP=0')
             ->order("s.DT_SERVICO DESC");
             
             
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
    /*
     * Retorna os pcps que o operador
     */
    public function getServicosOperador($ID_OPERADOR)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->where('s.FL_PCP=0 and FK_OPERADOR='.$ID_OPERADOR)
    	->order("s.DT_SERVICO DESC");
    	 
    	 //Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getPcps()
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->where('s.FL_PCP=1')
    	->order("s.DT_SERVICO DESC");
    	 
    	 Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
     public function getPcpsServicos($ID_OPERADOR)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->where('s.FK_OPERADOR='.$ID_OPERADOR)
    	->order("s.DT_SERVICO DESC")
    	->limit(10);
    	 
    	 Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    /*
     * Retorna os pcps que o operador
     */
    public function getPcpsOperador($ID_OPERADOR)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->where('s.FL_PCP=1 and FK_OPERADOR='.$ID_OPERADOR)
    	->order("s.DT_SERVICO DESC");
    	 
    	 //Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    
	public function getServico($id)
    {
       $id = (int) $id;
    	// $row = $this->fetchRow("nome",null,'id = ' . $id);
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->where('ID_SERVICO ='.$id);
    	$row = $this->getAdapter()->fetchRow($select);
    	if (! $row) {
    		throw new Exception("Não foi possivel encontrar a linha $id");
    	}
    
    	 
    	// $row["fk_usuario"]=$usuarioHasReuniao->getParticipanteReuniaoCombo ($id);
    	Zend_Registry::get('logger')->log($row, Zend_Log::INFO);
    	return $row;
    }
    public function getServicoAutomatico($id)
    {
       $id = (int) $id;
    	// $row = $this->fetchRow("nome",null,'id = ' . $id);
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_SERVICO'))
    	->where('ID_SERVICO ='.$id);
    	$row = $this->getAdapter()->fetchRow($select);
    	if (! $row) {
    		throw new Exception("Não foi possivel encontrar a linha $id");
    	}
    
    	 
    	// $row["fk_usuario"]=$usuarioHasReuniao->getParticipanteReuniaoCombo ($id);
    	Zend_Registry::get('logger')->log($row, Zend_Log::INFO);
    	return $row;
    }
   
    /*public function getServicos()
    {
       $ramoAtividade = new Application_Model_DbTable_Servico();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_SERVICO', 'nome') )->where('ID_SERVICO <>1')->order('nome'));
    }*/
 
    public function addServico($DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FK_PROJETO, $FL_PCP)
    {
    	
        $data = array('DS_SERVICO' => $DS_SERVICO,'FK_OPERADOR' =>$FK_OPERADOR ,'NR_CARGA_HORARIA' =>$NR_CARGA_HORARIA ,'FK_TIPO_SERVICO' =>$FK_TIPO_SERVICO ,'DT_SERVICO' => $DT_SERVICO,'FK_PROJETO' => $FK_PROJETO,'FL_PCP' =>$FL_PCP  );
        return $this->insert($data);
    }
    public function updateValidarServico ( $ID_SERVICO,$FL_VALIDAR_SERVICO)
    {
    	$data = array('ID_SERVICO'=>$ID_SERVICO,'FL_VALIDAR_SERVICO' => $FL_VALIDAR_SERVICO );
		
		$this->update($data, 'ID_SERVICO = ' . (int) $ID_SERVICO);
    }
    public function updateServico (  $ID_SERVICO,$DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FK_PROJETO, $FL_PCP)
    {
    	$data = array('ID_SERVICO'=>$ID_SERVICO,'DS_SERVICO' => $DS_SERVICO,'FK_OPERADOR' =>$FK_OPERADOR ,'NR_CARGA_HORARIA' =>$NR_CARGA_HORARIA ,'FK_TIPO_SERVICO' =>$FK_TIPO_SERVICO ,'DT_SERVICO' => $DT_SERVICO,'FK_PROJETO' => $FK_PROJETO,'FL_PCP' =>$FL_PCP  );
		
		$this->update($data, 'ID_SERVICO = ' . (int) $ID_SERVICO);
    }
     public function updateServicoSemProjeto (  $ID_SERVICO,$DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FL_PCP)
    {
    	$data = array('ID_SERVICO'=>$ID_SERVICO,'DS_SERVICO' => $DS_SERVICO,'FK_OPERADOR' =>$FK_OPERADOR ,'NR_CARGA_HORARIA' =>$NR_CARGA_HORARIA ,'FK_TIPO_SERVICO' =>$FK_TIPO_SERVICO ,'DT_SERVICO' => $DT_SERVICO,'FL_PCP' =>$FL_PCP  );
		
		$this->update($data, 'ID_SERVICO = ' . (int) $ID_SERVICO);
    }
	
    public function deleteServico ($id)
    {
        $this->delete('ID_SERVICO =' . (int) $id);
    }
    public function deletePcp ($id)
    {
    	$pcp=$this->getServico($id);
    	if(!$pcp["FL_VALIDAR_SERVICO"]){
    		Zend_Registry::get('logger')->log("pode excluir", Zend_Log::INFO);
    	}else
    	{
    		Zend_Registry::get('logger')->log("Não pode excluir", Zend_Log::INFO);
    		
    		throw new Exception("Não é possivel excluir Pcp que virou Serviço");
    	}
    	Zend_Registry::get('logger')->log($pcp, Zend_Log::INFO);
        $this->delete('ID_SERVICO =' . (int) $id);
    }


}

