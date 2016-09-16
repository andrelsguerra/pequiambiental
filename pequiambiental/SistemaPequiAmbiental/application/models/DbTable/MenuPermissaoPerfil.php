<?php

class Application_Model_DbTable_MenuPermissaoPerfil extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_PERFIL_PERMISSAO';
	protected $_primary = array('FK_PERMISSAO','FK_PERFIL');
		
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function retornaMenu($ID_MENU,$ID_PERFIL){
		$select =$this->_db->select()
		->from(array('m' => 'TB_MENU'))
		->joinLeft(array('p' => 'TB_PERMISSAO'),('p.FK_MENU =m.ID_MENU'))
		->joinLeft(array('pp' => 'TB_PERFIL_PERMISSAO'),('pp.FK_PERMISSAO=p.ID_PERMISSAO'))
		->where('m.ID_MENU='.$ID_MENU.' and pp.FK_PERFIL='.$ID_PERFIL.' and pp.FL_PERMISSAO=1');
		;
		
		
		 
		 
		$result = $this->getAdapter()->fetchAll($select);
		return $result;
	}
	public function updatePermissaoPerfil ($ID_PERMISSAO,$ID_PERFIL,$FL_PERMISSAO)
    {
    	$data = array('FL_PERMISSAO'=>$FL_PERMISSAO);
		
		$this->update($data, 'FK_PERMISSAO = ' . (int) $ID_PERMISSAO.' AND FK_PERFIL='.(int) $ID_PERFIL);
    }
	public function listaPerfil(){
		$select =$this->_db->select()
		->from(array('p' => 'perfil'))
		
		;
	
		
			
			
			
		$result = $this->getAdapter()->fetchAll($select);
		return $result;
	}
	
	public function listaPermissaoPerfil($ID_PERFIL){
		$select =$this->_db->select()
		->from(array('p' => 'TB_PERMISSAO'),array("*"))
		->joinLeft(array('pp' => 'TB_PERFIL_PERMISSAO'),('pp.FK_PERMISSAO =p.ID_PERMISSAO'))
		->where('pp.FK_PERFIL='.$ID_PERFIL);
		;
	
		//Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
		//$a = array(array('p', 'h'), array('p', 'r'), 'o');
		
			
		$result = $this->getAdapter()->fetchAll($select);
		
		
		return $result;
	}
	public function listaPermissao(){
		$select =$this->_db->select()
		->from(array('p' => 'TB_PERMISSAO'),array("*"))
		;
			
		$result = $this->getAdapter()->fetchAll($select);
	
		
		return $result;
	}
	public function listaPermissaoPapel(){
		$select =$this->_db->select()
		->from(array('p' => 'TB_PERMISSAO'),array("*"))
		->joinLeft(array('pp' => 'TB_PERFIL_PERMISSAO'),('pp.FK_PERMISSAO =p.ID_PERMISSAO'))
		->joinLeft(array('pe' => 'perfil'),('pe.id_perfil =pp.FK_PERFIL'))
		->where('pp.FL_PERMISSAO=1')
		->order("pp.FK_PERFIL")
		;
		//Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);	
		$result = $this->getAdapter()->fetchAll($select);
	
		
		return $result;
	}
	public function retornaPermissaoPagina($pagina,$ID_PERFIL){
		$select =$this->_db->select()
		->from(array('p' => 'TB_PERMISSAO'),array("*"))
		->joinLeft(array('pp' => 'TB_PERFIL_PERMISSAO'),('pp.FK_PERMISSAO =p.ID_PERMISSAO'))
		->joinLeft(array('pe' => 'perfil'),('pe.id_perfil =pp.FK_PERFIL'))
		->where("p.NM_PAGINA ='$pagina' and id_perfil='$ID_PERFIL'");
		//Zend_Registry::get('logger')->log( "testeeee", Zend_Log::INFO);	
		//Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);	
		$result = $this->getAdapter()->fetchRow($select);
	
		//Zend_Registry::get('logger')->log( $result ,Zend_Log::INFO);	
		//Zend_Registry::get('logger')->log( $result["FL_PERMISSAO"] ,Zend_Log::INFO);	
		
		return $result["FL_PERMISSAO"];//retorna 0 nao tem permissão ou 1 Tem permissão
		
		 
	}
	

}

