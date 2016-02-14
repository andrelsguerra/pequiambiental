<?php

class Application_Model_DbTable_RamoAtividade extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_RAMO_ATIVIDADE';
	protected $_primary = 'ID_RAMO_ATIVIDADE';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getRamoAtividades()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_RAMO_ATIVIDADE'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getRamoAtividadeCombo ()
    {
       $listaRamoAtividade = new Application_Model_DbTable_RamoAtividade();
       return $listaRamoAtividade->getAdapter()->fetchPairs( $listaRamoAtividade->select()->from( 'TB_RAMO_ATIVIDADE', array('ID_RAMO_ATIVIDADE', 'DS_RAMO_ATIVIDADE') )->order('DS_RAMO_ATIVIDADE'));
    }
	public function getRamoAtividade($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_RAMO_ATIVIDADE = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getRamoAtividades()
    {
       $ramoAtividade = new Application_Model_DbTable_RamoAtividade();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_RAMO_ATIVIDADE', 'nome') )->where('ID_RAMO_ATIVIDADE <>1')->order('nome'));
    }*/
   
    public function addRamoAtividade($DS_RAMO_ATIVIDADE)
    {
    	
        $data = array('DS_RAMO_ATIVIDADE' => $DS_RAMO_ATIVIDADE);
        $this->insert($data);
    }
     
    public function updateRamoAtividade ($ID_RAMO_ATIVIDADE,$DS_RAMO_ATIVIDADE)
    {
    	$data = array('ID_RAMO_ATIVIDADE'=>$ID_RAMO_ATIVIDADE,'DS_RAMO_ATIVIDADE' => $DS_RAMO_ATIVIDADE);
		
		$this->update($data, 'ID_RAMO_ATIVIDADE = ' . (int) $ID_RAMO_ATIVIDADE);
    }
	
    public function deleteRamoAtividade ($id)
    {
        $this->delete('ID_RAMO_ATIVIDADE =' . (int) $id);
    }


}

