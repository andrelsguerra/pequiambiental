<?php

class Application_Model_DbTable_Contato extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_CONTATO';
	protected $_primary = 'ID_CONTATO';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getContatos()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('c' => 'TB_CONTATO'))
             ->joinInner(array('cl' => 'TB_CLIENTE'),('cl.ID_CLIENTE =c.FK_CLIENTE'),array('cl.NM_CLIENTE'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
	public function getContatoCombo ()
    {
       $listaContato = new Application_Model_DbTable_Contato();
       return $listaContato->getAdapter()->fetchPairs( $listaContato->select()->from( 'contato', array('ID_CONTATO', 'NM_CONTATO') )->order('NM_CONTATO'));
    }
	public function getContato($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_CONTATO = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    /*public function getContatos()
    {
       $contato = new Application_Model_DbTable_Contato();
       return $contato->getAdapter()->fetchPairs( $contato->select()->from( 'contato', array('ID_CONTATO', 'nome') )->where('ID_CONTATO <>1')->order('nome'));
    }*/
   
    public function addContato($NM_CONTATO, $NM_CARGO, $NR_TELEFONE, $NR_TELEFONE2, $TX_OBSERVACAO,$DS_EMAIL,$FK_CLIENTE,$NM_LOGRADOURO,$NR_ENDERECO,$DS_COMPLEMENTO,$NM_BAIRRO,$NM_UF,$NR_CEP,$FL_AGENDA)
    {
    	
        $data = array('NM_CONTATO' => $NM_CONTATO, 'NM_CARGO' => $NM_CARGO, 'NR_TELEFONE' => $NR_TELEFONE, 'NR_TELEFONE2' => $NR_TELEFONE2,
		'TX_OBSERVACAO'=>$TX_OBSERVACAO,'DS_EMAIL'=>$DS_EMAIL, 'FK_CLIENTE' => $FK_CLIENTE, 'NM_LOGRADOURO' => $NM_LOGRADOURO, 'NR_ENDERECO' => $NR_ENDERECO, 'DS_COMPLEMENTO' => $DS_COMPLEMENTO
		, 'NM_BAIRRO' => $NM_BAIRRO, 'NM_UF' => $NM_UF, 'NR_CEP' => $NR_CEP, 'FL_AGENDA' => $FL_AGENDA);
        $this->insert($data);
    }
     
    public function updateContato ($ID_CONTATO,$NM_CONTATO, $NM_CARGO, $NR_TELEFONE, $NR_TELEFONE2, $TX_OBSERVACAO,$DS_EMAIL,$FK_CLIENTE,$NM_LOGRADOURO,$NR_ENDERECO,$DS_COMPLEMENTO,$NM_BAIRRO,$NM_UF,$NR_CEP,$FL_AGENDA)
    {
    	$data = array('ID_CONTATO'=>$ID_CONTATO,'NM_CONTATO' => $NM_CONTATO, 'NM_CARGO' => $NM_CARGO, 'NR_TELEFONE' => $NR_TELEFONE, 'NR_TELEFONE2' => $NR_TELEFONE2,
		'TX_OBSERVACAO'=>$TX_OBSERVACAO,'DS_EMAIL'=>$DS_EMAIL, 'FK_CLIENTE' => $FK_CLIENTE, 'NM_LOGRADOURO' => $NM_LOGRADOURO, 'NR_ENDERECO' => $NR_ENDERECO, 'DS_COMPLEMENTO' => $DS_COMPLEMENTO
		, 'NM_BAIRRO' => $NM_BAIRRO, 'NM_UF' => $NM_UF, 'NR_CEP' => $NR_CEP, 'FL_AGENDA' => $FL_AGENDA);
		
		$this->update($data, 'ID_CONTATO = ' . (int) $ID_CONTATO);
    }
	
    public function deleteContato ($id)
    {
        $this->delete('ID_CONTATO =' . (int) $id);
    }


}

