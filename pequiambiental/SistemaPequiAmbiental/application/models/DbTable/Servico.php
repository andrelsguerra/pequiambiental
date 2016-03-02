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
    public function getPcps()
    {
    	 
    	$select =$this->_db->select()
    	->from(array('s' => 'TB_SERVICO'),array("*",'DT_SERVICO' => new Zend_Db_Expr("DATE_FORMAT(DT_SERVICO,'%d/%m/%Y')")))
    	->joinInner(array('p' => 'TB_PROJETO'),('p.ID_PROJETO =s.FK_PROJETO'))
    	->where('s.FL_PCP=1')
    	->order("s.DT_SERVICO DESC");
    	 
    	 
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
   
    /*public function getServicos()
    {
       $ramoAtividade = new Application_Model_DbTable_Servico();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_SERVICO', 'nome') )->where('ID_SERVICO <>1')->order('nome'));
    }*/
 
    public function addServico($DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FK_PROJETO, $FL_PCP)
    {
    	
        $data = array('DS_SERVICO' => $DS_SERVICO,'FK_OPERADOR' =>$FK_OPERADOR ,'NR_CARGA_HORARIA' =>$NR_CARGA_HORARIA ,'FK_TIPO_SERVICO' =>$FK_TIPO_SERVICO ,'DT_SERVICO' => $DT_SERVICO,'FK_PROJETO' => $FK_PROJETO,'FL_PCP' =>$FL_PCP  );
        $this->insert($data);
    }
     
    public function updateServico (  $ID_SERVICO,$DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FK_PROJETO, $FL_PCP)
    {
    	$data = array('ID_SERVICO'=>$ID_SERVICO,'DS_SERVICO' => $DS_SERVICO,'FK_OPERADOR' =>$FK_OPERADOR ,'NR_CARGA_HORARIA' =>$NR_CARGA_HORARIA ,'FK_TIPO_SERVICO' =>$FK_TIPO_SERVICO ,'DT_SERVICO' => $DT_SERVICO,'FK_PROJETO' => $FK_PROJETO,'FL_PCP' =>$FL_PCP  );
		
		$this->update($data, 'ID_SERVICO = ' . (int) $ID_SERVICO);
    }
	
    public function deleteServico ($id)
    {
        $this->delete('ID_SERVICO =' . (int) $id);
    }


}

