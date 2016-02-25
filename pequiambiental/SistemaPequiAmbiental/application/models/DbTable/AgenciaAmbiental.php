<?php

class Application_Model_DbTable_AgenciaAmbiental extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_AGENCIA_AMBIENTAL';
	protected $_primary = 'ID_AGENCIA_AMBIENTAL';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getAgenciaAmbientals()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_AGENCIA_AMBIENTAL'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getAgenciaAmbientalCombo ()
    {
       $listaAgenciaAmbiental = new Application_Model_DbTable_AgenciaAmbiental();
       return $listaAgenciaAmbiental->getAdapter()->fetchPairs( $listaAgenciaAmbiental->select()->from( 'TB_AGENCIA_AMBIENTAL', array('ID_AGENCIA_AMBIENTAL', 'NM_AGENCIA_AMBIENTAL') )->order('NM_AGENCIA_AMBIENTAL'));
    }
	public function getAgenciaAmbiental($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_AGENCIA_AMBIENTAL = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getAgenciaAmbientals()
    {
       $ramoAtividade = new Application_Model_DbTable_AgenciaAmbiental();
       return $ramoAtividade->getAdapter()->fetchPairs( $ramoAtividade->select()->from( 'ramoAtividade', array('ID_AGENCIA_AMBIENTAL', 'nome') )->where('ID_AGENCIA_AMBIENTAL <>1')->order('nome'));
    }*/
   
    public function addAgenciaAmbiental($DS_AGENCIA_AMBIENTAL)
    {
    	
        $data = array('DS_AGENCIA_AMBIENTAL' => $DS_AGENCIA_AMBIENTAL);
        $this->insert($data);
    }
     
    public function updateAgenciaAmbiental ($ID_AGENCIA_AMBIENTAL,$DS_AGENCIA_AMBIENTAL)
    {
    	$data = array('ID_AGENCIA_AMBIENTAL'=>$ID_AGENCIA_AMBIENTAL,'DS_AGENCIA_AMBIENTAL' => $DS_AGENCIA_AMBIENTAL);
		
		$this->update($data, 'ID_AGENCIA_AMBIENTAL = ' . (int) $ID_AGENCIA_AMBIENTAL);
    }
	
    public function deleteAgenciaAmbiental ($id)
    {
        $this->delete('ID_AGENCIA_AMBIENTAL =' . (int) $id);
    }


}

