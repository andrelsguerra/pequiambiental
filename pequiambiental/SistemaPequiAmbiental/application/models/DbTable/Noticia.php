<?php

class Application_Model_DbTable_Noticia extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_NOTICIA';
	protected $_primary = 'ID_NOTICIA';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getNoticias($tipo_noticia)
    {
    	
    	 $select =$this->_db->select()
             ->from(array('n' => 'TB_NOTICIA'),array("*",'DT_NOTICIA' => new Zend_Db_Expr("DATE_FORMAT(DT_NOTICIA,'%d/%m/%Y %H:%i')")))
             ->joinInner(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
             ->joinInner(array('t' => 'TB_TIPO_NOTICIA'),('t.ID_TIPO_NOTICIA =n.FK_TIPO_NOTICIA'),array('*'))
             ->where('n.FK_TIPO_NOTICIA ='.$tipo_noticia);
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
    public function getUltimasNoticias($tipo_noticia)
    {
    	 
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_NOTICIA'),array("*",'DT_NOTICIA' => new Zend_Db_Expr("DATE_FORMAT(DT_NOTICIA,'%d/%m/%Y %H:%i')")))
    	->joinInner(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->joinInner(array('t' => 'TB_TIPO_NOTICIA'),('t.ID_TIPO_NOTICIA =n.FK_TIPO_NOTICIA'),array('*'))
    	->where('n.FK_TIPO_NOTICIA ='.$tipo_noticia)
    	->order("n.DT_NOTICIA DESC")
    	->limit(5);
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
    public function getNoticiasTodas()
    {
    	 
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_NOTICIA'),array("*",'DT_NOTICIA' => new Zend_Db_Expr("DATE_FORMAT(DT_NOTICIA,'%d/%m/%Y %H:%i')")))
    	->joinInner(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array("*",'PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->joinInner(array('t' => 'TB_TIPO_NOTICIA'),('t.ID_TIPO_NOTICIA =n.FK_TIPO_NOTICIA'),array('*'))
    	->order("n.DT_NOTICIA DESC");
    	$result = $this->getAdapter()->fetchAll($select);
    	return $result;
    }
	public function getNoticiaCombo ()
    {
       $listaNoticia = new Application_Model_DbTable_Noticia();
       return $listaNoticia->getAdapter()->fetchPairs( $listaNoticia->select()->from( 'TB_NOTICIA', array('ID_NOTICIA', 'NM_NOTICIA') )->order('NM_NOTICIA'));
    }
	public function getNoticia($id)
    {
       $id = (int) $id;
    	// $row = $this->fetchRow("nome",null,'id = ' . $id);
    	$select =$this->_db->select()
    	->from(array('n' => 'TB_NOTICIA'),array("*",'DT_NOTICIA' => new Zend_Db_Expr("DATE_FORMAT(DT_NOTICIA,'%d/%m/%Y %H:%i')")))
    	->joinInner(array('o' => 'TB_OPERADOR'),('n.FK_OPERADOR =o.ID_OPERADOR'),array('PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(o.NM_OPERADOR,' ',1)")))
    	->joinInner(array('t' => 'TB_TIPO_NOTICIA'),('t.ID_TIPO_NOTICIA =n.FK_TIPO_NOTICIA'),array('*'))
    	->joinLeft(array('a' => 'arquivo'),('o.FK_ARQUIVO =a.id_arquivo'),array('nome as nomeArquivo'))->order('a.id_arquivo desc')
    	->where('ID_NOTICIA ='.$id);
    	$row = $this->getAdapter()->fetchRow($select);
    	if (! $row) {
    		throw new Exception("Não foi possivel encontrar a linha $id");
    	}
    
    	 
    	// $row["fk_usuario"]=$usuarioHasReuniao->getParticipanteReuniaoCombo ($id);
    
    	return $row;
    }
   
    /*public function getNoticias()
    {
       $ramoAtividade = new Application_Model_DbTable_Noticia();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_NOTICIA', 'nome') )->where('ID_NOTICIA <>1')->order('nome'));
    }*/
   
    public function addNoticia($DS_TITULO,$TX_NOTICIA,$FK_ARQUIVO,$DS_RESUMO,$DT_NOTICIA,$FK_TIPO_NOTICIA,$FK_OPERADOR)
    {
    	
        $data = array('DS_TITULO' => $DS_TITULO,'TX_NOTICIA' =>$TX_NOTICIA ,'FK_ARQUIVO' =>$FK_ARQUIVO ,'DS_RESUMO' =>$DS_RESUMO ,'DT_NOTICIA' => $DT_NOTICIA,'FK_TIPO_NOTICIA' => $FK_TIPO_NOTICIA,'FK_OPERADOR' =>$FK_OPERADOR  );
        $this->insert($data);
    }
     
    public function updateNoticia ($ID_NOTICIA,$DS_TITULO,$TX_NOTICIA,$FK_ARQUIVO,$DS_RESUMO,$DT_NOTICIA,$FK_TIPO_NOTICIA,$FK_OPERADOR)
    {
    	$data = array('ID_NOTICIA'=>$ID_NOTICIA,'DS_TITULO' => $DS_TITULO,'TX_NOTICIA' =>$TX_NOTICIA ,'FK_ARQUIVO' =>$FK_ARQUIVO ,'DS_RESUMO' =>$DS_RESUMO ,'DT_NOTICIA' => $DT_NOTICIA,'FK_TIPO_NOTICIA' => $FK_TIPO_NOTICIA,'FK_OPERADOR' =>$FK_OPERADOR  );
		
		$this->update($data, 'ID_NOTICIA = ' . (int) $ID_NOTICIA);
    }
	
    public function deleteNoticia ($id)
    {
        $this->delete('ID_NOTICIA =' . (int) $id);
    }


}

