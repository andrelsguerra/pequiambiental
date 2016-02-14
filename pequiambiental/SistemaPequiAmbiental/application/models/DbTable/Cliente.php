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
       $cliente = new Application_Model_DbTable_Cliente();
       return $cliente->getAdapter()->fetchPairs( $cliente->select()->from( 'TB_CLIENTE', array('ID_CLIENTE', 'nome') )->where('ID_CLIENTE <>1')->order('nome'));
    }
   
    public function addCliente($NM_CONTATO, $NM_CARGO, $NR_TELEFONE, $NR_TELEFONE2, $TX_OBSERVACAO,$DS_EMAIL,$FK_CLIENTE,$NM_LOGRADOURO,$NR_ENDERECO,$DS_COMPLEMENTO,$NM_BAIRRO,$NM_UF,$NR_CEP,$FL_AGENDA)
    {
    	
        $data = array('NM_CONTATO' => $NM_CONTATO, 'NM_CARGO' => $NM_CARGO, 'NR_TELEFONE' => $NR_TELEFONE, 'NR_TELEFONE2' => $NR_TELEFONE2,
		'TX_OBSERVACAO'=>$TX_OBSERVACAO,'DS_EMAIL'=>$DS_EMAIL, 'FK_CLIENTE' => $FK_CLIENTE, 'NM_LOGRADOURO' => $NM_LOGRADOURO, 'NR_ENDERECO' => $NR_ENDERECO, 'DS_COMPLEMENTO' => $DS_COMPLEMENTO
		, 'NM_BAIRRO' => $NM_BAIRRO, 'NM_UF' => $NM_UF, 'NR_CEP' => $NR_CEP, 'FL_AGENDA' => $FL_AGENDA);
        $this->insert($data);
    }
     
    public function updateCliente ($ID_CLIENTE,$NM_CONTATO, $NM_CARGO, $NR_TELEFONE, $NR_TELEFONE2, $TX_OBSERVACAO,$DS_EMAIL,$FK_CLIENTE,$NM_LOGRADOURO,$NR_ENDERECO,$DS_COMPLEMENTO,$NM_BAIRRO,$NM_UF,$NR_CEP,$FL_AGENDA)
    {
    	$data = array('ID_CLIENTE'=>$id,'NM_CONTATO' => $NM_CONTATO, 'NM_CARGO' => $NM_CARGO, 'NR_TELEFONE' => $NR_TELEFONE, 'NR_TELEFONE2' => $NR_TELEFONE2,
		'TX_OBSERVACAO'=>$TX_OBSERVACAO,'DS_EMAIL'=>$DS_EMAIL, 'FK_CLIENTE' => $FK_CLIENTE, 'NM_LOGRADOURO' => $NM_LOGRADOURO, 'NR_ENDERECO' => $NR_ENDERECO, 'DS_COMPLEMENTO' => $DS_COMPLEMENTO
		, 'NM_BAIRRO' => $NM_BAIRRO, 'NM_UF' => $NM_UF, 'NR_CEP' => $NR_CEP, 'FL_AGENDA' => $FL_AGENDA);
		
		$this->update($data, 'ID_CLIENTE = ' . (int) $id);
    }
	
    public function deleteCliente ($id)
    {
        $this->delete('ID_CLIENTE =' . (int) $id);
    }


}

