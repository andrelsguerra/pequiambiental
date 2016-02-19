<?php

class Application_Model_DbTable_TipoServico extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_TIPO_SERVICO';
	protected $_primary = 'ID_TIPO_SERVICO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getTipoServicos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_TIPO_SERVICO'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getTipoServicoCombo ()
    {
       $listaTipoServico = new Application_Model_DbTable_TipoServico();
       return $listaTipoServico->getAdapter()->fetchPairs( $listaTipoServico->select()->from( 'TB_TIPO_SERVICO', array('ID_TIPO_SERVICO', 'NM_TIPO_SERVICO') )->order('NM_TIPO_SERVICO'));
    }
	public function getTipoServico($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_TIPO_SERVICO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getTipoServicos()
    {
       $ramoAtividade = new Application_Model_DbTable_TipoServico();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_TIPO_SERVICO', 'nome') )->where('ID_TIPO_SERVICO <>1')->order('nome'));
    }*/
   
    public function addTipoServico($NM_TIPO_SERVICO)
    {
    	
        $data = array('NM_TIPO_SERVICO' => $NM_TIPO_SERVICO);
        $this->insert($data);
    }
     
    public function updateTipoServico ($ID_TIPO_SERVICO,$NM_TIPO_SERVICO)
    {
    	$data = array('ID_TIPO_SERVICO'=>$ID_TIPO_SERVICO,'NM_TIPO_SERVICO' => $NM_TIPO_SERVICO);
		
		$this->update($data, 'ID_TIPO_SERVICO = ' . (int) $ID_TIPO_SERVICO);
    }
	
    public function deleteTipoServico ($id)
    {
        $this->delete('ID_TIPO_SERVICO =' . (int) $id);
    }


}

