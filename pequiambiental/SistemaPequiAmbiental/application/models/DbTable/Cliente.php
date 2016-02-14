<?php

class Application_Model_DbTable_Cliente extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_CLIENTE';
	protected $_primary = 'ID_CLIENTE';
	
	/*protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);*/
	public function getClienteCombo ()
    {
       $listaCliente = new Application_Model_DbTable_Cliente();
       return $listaCliente->getAdapter()->fetchPairs( $listaCliente->select()->from( 'TB_CLIENTE', array('ID_CLIENTE', 'NM_CLIENTE') )->order('NM_CLIENTE'));
    }
	public function getCliente($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_CLIENTE = ' . $id);
        if (! $row) {
            throw new Exception("Não foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
   
    public function getClientes()
    {
       $select =$this->_db->select()
             ->from(array('c' => 'TB_CLIENTE'))
             ->joinLeft(array('ra' => 'TB_RAMO_ATIVIDADE'),('ra.ID_RAMO_ATIVIDADE =c.FK_RAMO_ATIVIDADE'));
             //->where('u.id_usuario <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
   

    public function addCliente($NM_CLIENTE, $NR_CNPJ, $TX_OBSERVACAO, $NM_LOGRADOURO,$NR_NUMERO,$DS_COMPLEMENTO,$NM_BAIRRO,$NR_CEP,$NM_CIDADE,$NM_UF,$DT_ATUALIZACAO,$FK_RAMO_ATIVIDADE)
    {
    	
        $data = array('NM_CLIENTE' => $NM_CLIENTE, 'NR_CNPJ' => $NR_CNPJ, 'TX_OBSERVACAO' => $TX_OBSERVACAO, 'NM_LOGRADOURO' => $NM_LOGRADOURO,
		'NR_NUMERO'=>$NR_NUMERO,'DS_COMPLEMENTO'=>$DS_COMPLEMENTO, 'NM_BAIRRO' => $NM_BAIRRO, 'NR_CEP' => $NR_CEP, 'NM_CIDADE' => $NM_CIDADE, 'NM_UF' => $NM_UF
		, 'DT_ATUALIZACAO' => $DT_ATUALIZACAO, 'FK_RAMO_ATIVIDADE' => $FK_RAMO_ATIVIDADE);
        $this->insert($data);
    }
     
    public function updateCliente ($ID_CLIENTE,$NM_CLIENTE, $NR_CNPJ, $TX_OBSERVACAO, $NM_LOGRADOURO,$NR_NUMERO,$DS_COMPLEMENTO,$NM_BAIRRO,$NR_CEP,$NM_CIDADE,$NM_UF,$DT_ATUALIZACAO,$FK_RAMO_ATIVIDADE)
    {
    	$data = array('ID_CLIENTE'=>$ID_CLIENTE,'NM_CLIENTE' => $NM_CLIENTE, 'NR_CNPJ' => $NR_CNPJ, 'TX_OBSERVACAO' => $TX_OBSERVACAO, 'NM_LOGRADOURO' => $NM_LOGRADOURO,
		'NR_NUMERO'=>$NR_NUMERO,'DS_COMPLEMENTO'=>$DS_COMPLEMENTO, 'NM_BAIRRO' => $NM_BAIRRO, 'NR_CEP' => $NR_CEP, 'NM_CIDADE' => $NM_CIDADE, 'NM_UF' => $NM_UF
		, 'DT_ATUALIZACAO' => $DT_ATUALIZACAO, 'FK_RAMO_ATIVIDADE' => $FK_RAMO_ATIVIDADE);
		
		$this->update($data, 'ID_CLIENTE = ' . (int) $ID_CLIENTE);
    }
	
    public function deleteCliente ($id)
    {
        $this->delete('ID_CLIENTE =' . (int) $id);
    }


}

