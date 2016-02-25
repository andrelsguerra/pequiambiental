<?php
//header("Content-Type: text/html; charset=utf8", true);
class Application_Model_DbTable_TipoProjeto extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_TIPO_PROJETO';
	protected $_primary = 'ID_TIPO_PROJETO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getTipoProjetos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('t' => 'TB_TIPO_PROJETO'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getTipoProjetoCombo ()
    {
       $listaTipoProjeto = new Application_Model_DbTable_TipoProjeto();
       return $listaTipoProjeto->getAdapter()->fetchPairs( $listaTipoProjeto->select()->from( 'TB_TIPO_PROJETO', array('ID_TIPO_PROJETO', 'NM_TIPO_PROJETO') )->order('NM_TIPO_PROJETO'));
    }
	public function getTipoProjeto($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_TIPO_PROJETO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getTipoProjetos()
    {
       $ramoAtividade = new Application_Model_DbTable_TipoProjeto();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_TIPO_PROJETO', 'nome') )->where('ID_TIPO_PROJETO <>1')->order('nome'));
    }*/
   
    public function addTipoProjeto($NM_TIPO_PROJETO)
    {
    	
        $data = array('NM_TIPO_PROJETO' => $NM_TIPO_PROJETO);
        $this->insert($data);
    }
     
    public function updateTipoProjeto ($ID_TIPO_PROJETO,$NM_TIPO_PROJETO)
    {
    	$data = array('ID_TIPO_PROJETO'=>$ID_TIPO_PROJETO,'NM_TIPO_PROJETO' => $NM_TIPO_PROJETO);
		
		$this->update($data, 'ID_TIPO_PROJETO = ' . (int) $ID_TIPO_PROJETO);
    }
	
    public function deleteTipoProjeto ($id)
    {
        $this->delete('ID_TIPO_PROJETO =' . (int) $id);
    }


}

