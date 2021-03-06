<?php

class Application_Model_DbTable_Operador extends Zend_Db_Table_Abstract
{

    protected $_name = 'TB_OPERADOR';
	protected $_primary = 'ID_OPERADOR';
	
	protected $_referenceMap = array(
 		"perfil" => array(
			"columns" => array("fk_perfil"),
			"refTableClass" => "Application_Model_DbTable_Perfil",
			"refColumns" => array("id_perfil"),
		)

	);
	public function getOperadorCombo ()
    {
       $listaOperador= new Application_Model_DbTable_Operador();
       return $listaOperador->getAdapter()->fetchPairs( $listaOperador->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'NM_OPERADOR') )->order('NM_OPERADOR'));
    }
	public function getOperador($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('ID_OPERADOR = ' . $id);
        if (! $row) {
            throw new Exception("N�o foi possivel encontrar a linha $id");
        }
        return $row->toArray();
    }
    public function getOperadorEdit($id){
    	$id = (int) $id;
    	// $row = $this->fetchRow("nome",null,'id = ' . $id);
    	$select= $select =$this->_db->select()
    	->from(array('o' => 'TB_OPERADOR'),array("*",'DT_NASCIMENTO' => new Zend_Db_Expr("DATE_FORMAT(o.DT_NASCIMENTO,'%d/%m/%Y')")))
    	->where('ID_OPERADOR ='.$id);
    	$row = $this->getAdapter()->fetchRow($select);
    	if (! $row) {
    		throw new Exception("NÃ£o foi possivel encontrar a linha $id");
    	}
    
    	 
    	// $row["fk_usuario"]=$usuarioHasReuniao->getParticipanteReuniaoCombo ($id);
    
    	return $row;
    }
    
    
    
    
    public function getOperadorComPerfil()
    {
    	
    	 $select =$this->_db->select()
             ->from(array('u' => 'TB_OPERADOR'))
             ->joinInner(array('p' => 'perfil'),('u.fk_perfil =p.id_perfil'),array('nome as nomePerfil'))
             
             ->where('u.ID_OPERADOR <>1');
  	   $result = $this->getAdapter()->fetchAll($select);
       return $result;
    }
    public function getOperadorImagem($id)
    {
    	
    	 $select =$this->_db->select()
             ->from(array('u' => 'TB_OPERADOR'))
             ->joinLeft(array('a' => 'arquivo'),('u.fk_arquivo =a.id_arquivo'),array('nome as nomeArquivo'))->order('a.id_arquivo desc')
             ->where('u.ID_OPERADOR ='. $id);
  	   $result = $this->getAdapter()->fetchRow($select);
  	  
       return $result["nomeArquivo"];
    }
    public function getAniversariantes()
    {
    	 
    	 $select =$this->_db->select()
             ->from(array('u' => 'TB_OPERADOR'),array("*",'PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(u.NM_OPERADOR,' ',1)"),'MES' => new Zend_Db_Expr("DATE_FORMAT(u.DT_NASCIMENTO,'%W')"),'DIA' => new Zend_Db_Expr("DATE_FORMAT(u.DT_NASCIMENTO,'%d')"),'DT_NASCIMENTO' => new Zend_Db_Expr("DATE_FORMAT(u.DT_NASCIMENTO,'%d/%m/%Y')")))
             ->joinLeft(array('a' => 'arquivo'),('u.FK_ARQUIVO =a.id_arquivo'),array('nome as nomeArquivo'))->order('a.id_arquivo desc')
             ->where('MONTH(DT_NASCIMENTO) = MOD(MONTH(CURDATE()), 12)')
             ->order('DAY(DT_NASCIMENTO ) ASC');
  	   $result = $this->getAdapter()->fetchAll($select);
  	  
       return $result;
       /*SELECT * FROM tb_operador WHERE MONTH(DT_NASCIMENTO) = MOD(MONTH(CURDATE()), 12)
order by DAY(DT_NASCIMENTO ) ASC*/
    }
    public function getOperadorProjeto($ID_PROJETO)
    {
    
    	$select =$this->_db->select()
    	->from(array('p' => 'TB_PROJETO'))
    	->joinLeft(array('po' => 'TB_PROJETO_OPERADOR'),('p.ID_PROJETO =po.FK_PROJETO')) 
    	->joinLeft(array('u' => 'TB_OPERADOR'),('u.ID_OPERADOR =po.FK_OPERADOR'),array("*",'PRIMEIRO_NOME' => new Zend_Db_Expr("Substring_index(u.NM_OPERADOR,' ',1)")))
        	->where('p.ID_PROJETO='.$ID_PROJETO);
    	//->order('DAY(DT_NASCIMENTO ) ASC');
    		//Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
    	$result = $this->getAdapter()->fetchAll($select);
    		
    	return $result;
    	/*SELECT * FROM tb_operador WHERE MONTH(DT_NASCIMENTO) = MOD(MONTH(CURDATE()), 12)
    	 order by DAY(DT_NASCIMENTO ) ASC*/
    }
    public function getOperadores()
    {
       $TB_OPERADOR = new Application_Model_DbTable_Operador();
       return $TB_OPERADOR->getAdapter()->fetchPairs( $TB_OPERADOR->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'NM_OPERADOR') )->where('ID_OPERADOR <>1')->order('NM_OPERADOR'));
    }
    public function getOperadorIndividualCombo($ID_OPERADOR)
    {
    	//$select=$this->_db->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'NM_OPERADOR') )->where("ID_OPERADOR ='$ID_OPERADOR'")->order('NM_OPERADOR');
       //Zend_Registry::get('logger')->log( "getOperadorIndividualCombo", Zend_Log::INFO);
       //Zend_Registry::get('logger')->log( $select->__toString(), Zend_Log::INFO);
       $TB_OPERADOR = new Application_Model_DbTable_Operador();
       return $TB_OPERADOR->getAdapter()->fetchPairs( $TB_OPERADOR->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'NM_OPERADOR') )->where("ID_OPERADOR ='$ID_OPERADOR'")->order('NM_OPERADOR'));
    }
    public function getOperadorNegocio()
    {
       $TB_OPERADOR = new Application_Model_DbTable_Operador();
       return $TB_OPERADOR->getAdapter()->fetchPairs( $TB_OPERADOR->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'nome') )->where('fk_perfil =4')->order('nome'));
    }
    public function getOperadorGerente()
    {
       $TB_OPERADOR = new Application_Model_DbTable_Operador();
       return $TB_OPERADOR->getAdapter()->fetchPairs( $TB_OPERADOR->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'nome') )->where('fk_perfil =5')->order('nome'));
    }
	public function getOperadorProdutor()
    {
       $TB_OPERADOR = new Application_Model_DbTable_Operador();
       return $TB_OPERADOR->getAdapter()->fetchPairs( $TB_OPERADOR->select()->from( 'TB_OPERADOR', array('ID_OPERADOR', 'nome') )->where('fk_perfil =2')->order('nome'));
    }
    public function addOperador($nome, $senha, $email, $fk_perfil, $login,$fk_arquivo)
    {
    	$senha=sha1($senha);//criptografia da senha
        $data = array('nome' => $nome, 'senha' => $senha, 'email' => $email, 'fk_perfil' => $fk_perfil,'login'=>$login,'fk_arquivo'=>$fk_arquivo);
        $this->insert($data);
    }
    
    
     public function addOperadorSemFoto($NM_OPERADOR,$DS_TELEFONE_PESSOAL,$DS_TELEFONE_BIOS,$DS_EMAIL_PESSOAL,$DS_EMAIL_BIOS,$DS_ENDERECO,$DS_BAIRRO,$NR_CEP,$NR_CPF,$NR_IDENTIDADE,$DT_NASCIMENTO,$DS_REGISTRO_PROFISSIONAL,$DS_CTF_IBAM,$DS_SKYPE,$DS_LOGIN,$DS_SENHA,$NM_CONTATO_FAMILIAR,$NR_TELEFONE_CONTATO_FAMILIAR,$FK_PERFIL)
    {
    	$DS_SENHA=sha1($DS_SENHA);//criptografia da senha
        $data = array('NM_OPERADOR' => $NM_OPERADOR, 'DS_TELEFONE_PESSOAL' => $DS_TELEFONE_PESSOAL, 'DS_TELEFONE_BIOS' => $DS_TELEFONE_BIOS, 'DS_EMAIL_PESSOAL' => $DS_EMAIL_PESSOAL,'DS_EMAIL_BIOS'=>$DS_EMAIL_BIOS,
        		'DS_ENDERECO' => $DS_ENDERECO,'DS_BAIRRO' => $DS_BAIRRO,'NR_CEP' => $NR_CEP,'NR_CPF' => $NR_CPF,'NR_IDENTIDADE' => $NR_IDENTIDADE,'DT_NASCIMENTO' => $DT_NASCIMENTO,'DS_REGISTRO_PROFISSIONAL' => $DS_REGISTRO_PROFISSIONAL,'DS_CTF_IBAM' => $DS_CTF_IBAM,'DS_SKYPE' => $DS_SKYPE,'DS_LOGIN' => $DS_LOGIN,'DS_SENHA' => $DS_SENHA,'NM_CONTATO_FAMILIAR' => $NM_CONTATO_FAMILIAR
        		,'NR_TELEFONE_CONTATO_FAMILIAR' => $NR_TELEFONE_CONTATO_FAMILIAR,'FK_PERFIL' => $FK_PERFIL);
        $this->insert($data);
    }
    public function updateOperador($ID_OPERADOR,$NM_OPERADOR,$DS_TELEFONE_PESSOAL,$DS_TELEFONE_BIOS,$DS_EMAIL_PESSOAL,$DS_EMAIL_BIOS,$DS_ENDERECO,$DS_BAIRRO,$NR_CEP,$NR_CPF,$NR_IDENTIDADE,$DT_NASCIMENTO,$DS_REGISTRO_PROFISSIONAL,$DS_CTF_IBAM,$DS_SKYPE,$DS_LOGIN,$DS_SENHA,$NM_CONTATO_FAMILIAR,$NR_TELEFONE_CONTATO_FAMILIAR,$FK_PERFIL,$FK_ARQUIVO)
    {
    	$senha=sha1($senha);//criptografia da senha
    	if($id=="1"){
    		$fk_perfil=1;
    	}
        $data = array('ID_OPERADOR'=>$id,'nome' => $nome, 'senha' => $senha, 'email' => $email, 'fk_perfil' => $fk_perfil,'fk_arquivo'=>$fk_arquivo);
         
       $this->update($data, 'ID_OPERADOR = ' . (int) $id);
    }
	public function updateOperadorSemArquivo ($ID_OPERADOR,$NM_OPERADOR,$DS_TELEFONE_PESSOAL,$DS_TELEFONE_BIOS,$DS_EMAIL_PESSOAL,$DS_EMAIL_BIOS,$DS_ENDERECO,$DS_BAIRRO,$NR_CEP,$NR_CPF,$NR_IDENTIDADE,$DT_NASCIMENTO,$DS_REGISTRO_PROFISSIONAL,$DS_CTF_IBAM,$DS_SKYPE,$NM_CONTATO_FAMILIAR,$NR_TELEFONE_CONTATO_FAMILIAR,$FK_PERFIL)
    {
    	//$DS_SENHA=sha1($DS_SENHA);//criptografia da senha
    	if($ID_OPERADOR=="1"){
    		$FK_PERFIL=1;
    	}
        $data = array('ID_OPERADOR'=>$ID_OPERADOR,'NM_OPERADOR' => $NM_OPERADOR, 'DS_TELEFONE_PESSOAL' => $DS_TELEFONE_PESSOAL, 'DS_TELEFONE_BIOS' => $DS_TELEFONE_BIOS, 'DS_EMAIL_PESSOAL' => $DS_EMAIL_PESSOAL,'DS_EMAIL_BIOS'=>$DS_EMAIL_BIOS,
        		'DS_ENDERECO' => $DS_ENDERECO,'DS_BAIRRO' => $DS_BAIRRO,'NR_CEP' => $NR_CEP,'NR_CPF' => $NR_CPF,'NR_IDENTIDADE' => $NR_IDENTIDADE,'DT_NASCIMENTO' => $DT_NASCIMENTO,'DS_REGISTRO_PROFISSIONAL' => $DS_REGISTRO_PROFISSIONAL,'DS_CTF_IBAM' => $DS_CTF_IBAM,'DS_SKYPE' => $DS_SKYPE,'NM_CONTATO_FAMILIAR' => $NM_CONTATO_FAMILIAR
        		,'NR_TELEFONE_CONTATO_FAMILIAR' => $NR_TELEFONE_CONTATO_FAMILIAR,'FK_PERFIL' => $FK_PERFIL);
         
       $this->update($data, 'ID_OPERADOR = ' . (int) $ID_OPERADOR);
    }	
	public function updateAlterarPerfil ($id,$nome,$senha,$email,$fk_arquivo)
    {
    	$senha=sha1($senha);//criptografia da senha
    	if($id=="1"){
    		$fk_perfil=1;
    	}
        $data = array('ID_OPERADOR'=>$id,'nome' => $nome, 'senha' => $senha, 'email' => $email,'fk_arquivo'=>$fk_arquivo);
         
       $this->update($data, 'ID_OPERADOR = ' . (int) $id);
    }
    public function updateAlterarPerfilSemFoto ($id,$nome,$senha,$email)
    {
    	$senha=sha1($senha);//criptografia da senha
    	if($id=="1"){
    		$fk_perfil=1;
    	}
        $data = array('ID_OPERADOR'=>$id,'nome' => $nome, 'senha' => $senha, 'email' => $email);
         
       $this->update($data, 'ID_OPERADOR = ' . (int) $id);
    }
    public function deleteOperador($id)
    {
        $this->delete('ID_OPERADOR =' . (int) $id);
    }


}

