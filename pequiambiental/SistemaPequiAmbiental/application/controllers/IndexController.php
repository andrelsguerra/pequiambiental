<?php

//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', true);
//header("Content-Type: text/html; charset=ISO-8859-1", true);
//header ('Content-type: text/html; charset=UTF-8'); 
header('Content-type: text/html; charset=UTF-8') ;
class IndexController extends Zend_Controller_Action {

    public $user;
    public $urlCompleta = 'http:\\\www.tm1.com.br\\dotz\\upload\\';
    public $session;
    public $log;
    public $caminhoPastaFtp;
    public $classeGenerica;

    public function init() {
    	
    	
    	
    	$this->classeGenerica=$this->_helper->getHelper('classeGenerica');
    	
        $this->caminhoPastaFtp = BASE_PATH . '/uploadXml/';
       // $this->log = new Application_Model_DbTable_LogArquivosGerados();
        $this->session = new Zend_Session_Namespace();

        if ($this->session->urlAtual <> $_SERVER['REQUEST_URI']) {
            $this->session->urlAnterior = $this->session->urlAtual;
            $this->session->urlAtual = $_SERVER['REQUEST_URI'];
        }
        $url = Zend_Controller_Front::getInstance()->getRequest()->getRequestUri();
       // Zend_Registry::get('logger')->log($this->session->urlAnterior, Zend_Log::INFO);
       // Zend_Registry::get('logger')->log($this->session->urlAtual, Zend_Log::INFO);
        if (!Zend_Auth::getInstance()->hasIdentity()) {

            $controlador2 = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
            $index2 = Zend_Controller_Front::getInstance()->getRequest()->getActionName();
            if ($controlador2 != 'index' || $index2 != 'login') {
                // return $this->_helper->redirector('login');
            }
        } else {

            $usuarioLogado = new Aplicacao_Plugin_Auth();
            $this->view->user = $usuarioLogado->_auth->getIdentity();
            $this->user = $this->view->user;
            $this->view->fk_perfil = $this->user->getFKPerfil();
            $this->view->usuario = $this->user->getUserName();
            
            $menu = new Application_Model_DbTable_MenuPermissaoPerfil();
            
            $listaMenuProjeto=$menu->retornaMenu(2,$this->user->getFKPerfil());
            $this->view->listaMenuProjeto=$listaMenuProjeto;
            
            $listaMenuServicoPcp=$menu->retornaMenu(3,$this->user->getFKPerfil());
            $this->view->listaMenuServicoPcp=$listaMenuServicoPcp;
            
            $listaMenuPlanoAcao=$menu->retornaMenu(4,$this->user->getFKPerfil());
            $this->view->listaMenuPlanoAcao=$listaMenuPlanoAcao;
            
            $listaMenuContato=$menu->retornaMenu(5,$this->user->getFKPerfil());
            $this->view->listaMenuContato=$listaMenuContato;
            
            $listaMenuOperador=$menu->retornaMenu(6,$this->user->getFKPerfil());
            $this->view->listaMenuOperador=$listaMenuOperador;
            
            $listaMenuConfiguracao=$menu->retornaMenu(7,$this->user->getFKPerfil());
            $this->view->listaMenuConfiguracao=$listaMenuConfiguracao;
            
            $listaMenuNoticia=$menu->retornaMenu(8,$this->user->getFKPerfil());
            $this->view->listaMenuNoticia=$listaMenuNoticia;
            
            
            
            $listaMenuCliente=$menu->retornaMenu(10,$this->user->getFKPerfil());
            $this->view->listaMenuCliente=$listaMenuCliente;
            Zend_Registry::get('logger')->log("antes ", Zend_Log::INFO);
            Zend_Registry::get('logger')->log($listaMenuNoticia, Zend_Log::INFO);
        }
        
        if(isset($_POST['Voltar'])){
        	$this->_redirect($this->session->urlAnterior, array('prependBase' => false));
        	exit();
        }
        
       
         
        
    }

    public function indexAction() {
        // resgata o helper, retornando uma instância do helper

		$mes = $this->classeGenerica->retornaMesAtual();
       
		
		$mesExtenso=$this->classeGenerica->retornaMesExtenso( $mes );
		$this->view->mes=$mesExtenso;
		
		
		$operador = new Application_Model_DbTable_Operador();
		$listaAniversarintes=$operador->getAniversariantes();
		$this->view->listaAniversarintes=$listaAniversarintes;
		
		$noticia = new Application_Model_DbTable_Noticia();
		$listaNoticias=$noticia->getUltimasNoticias(1);//busca noticias 
		$this->view->listaNoticias=$listaNoticias;
		
		//Zend_Registry::get('logger')->log( "teste", Zend_Log::INFO);
		
		$projeto = new Application_Model_DbTable_Projeto();
		$this->view->listaProjetos = $projeto->getUltimasProjeto();
		//Zend_Registry::get('logger')->log( $this->view->listaProjetos, Zend_Log::INFO);
		//Zend_Registry::get('logger')->log( "depois", Zend_Log::INFO);
		
		
		
		
		$pcpsServicos= new Application_Model_DbTable_Servico();
    	$this->view->pcpsServicos = $pcpsServicos->getPcpsServicos($this->user->getId());
    	Zend_Registry::get('logger')->log( $this->view->pcpsServicos, Zend_Log::INFO);
    }

    public function deleteOperadorAction() {


        $id = $this->_getParam('id', 0);
        $operador= new Application_Model_DbTable_Operador();
        $this->view->operador = $operador->getOperador($id);
    }

    public function editOperadorAction() {
        // action body
        $form = new Application_Form_Operador();
        $form->submit->setLabel('Salvar');
       
        $form->getElement("DS_LOGIN")->setAttrib("disable", array(1));
        $form->getElement("DS_LOGIN")->setRequired(false);
        $form->getElement("DS_SENHA")->setAttrib("disable", array(1));
        $form->getElement("DS_SENHA")->setRequired(false);
        $form->getElement("REPETIR_SENHA")->setAttrib("disable", array(1));
        $form->getElement("REPETIR_SENHA")->setRequired(false);
        //$form->removeElement("DS_SENHA");
        //$form->removeElement("REPETIR_SENHA");
        $this->view->form = $form;
      
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
            	
            	
            	$ID_OPERADOR = $form->getValue('ID_OPERADOR');
            	$NM_OPERADOR= $form->getValue('NM_OPERADOR');
            	$DS_TELEFONE_PESSOAL= $form->getValue('DS_TELEFONE_PESSOAL');
            	$DS_TELEFONE_BIOS= $form->getValue('DS_TELEFONE_BIOS');
            	$DS_EMAIL_PESSOAL= $form->getValue('DS_EMAIL_PESSOAL');
            	$DS_EMAIL_BIOS= $form->getValue('DS_EMAIL_BIOS');
            	$DS_ENDERECO= $form->getValue('DS_ENDERECO');
            	$DS_BAIRRO= $form->getValue('DS_BAIRRO');
            	$NR_CEP= $form->getValue('NR_CEP');
            	$NR_CPF= $form->getValue('NR_CPF');
            	$NR_IDENTIDADE= $form->getValue('NR_IDENTIDADE');
            	 
            	//data de nascimento
            	$DT_NASCIMENTO= $form->getValue('DT_NASCIMENTO');
            	$data_cadastro =new Zend_Date($DT_NASCIMENTO);
            	$DT_NASCIMENTO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
            	 
            	$DS_REGISTRO_PROFISSIONAL= $form->getValue('DS_REGISTRO_PROFISSIONAL');
            	$DS_CTF_IBAM= $form->getValue('DS_CTF_IBAM');
            	$DS_SKYPE=$form->getValue('DS_SKYPE');
            	$DS_LOGIN=$form->getValue('DS_LOGIN');
            	//$DS_SENHA= $form->getValue('DS_SENHA');
            	//$REPETIR_SENHA= $form->getValue('REPETIR_SENHA');
            	$NM_CONTATO_FAMILIAR= $form->getValue('NM_CONTATO_FAMILIAR');
            	$NR_TELEFONE_CONTATO_FAMILIAR= $form->getValue('NR_TELEFONE_CONTATO_FAMILIAR');
            	$FK_PERFIL= $form->getValue('FK_PERFIL');
            	$FK_ARQUIVO= $form->getValue('FK_ARQUIVO');
            	 
            	$operador = new Application_Model_DbTable_Operador();
            	 
            	//try {
            		//if ($DS_SENHA != $REPETIR_SENHA)
            			//throw new Exception(
            					//"Atenção senha e repetir senha tem que ser iguais");
            			try {
            				$operador->updateOperadorSemArquivo($ID_OPERADOR, $NM_OPERADOR, $DS_TELEFONE_PESSOAL, $DS_TELEFONE_BIOS, $DS_EMAIL_PESSOAL, $DS_EMAIL_BIOS, $DS_ENDERECO, $DS_BAIRRO, $NR_CEP, $NR_CPF, $NR_IDENTIDADE, $DT_NASCIMENTO, $DS_REGISTRO_PROFISSIONAL, $DS_CTF_IBAM, $DS_SKYPE, $NM_CONTATO_FAMILIAR, $NR_TELEFONE_CONTATO_FAMILIAR, $FK_PERFIL);
            				$this->view->erro = 0;
            				$this->view->mensagem = "Alterado com sucesso";
            				//$form->reset();
            			} // catch (pega exceÃƒÂ§ÃƒÂ£o)
            			catch (Exception $e) {
            				$this->view->erro = 1;
            				$this->view->mensagemExcecao = $e->getMessage();
            			}
            	//} catch (Exception $erro) {
            	//	Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
            		//$this->view->mensagem = $erro->getMessage();
            		//$this->view->erro = 1;
            	//}
            	
            	/*
                $id = (int) $form->getValue('id_usuario');
                $nome = $form->getValue('nome');
                $email = $form->getValue('email');
                $senha = $form->getValue('senha');
                $jobrole = $form->getValue('jobrole');
                $cellphone = $form->getValue('cellphone');
                $repetirSenha = $form->getValue('repetirSenha');
                $fk_perfil = $form->getValue('fk_perfil');
                $fk_empresa = $form->getValue('fk_empresa');
                $usuarios = new Application_Model_DbTable_Usuario();
                $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                $imageAdapter->setDestination(BASE_PATH . '/upload');
                $_FILES['fileUpload']['name'] = "teste.jpg";
                $nomedaimagem = $_FILES['fileUpload']['name'];
                $fk_arquivo = "-1";
                $extensao = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
                    Zend_Registry::get('logger')->log("Entrou if is upload", Zend_Log::INFO);
                    $nomeArquivo = md5(uniqid()) . '.' . $extensao;
                    $extension = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                    $imageAdapter->addFilter('Rename', $nomeArquivo);
                    if (!$imageAdapter->receive('fileUpload')) {
                        $messages = $imageAdapter->getMessages['fileUpload'];
                        //A Imagem NÃƒÂ£o Foi Recebida Corretamente
                        Zend_Registry::get('logger')->log("A Imagem NÃ£o Foi Recebida Corretamente", Zend_Log::INFO);
                    } else {
                        //Arquivo Enviado Com Sucesso
                        //Realize As AÃƒÂ§ÃƒÂµes NecessÃƒÂ¡rias Com Os Dados
                        Zend_Registry::get('logger')->log("A Imagem  Recebida Corretamente", Zend_Log::INFO);


                        $arquivo = new Application_Model_DbTable_Arquivo();
                        $fk_arquivo = $arquivo->addArquivo($nomeArquivo, $extensao);
                        Zend_Registry::get('logger')->log("Id arquivo =" . $fk_arquivo, Zend_Log::INFO);
                    }
                } else {

                    Zend_Registry::get('logger')->log("O Arquivo NÃ£o Foi Enviado Corretamente", Zend_Log::INFO);
                    //O Arquivo NÃƒÂ£o Foi Enviado Corretamente
                }


                try {
                    if ($repetirSenha != $senha)
                        throw new Exception(
                        "AtenÃƒÂ§ÃƒÂ£o senha e repetir senha tem que ser iguais");

                    try {
                        if ($fk_arquivo == "-1") {
                            $usuarios->updateUsuarioSemArquivo($id, $nome, $senha, $email, $fk_perfil, $fk_empresa, $jobrole, $cellphone);
                        } else {
                            $usuarios->updateUsuario($id, $nome, $senha, $email, $fk_perfil, $fk_empresa, $fk_arquivo, $jobrole, $cellphone);
                        }


                        $this->view->mensagem = "Atualizado com sucesso";
                        $this->view->erro = 0;

                        //$this->_helper->redirector('lista-usuario');
                    } // catch (pega exceÃƒÂ§ÃƒÂ£o)
                    catch (Exception $e) {
                        $this->view->mensagem = "Atualizar usuÃ¡rio";
                        $this->view->erro = 1;
                        $this->view->mensagemExcecao = $e->getMessage();
                        //  echo ($e->getCode()."teste".$e->getMessage() );
                    }
                } catch (Exception $e) {
                    // echo  ;
                    $this->view->mensagem = "Atualizar usuÃ¡rio";
                    $this->view->erro = 1;
                    $this->view->mensagemExcecao = $e->getMessage();
                    //exit();
                }*/
            } else {
            
            	$form->populate($formData);
            	$arrMessages = $form->getMessages();
            	foreach ($arrMessages as $field => $arrErrors) {
            		$this->view->erro = 1;
            		$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
            	}
            }
        } else {
            $id = $this->_getParam('id', 0);

            if ($id > 0) {
                $operador= new Application_Model_DbTable_Operador();
                Zend_Registry::get('logger')->log("Id usuario =" . $id, Zend_Log::INFO);
                $obj=$operador->getOperadorEdit($id);
                $form->populate($obj);
                Zend_Registry::get('logger')->log($obj, Zend_Log::INFO);
            }
        }
    }

    public function addOperadorAction() {
        // action body
        $form = new Application_Form_Operador();
        $form->submit->setLabel('Adicionar usuário');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
            	$ID_OPERADOR = $form->getValue('ID_OPERADOR');
            	$NM_OPERADOR= $form->getValue('NM_OPERADOR');
            	$DS_TELEFONE_PESSOAL= $form->getValue('DS_TELEFONE_PESSOAL');
            	$DS_TELEFONE_BIOS= $form->getValue('DS_TELEFONE_BIOS');
            	$DS_EMAIL_PESSOAL= $form->getValue('DS_EMAIL_PESSOAL');
            	$DS_EMAIL_BIOS= $form->getValue('DS_EMAIL_BIOS');
            	$DS_ENDERECO= $form->getValue('DS_ENDERECO');
            	$DS_BAIRRO= $form->getValue('DS_BAIRRO');
            	$NR_CEP= $form->getValue('NR_CEP');
            	$NR_CPF= $form->getValue('NR_CPF');
            	$NR_IDENTIDADE= $form->getValue('NR_IDENTIDADE');
            	
            	//data de nascimento
            	$DT_NASCIMENTO= $form->getValue('DT_NASCIMENTO');
            	$data_cadastro =new Zend_Date($DT_NASCIMENTO);
            	$DT_NASCIMENTO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
            	
            	$DS_REGISTRO_PROFISSIONAL= $form->getValue('DS_REGISTRO_PROFISSIONAL');
            	$DS_CTF_IBAM= $form->getValue('DS_CTF_IBAM');
            	$DS_SKYPE=$form->getValue('DS_SKYPE');
            	$DS_LOGIN=$form->getValue('DS_LOGIN');
            	$DS_SENHA= $form->getValue('DS_SENHA');
            	$REPETIR_SENHA= $form->getValue('REPETIR_SENHA');
            	$NM_CONTATO_FAMILIAR= $form->getValue('NM_CONTATO_FAMILIAR');
            	$NR_TELEFONE_CONTATO_FAMILIAR= $form->getValue('NR_TELEFONE_CONTATO_FAMILIAR');
            	$FK_PERFIL= $form->getValue('FK_PERFIL');
            	$FK_ARQUIVO= $form->getValue('FK_ARQUIVO');
            	
            	$operador = new Application_Model_DbTable_Operador();
            	
            	try {
            		if ($DS_SENHA != $REPETIR_SENHA)
            			throw new Exception(
            					"Atenção senha e repetir senha tem que ser iguais");
            			try {
            				$operador->addOperadorSemFoto($NM_OPERADOR, $DS_TELEFONE_PESSOAL, $DS_TELEFONE_BIOS, $DS_EMAIL_PESSOAL, $DS_EMAIL_BIOS, $DS_ENDERECO, $DS_BAIRRO, $NR_CEP, $NR_CPF, $NR_IDENTIDADE, $DT_NASCIMENTO, $DS_REGISTRO_PROFISSIONAL, $DS_CTF_IBAM, $DS_SKYPE, $DS_LOGIN, $DS_SENHA, $NM_CONTATO_FAMILIAR, $NR_TELEFONE_CONTATO_FAMILIAR, $FK_PERFIL);
            		    	$this->view->erro = 0;
            				$this->view->mensagem = "Adicionado com sucesso";
            				$form->reset();
            			} // catch (pega exceÃƒÂ§ÃƒÂ£o)
            			catch (Exception $e) {
            				$this->view->erro = 1;
            				if ($e->getCode() == "23000") {
            					$this->view->mensagem = "Login existe no sistema.Cadastre outro login";
            				}
            				$this->view->mensagemExcecao = $e->getMessage();
            			}
            	} catch (Exception $erro) {
            		Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
            		$this->view->mensagem = $erro->getMessage();
            		$this->view->erro = 1;
            	}
            	
            
               /* $usuarios = new Application_Model_DbTable_Usuario();

                $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                $imageAdapter->setDestination(BASE_PATH . '/upload');


                Zend_Registry::get('logger')->log("is_uploaded_file", Zend_Log::INFO);
                //$arquivo=$form->getValues('fileUpload');
                $_FILES['fileUpload']['name'] = "teste.jpg";
                Zend_Registry::get('logger')->log($_FILES['fileUpload'], Zend_Log::INFO);
                $nomedaimagem = $_FILES['fileUpload']['name'];
                $fk_arquivo = "";
                $extensao = pathinfo($nomedaimagem, PATHINFO_EXTENSION);*/

                /*if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
                    Zend_Registry::get('logger')->log("Entrou if is upload", Zend_Log::INFO);
                    //$filename = $imageAdapter->getFileName('fileUpload');
                    $nomeArquivo = md5(uniqid()) . '.' . $extensao;
                    //$filename  = pathinfo($nomedaimagem, PATHINFO_FILENAME);
                    $extension = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                    $imageAdapter->addFilter('Rename', $nomeArquivo);
                    if (!$imageAdapter->receive('fileUpload')) {
                        $messages = $imageAdapter->getMessages['fileUpload'];
                        //A Imagem NÃƒÂ£o Foi Recebida Corretamente
                        Zend_Registry::get('logger')->log("A Imagem NÃ£o Foi Recebida Corretamente", Zend_Log::INFO);
                        try {
                            Zend_Registry::get('logger')->log("fk_arquivo" . $fk_arquivo, Zend_Log::INFO);
                            $usuarios->addUsuarioSemFoto($nome, $senha, $email, $fk_perfil, $login);
                            $this->view->mensagem = "Cadastrado com sucesso";
                            $this->view->erro = 0;
                        } catch (Exception $e) {
                            $this->view->mensagem = "Login $login jÃ¡ existe, cadastrar novo login <br> " . $e->getMessage();

                            $this->view->erro = 1;
                            $this->view->mensagemExcecao = $e->getMessage();
                        }
                    } else {
                        //Arquivo Enviado Com Sucesso
                        //Realize As AÃƒÂ§ÃƒÂµes NecessÃƒÂ¡rias Com Os Dados
                        Zend_Registry::get('logger')->log("A Imagem  Recebida Corretamente", Zend_Log::INFO);



                        try {
                            if ($repetirSenha != $senha)
                                throw new Exception(
                                "AtenÃ§Ã£o senha e repetir senha tem que ser iguais");
                            try {
                                $arquivo = new Application_Model_DbTable_Arquivo();
                                $fk_arquivo = $arquivo->addArquivo($nomeArquivo, $extensao);
                                $usuarios->addUsuario($nome, $senha, $email, $fk_perfil, $login, $fk_arquivo);
                                $this->view->mensagem = "Cadastrado com sucesso";
                                $this->view->erro = 0;
                                $form->reset();
                            } // catch (pega exceÃƒÂ§ÃƒÂ£o)
                            catch (Exception $e) {
                                $this->view->erro = 1;
                                if ($e->getCode() == "23000") {
                                    $this->view->mensagem = "Login existe no sistema.Cadastre outro login";
                                }
                                $this->view->mensagemExcecao = $e->getMessage();
                            }
                        } catch (Exception $e) {
                            $this->view->mensagem = " ";
                            $this->view->erro = 1;
                            $this->view->mensagemExcecao = $e->getMessage();
                        }
                    }
                } else {

                    Zend_Registry::get('logger')->log("O Arquivo NÃ£o Foi Enviado Corretamente", Zend_Log::INFO);
                    try {
                        Zend_Registry::get('logger')->log("fk_arquivo" . $fk_arquivo, Zend_Log::INFO);
                        $usuarios->addUsuarioSemFoto($nome, $senha, $email, $fk_perfil, $login);
                        $this->view->mensagem = "Cadastrado com sucesso";
                        $this->view->erro = 0;
                        $form->reset();
                    } catch (Exception $e) {
                        $this->view->mensagem = "Login $login jÃ¡ existe, cadastrar novo login  ";

                        $this->view->erro = 1;
                        $this->view->mensagemExcecao = $e->getMessage();
                    }
                }*/
            } else {
            	Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
            	$form->populate($formData);
            	$arrMessages = $form->getMessages();
            	foreach ($arrMessages as $field => $arrErrors) {
            		$this->view->erro = 1;
            		$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
            	}
            }
        }
    }

    public function listaOperadorAction() {
        // action body
        $operador = new Application_Model_DbTable_Operador();
        Zend_Registry::get('logger')->log($_POST, Zend_Log::INFO);
 

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
                $id = $this->getRequest()->getPost('ID_OPERADOR');
               
                try {
                    $operador->deleteOperador($id);

                    $this->view->mensagem = "Excluído com sucesso";
                    $this->view->erro = 0;
                } catch (Exception $e) {
                    $this->view->mensagem = $e->getCode() . " Deletar operador";
                    $this->view->erro = 1;
                    $this->view->mensagemExcecao = $e->getMessage();
                    
                }
            }
        }
        try {
            $this->view->operador = $operador->getOperadorComPerfil();
        } catch (Exception $e) {
            $this->view->mensagem = "Operador nao encontrado";
            $this->view->erro = 1;
            $this->view->mensagemExcecao = $e->getMessage();
        }
    }
    public function listaOperadorSimplesAction() {
    	// action body
    	$operador = new Application_Model_DbTable_Operador();
    	Zend_Registry::get('logger')->log($_POST, Zend_Log::INFO);
    
    
    	/*if ($this->getRequest()->isPost()) {
    		$del = $this->getRequest()->getPost('del');
    		if ($del == 'Sim') {
    			Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    			$id = $this->getRequest()->getPost('ID_OPERADOR');
    			 
    			try {
    				$operador->deleteOperador($id);
    
    				$this->view->mensagem = "Excluído com sucesso";
    				$this->view->erro = 0;
    			} catch (Exception $e) {
    				$this->view->mensagem = $e->getCode() . " Deletar operador";
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    
    			}
    		}
    	}*/
    	try {
    		$this->view->operador = $operador->getOperadorComPerfil();
    	} catch (Exception $e) {
    		$this->view->mensagem = "Operador nao encontrado";
    		$this->view->erro = 1;
    		$this->view->mensagemExcecao = $e->getMessage();
    	}
    }

    public function loginAction() {
        $this->_helper->layout->setLayout('login');
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();
        $form = new Application_Form_Login();
        $this->view->form = $form;
        //Verifica se existem dados de POST
        Zend_Registry::get('logger')->log("antes verificacao loginAction", Zend_Log::INFO);
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            //FormulÃƒÂ¡rio corretamente preenchido?
            if ($form->isValid($data)) {
                $login = $form->getValue('login');
                $senha = $form->getValue('senha');
                Zend_Registry::get('logger')->log("senha valida", Zend_Log::INFO);
                try {
                    Application_Model_Auth::login($login, $senha);

                    //Redireciona para o Controller protegido
                    return $this->_helper->redirector->goToRoute(array('controller' => 'index'), null, true);
                } catch (Exception $e) {
                    //Dados invÃƒÂ¡lidos
                    //$this->_helper->FlashMessenger($e->getMessage());
                    $this->view->mensagem = "Usuário ou senha incorreto";
                    $this->view->erro = 1;
                    $this->view->mensagemExcecao = $e->getMessage();
                    //$this->_redirect('/index/login');
                }
            } else {
                //FormulÃƒÂ¡rio preenchido de forma incorreta
                $form->populate($data);
                Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
            }
        }
    }

    public function logoutAction() {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        return $this->_helper->redirector('index');
    }

    public function editAlterarPerfilAction() {
     // action body
        $form = new Application_Form_Operador();
        $form->submit->setLabel('Salvar');
       
        $form->getElement("DS_LOGIN")->setAttrib("disable", array(1));
        $form->getElement("DS_LOGIN")->setRequired(false);
        //$form->getElement("DS_SENHA")->setAttrib("disable", array(1));
        //$form->getElement("DS_SENHA")->setRequired(false);
        //$form->getElement("REPETIR_SENHA")->setAttrib("disable", array(1));
        //$form->getElement("REPETIR_SENHA")->setRequired(false);
        //$form->removeElement("DS_SENHA");
        //$form->removeElement("REPETIR_SENHA");
        $this->view->form = $form;
      
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
            	
            	
            	$ID_OPERADOR = $form->getValue('ID_OPERADOR');
            	$NM_OPERADOR= $form->getValue('NM_OPERADOR');
            	$DS_TELEFONE_PESSOAL= $form->getValue('DS_TELEFONE_PESSOAL');
            	$DS_TELEFONE_BIOS= $form->getValue('DS_TELEFONE_BIOS');
            	$DS_EMAIL_PESSOAL= $form->getValue('DS_EMAIL_PESSOAL');
            	$DS_EMAIL_BIOS= $form->getValue('DS_EMAIL_BIOS');
            	$DS_ENDERECO= $form->getValue('DS_ENDERECO');
            	$DS_BAIRRO= $form->getValue('DS_BAIRRO');
            	$NR_CEP= $form->getValue('NR_CEP');
            	$NR_CPF= $form->getValue('NR_CPF');
            	$NR_IDENTIDADE= $form->getValue('NR_IDENTIDADE');
            	 
            	//data de nascimento
            	$DT_NASCIMENTO= $form->getValue('DT_NASCIMENTO');
            	$data_cadastro =new Zend_Date($DT_NASCIMENTO);
            	$DT_NASCIMENTO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
            	 
            	$DS_REGISTRO_PROFISSIONAL= $form->getValue('DS_REGISTRO_PROFISSIONAL');
            	$DS_CTF_IBAM= $form->getValue('DS_CTF_IBAM');
            	$DS_SKYPE=$form->getValue('DS_SKYPE');
            	$DS_LOGIN=$form->getValue('DS_LOGIN');
            	//$DS_SENHA= $form->getValue('DS_SENHA');
            	//$REPETIR_SENHA= $form->getValue('REPETIR_SENHA');
            	$NM_CONTATO_FAMILIAR= $form->getValue('NM_CONTATO_FAMILIAR');
            	$NR_TELEFONE_CONTATO_FAMILIAR= $form->getValue('NR_TELEFONE_CONTATO_FAMILIAR');
            	$FK_PERFIL= $form->getValue('FK_PERFIL');
            	$FK_ARQUIVO= $form->getValue('FK_ARQUIVO');
            	 
            	$operador = new Application_Model_DbTable_Operador();
            	 
            	//try {
            		//if ($DS_SENHA != $REPETIR_SENHA)
            			//throw new Exception(
            					//"Atenção senha e repetir senha tem que ser iguais");
            			try {
            				$operador->updateOperadorSemArquivo($ID_OPERADOR, $NM_OPERADOR, $DS_TELEFONE_PESSOAL, $DS_TELEFONE_BIOS, $DS_EMAIL_PESSOAL, $DS_EMAIL_BIOS, $DS_ENDERECO, $DS_BAIRRO, $NR_CEP, $NR_CPF, $NR_IDENTIDADE, $DT_NASCIMENTO, $DS_REGISTRO_PROFISSIONAL, $DS_CTF_IBAM, $DS_SKYPE, $NM_CONTATO_FAMILIAR, $NR_TELEFONE_CONTATO_FAMILIAR, $FK_PERFIL);
            				$this->view->erro = 0;
            				$this->view->mensagem = "Alterado com sucesso";
            				//$form->reset();
            			} // catch (pega exceÃƒÂ§ÃƒÂ£o)
            			catch (Exception $e) {
            				$this->view->erro = 1;
            				$this->view->mensagemExcecao = $e->getMessage();
            			}
            	//} catch (Exception $erro) {
            	//	Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
            		//$this->view->mensagem = $erro->getMessage();
            		//$this->view->erro = 1;
            	//}
            	
            	/*
                $id = (int) $form->getValue('id_usuario');
                $nome = $form->getValue('nome');
                $email = $form->getValue('email');
                $senha = $form->getValue('senha');
                $jobrole = $form->getValue('jobrole');
                $cellphone = $form->getValue('cellphone');
                $repetirSenha = $form->getValue('repetirSenha');
                $fk_perfil = $form->getValue('fk_perfil');
                $fk_empresa = $form->getValue('fk_empresa');
                $usuarios = new Application_Model_DbTable_Usuario();
                $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                $imageAdapter->setDestination(BASE_PATH . '/upload');
                $_FILES['fileUpload']['name'] = "teste.jpg";
                $nomedaimagem = $_FILES['fileUpload']['name'];
                $fk_arquivo = "-1";
                $extensao = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
                    Zend_Registry::get('logger')->log("Entrou if is upload", Zend_Log::INFO);
                    $nomeArquivo = md5(uniqid()) . '.' . $extensao;
                    $extension = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                    $imageAdapter->addFilter('Rename', $nomeArquivo);
                    if (!$imageAdapter->receive('fileUpload')) {
                        $messages = $imageAdapter->getMessages['fileUpload'];
                        //A Imagem NÃƒÂ£o Foi Recebida Corretamente
                        Zend_Registry::get('logger')->log("A Imagem NÃ£o Foi Recebida Corretamente", Zend_Log::INFO);
                    } else {
                        //Arquivo Enviado Com Sucesso
                        //Realize As AÃƒÂ§ÃƒÂµes NecessÃƒÂ¡rias Com Os Dados
                        Zend_Registry::get('logger')->log("A Imagem  Recebida Corretamente", Zend_Log::INFO);


                        $arquivo = new Application_Model_DbTable_Arquivo();
                        $fk_arquivo = $arquivo->addArquivo($nomeArquivo, $extensao);
                        Zend_Registry::get('logger')->log("Id arquivo =" . $fk_arquivo, Zend_Log::INFO);
                    }
                } else {

                    Zend_Registry::get('logger')->log("O Arquivo NÃ£o Foi Enviado Corretamente", Zend_Log::INFO);
                    //O Arquivo NÃƒÂ£o Foi Enviado Corretamente
                }


                try {
                    if ($repetirSenha != $senha)
                        throw new Exception(
                        "AtenÃƒÂ§ÃƒÂ£o senha e repetir senha tem que ser iguais");

                    try {
                        if ($fk_arquivo == "-1") {
                            $usuarios->updateUsuarioSemArquivo($id, $nome, $senha, $email, $fk_perfil, $fk_empresa, $jobrole, $cellphone);
                        } else {
                            $usuarios->updateUsuario($id, $nome, $senha, $email, $fk_perfil, $fk_empresa, $fk_arquivo, $jobrole, $cellphone);
                        }


                        $this->view->mensagem = "Atualizado com sucesso";
                        $this->view->erro = 0;

                        //$this->_helper->redirector('lista-usuario');
                    } // catch (pega exceÃƒÂ§ÃƒÂ£o)
                    catch (Exception $e) {
                        $this->view->mensagem = "Atualizar usuÃ¡rio";
                        $this->view->erro = 1;
                        $this->view->mensagemExcecao = $e->getMessage();
                        //  echo ($e->getCode()."teste".$e->getMessage() );
                    }
                } catch (Exception $e) {
                    // echo  ;
                    $this->view->mensagem = "Atualizar usuÃ¡rio";
                    $this->view->erro = 1;
                    $this->view->mensagemExcecao = $e->getMessage();
                    //exit();
                }*/
            } else {
            
            	$form->populate($formData);
            	$arrMessages = $form->getMessages();
            	foreach ($arrMessages as $field => $arrErrors) {
            		$this->view->erro = 1;
            		$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
            	}
            }
        } else {
            $id = $this->user->getId();

            if ($id > 0) {
                $operador= new Application_Model_DbTable_Operador();
                Zend_Registry::get('logger')->log("Id usuario =" . $id, Zend_Log::INFO);
                $obj=$operador->getOperadorEdit($id);
                $form->populate($obj);
                Zend_Registry::get('logger')->log($obj, Zend_Log::INFO);
            }
        }
    } 
    public function editProjetoAction() {
    	// action body
    	$form = new Application_Form_Projeto();
    	$form->submit->setLabel('Salvar projeto');
    	 
    	$this->view->form = $form;
    	$projeto=new Application_Model_DbTable_Projeto();
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		if ($form->isValid($formData)) {
    			
    			

    			try {
    				$ID_PROJETO=$form->getValue('ID_PROJETO');
					$NM_PROJETO=$form->getValue('NM_PROJETO');
					
					$DT_CADASTRO= $form->getValue('DT_CADASTRO');
            		$data_cadastro =new Zend_Date($DT_CADASTRO);
            		$DT_CADASTRO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
					
					$FK_AGENCIA_AMBIENTAL=$form->getValue('FK_AGENCIA_AMBIENTAL');
					$NR_CONTRATO=$form->getValue('NR_CONTRATO');
					$TX_OBSERVACAO=$form->getValue('TX_OBSERVACAO');
					$FK_CLIENTE=$form->getValue('FK_CLIENTE');
					$FK_STATUS_PROJETO=$form->getValue('FK_STATUS_PROJETO');
					$FL_ATIVO=1;
					$Fk_GESTOR=$form->getValue('Fk_GESTOR');
					$FK_TIPO_PROJETO=$form->getValue('FK_TIPO_PROJETO');
					$FK_INDICACAO=$form->getValue('FK_INDICACAO');
					
					$projeto-> updateProjeto ($ID_PROJETO, $NM_PROJETO, $DT_CADASTRO, $FK_AGENCIA_AMBIENTAL, $NR_CONTRATO, $TX_OBSERVACAO, $FK_CLIENTE, $FK_STATUS_PROJETO, $FL_ATIVO, $Fk_GESTOR, $FK_TIPO_PROJETO, $FK_INDICACAOO);
				
    
    				
    				$this->view->mensagem = "Atualizado com sucesso";
    				$this->view->erro = 0;
    				//$this->_helper->redirector('lista-usuario');
    			} // catch (pega exceÃƒÂ§ÃƒÂ£o)
    			catch (Exception $e) {
    				$this->view->mensagem = "Atualizar projeto";
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    				//  echo ($e->getCode()."teste".$e->getMessage() );
    			}
    
    		} else {
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	} else {
    		$id = $this->_getParam('id', 0);
    
    		if ($id > 0) {
    			
    			
    			$form->populate($projeto->getProjeto($id));
    		}
    	}
    }
    public function viewProjetoAction() {
    	// action body
    	$form = new Application_Form_Projeto();
    	
    	$form->submit->setLabel('Adicionar Projeto');
    	
    	foreach ($form->getElements() as $element) {
    		$element->setAttrib('disabled', true);
    		$element->setAttrib('readonly',true);
    	}
    	$this->view->form = $form;
    	$form->setAttrib("disable", array(1));
    	$projeto=new Application_Model_DbTable_Projeto();
    	if ($this->getRequest()->isPost()) {
    		} else {
    		$id = $this->_getParam('id', 0);
    
    		if ($id > 0) {
    			 
    			 
    			$form->populate($projeto->getProjeto($id));
    		}
    	}
    }
    public function deleteProjetoAction() {
    
    
    	$id = $this->_getParam('id', 0);
    	$projeto= new Application_Model_DbTable_Projeto();
    	$this->view->projeto = $projeto->getProjeto($id);
    }
    public function addProjetoAction(){
    	$form = new Application_Form_Projeto();
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		if ($form->isValid($formData)) {	
    			try {
    				
    				$projeto=new Application_Model_DbTable_Projeto();
    				//$ID_PROJETO=$form->getValue('ID_PROJETO');
					$NM_PROJETO=$form->getValue('NM_PROJETO');
					
					$DT_CADASTRO= $form->getValue('DT_CADASTRO');
            		$data_cadastro =new Zend_Date($DT_CADASTRO);
            		$DT_CADASTRO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
					
					$FK_AGENCIA_AMBIENTAL=$form->getValue('FK_AGENCIA_AMBIENTAL');
					$NR_CONTRATO=$form->getValue('NR_CONTRATO');
					$TX_OBSERVACAO=$form->getValue('TX_OBSERVACAO');
					$FK_CLIENTE=$form->getValue('FK_CLIENTE');
					$FK_STATUS_PROJETO=$form->getValue('FK_STATUS_PROJETO');
					$FL_ATIVO=1;
					$Fk_GESTOR=$form->getValue('Fk_GESTOR');
					$FK_TIPO_PROJETO=$form->getValue('FK_TIPO_PROJETO');
					$FK_INDICACAO=$form->getValue('FK_INDICACAO');
					
					$idNovoProjeto=$projeto->addProjeto( $NM_PROJETO, $DT_CADASTRO, $FK_AGENCIA_AMBIENTAL, $NR_CONTRATO, $TX_OBSERVACAO, $FK_CLIENTE, $FK_STATUS_PROJETO, $FL_ATIVO, $Fk_GESTOR, $FK_TIPO_PROJETO, $FK_INDICACAO);
						Zend_Registry::get('logger')->log("Novo projeto", Zend_Log::INFO);
					Zend_Registry::get('logger')->log($idNovoProjeto, Zend_Log::INFO);
					$projetoOperador= new Application_Model_DbTable_ProjetoOperador();
        			Zend_Registry::get('logger')->log($this->user->getId(), Zend_Log::INFO);
        			$projetoOperador->addProjetoOperador($idNovoProjeto, $this->user->getId());
					
					
    				$this->view->erro = 0;
    				$this->view->mensagem = "Adicionado com sucesso";
    			} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    		} else {
    			Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	}
    	
    }
    public function listaProjetoServicoAction(){
    	// action body
    	$projeto = new Application_Model_DbTable_Projeto();
    	$id = $this->_getParam('id', 0);
    	
    	if ($id > 0) {
    		
    
    	if ($this->getRequest()->isPost()) {
    		$del = $this->getRequest()->getPost('del');
    		if ($del == 'Sim') {
    			//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    			$id = $this->getRequest()->getPost('ID_SERVICO');
    				
    			try {
    				$servico->deleteServico($id);
    				$this->view->mensagem = "Excluído com sucesso";
    				$this->view->erro = 0;
    			} catch (Exception $e) {
    				$this->view->mensagem = $e->getCode() . " Deletar serviço";
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    
    			}
    		}
    	}
    	$this->view->projeto= $projeto->getProjeto($id);
    	$this->view->listaServicos= $projeto->getServicos($id);
    	Zend_Registry::get('logger')->log($this->view->listaServicos, Zend_Log::INFO);
    	Zend_Registry::get('logger')->log($this->view->projeto, Zend_Log::INFO);
    	
    	}else{
    		$this->view->mensagem ="Não existe projeto";
    		$this->view->erro = 1;
    		
    	}
    
    }
    public function listaProjetoClienteAction(){
    	// action body
    	$projeto = new Application_Model_DbTable_Projeto();
    	$id = $this->_getParam('id', 0);
    	 
    	if ($id > 0) {
    
    
    		if ($this->getRequest()->isPost()) {
    			$del = $this->getRequest()->getPost('del');
    			if ($del == 'Sim') {
    				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    				$id = $this->getRequest()->getPost('ID_SERVICO');
    
    				try {
    					$servico->deleteServico($id);
    					$this->view->mensagem = "Excluído com sucesso";
    					$this->view->erro = 0;
    				} catch (Exception $e) {
    					$this->view->mensagem = $e->getCode() . " Deletar serviço";
    					$this->view->erro = 1;
    					$this->view->mensagemExcecao = $e->getMessage();
    
    				}
    			}
    		}
    		$this->view->projeto= $projeto->getProjeto($id);
    		$this->view->listaServicos= $projeto->getServicos($id);
    		Zend_Registry::get('logger')->log($this->view->listaServicos, Zend_Log::INFO);
    		Zend_Registry::get('logger')->log($this->view->projeto, Zend_Log::INFO);
    		 
    	}else{
    		$this->view->mensagem ="Não existe projeto";
    		$this->view->erro = 1;
    
    	}
    
    }
    public function listaProjetoPcpAction(){
    	// action body
    	$projeto = new Application_Model_DbTable_Projeto();
    	$id = $this->_getParam('id', 0);
    	 
    	if ($id > 0) {
    
    
    		if ($this->getRequest()->isPost()) {
    			$del = $this->getRequest()->getPost('del');
    			if ($del == 'Sim') {
    				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    				$id = $this->getRequest()->getPost('ID_SERVICO');
    
    				try {
    					$servico->deleteServico($id);
    					$this->view->mensagem = "Excluído com sucesso";
    					$this->view->erro = 0;
    				} catch (Exception $e) {
    					$this->view->mensagem = $e->getCode() . " Deletar serviço";
    					$this->view->erro = 1;
    					$this->view->mensagemExcecao = $e->getMessage();
    
    				}
    			}
    		}
    		$this->view->projeto= $projeto->getProjeto($id);
    		$this->view->listaPcps= $projeto->getPcps($id);
    		Zend_Registry::get('logger')->log($this->view->listaServicos, Zend_Log::INFO);
    		Zend_Registry::get('logger')->log($this->view->projeto, Zend_Log::INFO);
    		 
    	}else{
    		$this->view->mensagem ="Não existe projeto";
    		$this->view->erro = 1;
    
    	}
    
    }
    public function deletePcpAction() {
    
    
    	$id = $this->_getParam('id', 0);
    	$pcp= new Application_Model_DbTable_Servico();
    	$this->view->pcp = $pcp->getServico($id);
    }
    
    public function listaPcpAction(){
    	// action body
    	$servico = new Application_Model_DbTable_Servico();
    
    
    
    	if ($this->getRequest()->isPost()) {
    		$del = $this->getRequest()->getPost('del');
    		if ($del == 'Sim') {
    			//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    			$id = $this->getRequest()->getPost('ID_SERVICO');
    				
    			try {
    				$servico->deletePcp($id);
    				$this->view->mensagem = "Excluído com sucesso";
    				$this->view->erro = 0;
    			} catch (Exception $e) {
    				$this->view->mensagem = $e->getCode() ." ".$e->getMessage();
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    
    			}
    		}
    	}
    
    	//$this->view->listaPcps= $servico->getPcps();
    	$this->view->listaPcps=  $servico->getPcpsOperador($this->user->getId());
    	Zend_Registry::get('logger')->log($this->view->listaPcps, Zend_Log::INFO);
    	
    	
    		
    
    }
    public function addPcpAction(){
    	//$form = new Application_Form_Pcp();
    	
    	try {
    		$form = new Application_Form_Pcp(array('OPERADOR' => $this->user->getId()));
    		$id_projeto = $this->_getParam('id_projeto', 0);
    		if ($id_projeto > 0) {
    			$formData["FK_PROJETO"]=$id_projeto;
    			$form->populate($formData);
    			$form->getElement("FK_PROJETO")->setAttrib("disable",true);
    			$form->getElement("FK_PROJETO")->setRequired(false);
    			
    		}
    		
    		
    	
    			
    	
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");
    	$this->view->form = $form;
    	$form->FL_VALIDAR_SERVICO->setValue(1);
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		if ($form->isValid($formData)) {
    			try {
    				//$ID_SERVICO=$form->getValue('ID_SERVICO');
    				$DS_SERVICO=$form->getValue('DS_SERVICO');
    				$FK_OPERADOR=$this->user->getId();
    				$NR_CARGA_HORARIA=$form->getValue('NR_CARGA_HORARIA');
    				$FK_TIPO_SERVICO=$form->getValue('FK_TIPO_SERVICO');
    
    				$DT_SERVICO= $form->getValue('DT_SERVICO');
    				$data_cadastro =new Zend_Date($DT_SERVICO);
    				$DT_SERVICO=$data_cadastro->get('YYYY-MM-dd');
    
    				if ($id_projeto > 0) {
    					$FK_PROJETO=$id_projeto;
    				}else{
    					$FK_PROJETO=$form->getValue('FK_PROJETO');
    				}
    				
    				
    				$FL_PCP=1;
    
    				$servico = new Application_Model_DbTable_Servico();
    				$servico->addServico($DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FK_PROJETO, $FL_PCP);
    				$form->reset();
    				$this->view->erro = 0;
    				$this->view->mensagem = "Adicionado com sucesso";
    				$form->FL_VALIDAR_SERVICO->setValue(1);
    			} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    		} else {
    			Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	}
    	} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    	 
    }
    public function editPcpAction(){
    	$form = new Application_Form_Pcp();
    	$form->submit->setLabel('Adicionar');
    	// action body
    	$servico = new Application_Model_DbTable_Servico();
    	//$form->removeElement("tabela_contratacao");
    	$form->getElement("FK_PROJETO")->setAttrib("disable",true);
    	$form->getElement("FK_PROJETO")->setRequired(false);
    	$this->view->form = $form;
    	$noticia = new Application_Model_DbTable_Noticia();
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		if ($form->isValid($formData)) {
    			Zend_Registry::get('logger')->log("antese", Zend_Log::INFO);
    			Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    			$ID_SERVICO=$form->getValue('ID_SERVICO');
    			$DS_SERVICO=$form->getValue('DS_SERVICO');
    			$FK_OPERADOR=$this->user->getId();
    			$NR_CARGA_HORARIA=$form->getValue('NR_CARGA_HORARIA');
    			$FK_TIPO_SERVICO=$form->getValue('FK_TIPO_SERVICO');
    
    			$DT_SERVICO= $form->getValue('DT_SERVICO');
    			$data_cadastro =new Zend_Date($DT_SERVICO);
    			$DT_SERVICO=$data_cadastro->get('YYYY-MM-dd');
    
    			$FK_PROJETO=$form->getValue('FK_PROJETO');
    			$FL_PCP=1;
    
    			try {
    				$servico->updateServicoSemProjeto($ID_SERVICO, $DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FL_PCP);
    					
    				$this->view->mensagem = "Atualizado com sucesso";
    				$this->view->erro = 0;
    				$id = $this->_getParam('id', 0);
		    		if ($id > 0) {
		    
		    			$form->populate($servico->getServico($id));
		    		}
		    		$form->populate($formData);
    				
    				//$this->_helper->redirector('lista-usuario');
    			} // catch (pega exceÃƒÂ§ÃƒÂ£o)
    			catch (Exception $e) {
    				$this->view->mensagem = "Atualizar notícia";
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    				//  echo ($e->getCode()."teste".$e->getMessage() );
    			}
    
    		} else {
    			$id = $this->_getParam('id', 0);
	    		if ($id > 0) {
	    
	    			$form->populate($servico->getServico($id));
	    		}
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	} else {
    		$id = $this->_getParam('id', 0);
    
    		if ($id > 0) {
    
    			$form->populate($servico->getServico($id));
    		}
    	}
    }
    
    
    public function deleteServicoAction() {
	
	
		$id = $this->_getParam('id', 0);
		$servico= new Application_Model_DbTable_Servico();
		$this->view->servico = $servico->getServico($id);
	}
	public function validarServicoAction() {
	
	
		$id = $this->_getParam('id', 0);
		$servico= new Application_Model_DbTable_Servico();
		$this->view->validarServico=0;
		$this->view->ID_SERVICO=0;
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				
				
				try {
					$id = $this->getRequest()->getPost('ID_SERVICO');
				 	$novoServico=$servico->getServicoAutomatico($id);
				 	// Zend_Registry::get('logger')->log($novoServico["DS_SERVICO"], Zend_Log::INFO);
				 	//Zend_Registry::get('logger')->log($novoServico, Zend_Log::INFO);
				 
					$this->view->ID_SERVICO= $servico->addServico($novoServico["DS_SERVICO"], $novoServico["FK_OPERADOR"], $novoServico["NR_CARGA_HORARIA"], $novoServico["FK_TIPO_SERVICO"],$novoServico["DT_SERVICO"],$novoServico["FK_PROJETO"] ,0);
					$servico->updateValidarServico ( $id,$this->view->ID_SERVICO);
					
					$this->view->mensagem = "Serviço criado com sucesso";
					$this->view->erro = 0;
					$this->view->validarServico=1;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . "Erro ao criar serviço";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
		
				}
			}else{
				$this->_redirect($this->session->urlAnterior, array('prependBase' => false));
        		exit();
			}
		}
		
		
		
		$this->view->servico = $servico->getServico($id);
	}
    public function listaServicoAction(){
		// action body
		$servico = new Application_Model_DbTable_Servico();
		
		
		
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_SERVICO');
				 
				try {
					$servico->deleteServico($id);
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar serviço";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
		
				}
			}
		}
	
		$this->view->listaServicos= $servico->getServicosOperador($this->user->getId());
		
		

	}
     public function addServicoAction(){
     	
     	try {
    			//$form = new Application_Form_Pcp(array('OPERADOR' => $this->user->getId()));
    			$form = new Application_Form_Servico(array('OPERADOR' => $this->user->getId()));
			    $form->submit->setLabel('Adicionar');
			    //$form->removeElement("tabela_contratacao");
			    $id_projeto = $this->_getParam('id_projeto', 0);
			    if ($id_projeto > 0) {
			    	$formData["FK_PROJETO"]=$id_projeto;
			    	$form->populate($formData);
			    	$form->getElement("FK_PROJETO")->setAttrib("disable",true);
			    	$form->getElement("FK_PROJETO")->setRequired(false);
			    	 
			    }
			    	
			    $this->view->form = $form;
			    //$formData["FK_PROJETO"]="2247";
			    //$form->populate($formData);
    		} catch (Exception $e) {
    				$this->view->mensagem = $e->getCode() .$e->getMessage();
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    
    		}
     	
    	
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		if ($form->isValid($formData)) {	
    			try {
    				//$ID_SERVICO=$form->getValue('ID_SERVICO');
    				$DS_SERVICO=$form->getValue('DS_SERVICO');
    				$FK_OPERADOR=$this->user->getId();
    				$NR_CARGA_HORARIA=$form->getValue('NR_CARGA_HORARIA');
    				$FK_TIPO_SERVICO=$form->getValue('FK_TIPO_SERVICO');
    				
    				$DT_SERVICO= $form->getValue('DT_SERVICO');
            		$data_cadastro =new Zend_Date($DT_SERVICO);
            		$DT_SERVICO=$data_cadastro->get('YYYY-MM-dd');
    				    				
    				
    				if ($id_projeto > 0) {
    					$FK_PROJETO=$id_projeto;
    				}else{
    					$FK_PROJETO=$form->getValue('FK_PROJETO');
    				}
    				$FL_PCP=0;
    				
    				$servico = new Application_Model_DbTable_Servico();
    				$servico->addServico($DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FK_PROJETO, $FL_PCP);
    				//$descricao=$form->getValue('descricao');
    				//$centroCusto->addCentroCusto($descricao);
    				$this->view->erro = 0;
    				$this->view->mensagem = "Adicionado com sucesso";
    				$form->reset();
    			} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    		} else {
    			Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	}
    	
    }
     public function editServicoAction(){
    	$form = new Application_Form_Servico();
    	$form->getElement("FK_PROJETO")->setAttrib("disable",true);
    	$form->getElement("FK_PROJETO")->setRequired(false);
    	$form->submit->setLabel('Adicionar');
     // action body
    	$servico = new Application_Model_DbTable_Servico();
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		$noticia = new Application_Model_DbTable_Noticia();
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
					$ID_SERVICO=$form->getValue('ID_SERVICO');
    				$DS_SERVICO=$form->getValue('DS_SERVICO');
    				$FK_OPERADOR=$this->user->getId();
    				$NR_CARGA_HORARIA=$form->getValue('NR_CARGA_HORARIA');
    				$FK_TIPO_SERVICO=$form->getValue('FK_TIPO_SERVICO');
    				
    				$DT_SERVICO= $form->getValue('DT_SERVICO');
            		$data_cadastro =new Zend_Date($DT_SERVICO);
            		$DT_SERVICO=$data_cadastro->get('YYYY-MM-dd');
    				    				
    				$FK_PROJETO=$form->getValue('FK_PROJETO');
    				$FL_PCP=0;
    				
    				
    				
    				
		
				
				try {
					$servico->updateServicoSemProjeto($ID_SERVICO, $DS_SERVICO, $FK_OPERADOR, $NR_CARGA_HORARIA, $FK_TIPO_SERVICO, $DT_SERVICO, $FL_PCP);
					
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					$id = $this->_getParam('id', 0);
		    		if ($id > 0) {
		    
		    			$form->populate($servico->getServico($id));
		    		}
		    		$form->populate($formData);
					//$this->_helper->redirector('lista-usuario');
				} // catch (pega exceÃƒÂ§ÃƒÂ£o)
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar notícia";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
		
			} else {
				$id = $this->_getParam('id', 0);
	    		if ($id > 0) {
	    
	    			$form->populate($servico->getServico($id));
	    		}
    			$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
		
			if ($id > 0) {
				
				$form->populate($servico->getServico($id));
			}
		}
     }
     public function editPlanoAcaoAction(){
		// action body
		$form = new Application_Form_PlanoAcao();
    	$form->submit->setLabel('Salvar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
		$planoAcao=new Application_Model_DbTable_PlanoAcao();
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				
				$ID_PLANO_ACAO = (int) $form->getValue('ID_PLANO_ACAO');
				$data_cadastro =new Zend_Date();
					$DT_ATUALIZACAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    				
    				
    				
    				//$ID_PROJETO=$form->getValue('ID_PROJETO');
    				$DS_ASSUNTO=$form->getValue('DS_ASSUNTO');
    				$TX_PLANO_ACAO=$form->getValue('TX_PLANO_ACAO');
    				$FK_PROJETO=$form->getValue('FK_PROJETO');
    				$FK_STATUS=$form->getValue('FK_STATUS');
    				$FK_OPERADOR=$form->getValue('FK_OPERADOR');
    				$FK_STATUS_PLANO_ACAO=$form->getValue('FK_STATUS_PLANO_ACAO');
    				
    				
    				
    					
    				$DT_PREVISAO =$form->getValue('DT_PREVISAO');
    				$data_cadastro =new Zend_Date($DT_PREVISAO);
    				$DT_PREVISAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    				
    				
    				$DT_CONTROLE =trim($form->getValue('DT_CONTROLE'));
    				
    				
					
    				
    				 
    				
    				// vamos verificar se o campo foi ou não preenchido
    				if(empty($DT_CONTROLE)){
    					//echo "O campo NÃO foi preenchido";
    						
    				}
    				else{
    					$data_cadastro =new Zend_Date($DT_CONTROLE);
    					$DT_CONTROLE=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    				}
    				
    				
    				$DT_CONCLUSAO =trim($form->getValue('DT_CONCLUSAO'));
    			
    				
    				// vamos verificar se o campo foi ou não preenchido
    				if(empty($DT_CONCLUSAO)){
    					//echo "O campo NÃO foi preenchido";
    					
    				}
    				else{
    					//echo "O campo foi preenchido";
    					$data_cadastro =new Zend_Date($DT_CONCLUSAO);
    					$DT_CONCLUSAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    					$FK_STATUS_PLANO_ACAO=4;//altera status para concluido quando a data  de conclusão é preenchida
    					
    					$formData['FK_STATUS_PLANO_ACAO']=4;
    					$form->populate($formData);
    				}
    				
    				
    				
				try {
		
					$planoAcao->updatePlanoAcao ($ID_PLANO_ACAO,$DS_ASSUNTO, $TX_PLANO_ACAO, $FK_PROJETO, $DT_ATUALIZACAO, $FK_STATUS_PLANO_ACAO, $FK_OPERADOR, $DT_PREVISAO, $DT_CONCLUSAO, $DT_CONTROLE);
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} // catch (pega exceÃƒÂ§ÃƒÂ£o)
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar ramo atividade";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
				
		
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
		
			if ($id > 0) {
				$planoAcaoAux=$planoAcao->getPlanoAcao($id);
				Zend_Registry::get('logger')->log($planoAcaoAux, Zend_Log::INFO);
				if($planoAcaoAux['DT_CONCLUSAO']=='00/00/0000'){
					$planoAcaoAux['DT_CONCLUSAO']="";
				}
				$form->populate($planoAcaoAux);
			}
		}
	}
	 public function deletePlanoAcaoAction() {
    
    
    	$id = $this->_getParam('id', 0);
    	$planoAcao= new Application_Model_DbTable_PlanoAcao();
    	$this->view->planoAcao = $planoAcao->getPlanoAcao($id);
    }
    public function listaProjetoPlanoAcaoAction(){
    	// action body
    	$projeto = new Application_Model_DbTable_Projeto();
    	$id = $this->_getParam('id', 0);
    
    	if ($id > 0) {
    
    
    		if ($this->getRequest()->isPost()) {
    			$del = $this->getRequest()->getPost('del');
    			if ($del == 'Sim') {
    				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    				$id = $this->getRequest()->getPost('ID_SERVICO');
    
    				try {
    					$servico->deleteServico($id);
    					$this->view->mensagem = "Excluído com sucesso";
    					$this->view->erro = 0;
    				} catch (Exception $e) {
    					$this->view->mensagem = $e->getCode() . " Deletar serviço";
    					$this->view->erro = 1;
    					$this->view->mensagemExcecao = $e->getMessage();
    
    				}
    			}
    		}
    		$this->view->projeto= $projeto->getProjeto($id);
    		$planoAcao= new Application_Model_DbTable_PlanoAcao();
			$this->view->planoAcao= $planoAcao->getPlanoAcoesProjeto($id);
    		
    		 
    	}else{
    		$this->view->mensagem ="Não existe projeto";
    		$this->view->erro = 1;
    
    	}
    
    }
     public function addPlanoAcaoAction(){
    	$form = new Application_Form_PlanoAcao();
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
    	
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		if ($form->isValid($formData)) {
    			try {
    				
    				
    				$data_cadastro =new Zend_Date();
					$DT_ATUALIZACAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    				
    				
    				$planoAcao=new Application_Model_DbTable_PlanoAcao();
    				//$ID_PROJETO=$form->getValue('ID_PROJETO');
    				$DS_ASSUNTO=$form->getValue('DS_ASSUNTO');
    				$TX_PLANO_ACAO=$form->getValue('TX_PLANO_ACAO');
    				$FK_PROJETO=$form->getValue('FK_PROJETO');
    				$FK_STATUS=$form->getValue('FK_STATUS');
    				$FK_OPERADOR=$form->getValue('FK_OPERADOR');
    				$FK_STATUS_PLANO_ACAO=$form->getValue('FK_STATUS_PLANO_ACAO');
    				
    				
    				
    					
    				$DT_PREVISAO =$form->getValue('DT_PREVISAO');
    				$data_cadastro =new Zend_Date($DT_PREVISAO);
    				$DT_PREVISAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    				
    				$DT_CONTROLE =$form->getValue('DT_CONTROLE');
    				$data_cadastro =new Zend_Date($DT_CONTROLE);
    				$DT_CONTROLE=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');

    				$DT_CONCLUSAO =$form->getValue('DT_CONCLUSAO');
    				$data_cadastro =new Zend_Date($DT_CONCLUSAO);
    				$DT_CONCLUSAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
    				
    				$planoAcao->addPlanoAcao($DS_ASSUNTO, $TX_PLANO_ACAO, $FK_PROJETO, $DT_ATUALIZACAO, $FK_STATUS_PLANO_ACAO, $FK_OPERADOR, $DT_PREVISAO, $DT_CONCLUSAO, $DT_CONTROLE);
    					
    				$this->view->erro = 0;
    				$this->view->mensagem = "Adicionado com sucesso";
    			} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    		} else {
    			Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	}
	}
	public function listaPlanoAcaoAction() {
		// action body
		$planoAcao= new Application_Model_DbTable_PlanoAcao();
		 
	
	
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_PLANO_ACAO');
				
				try {
					$planoAcao->deletePlanoAcao($id);
	
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar plano ação";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
		
		
			
			$this->view->planoAcao= $planoAcao->getPlanoAcoes();
			
			Zend_Registry::get('logger')->log($this->view->planoAcao, Zend_Log::INFO);
		
	}
	public function listaMeusPlanoAcaoAction() {
		// action body
		$planoAcao= new Application_Model_DbTable_PlanoAcao();
		 
	
	
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_PLANO_ACAO');
				
				try {
					$planoAcao->deletePlanoAcao($id);
	
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar plano ação";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
		//$this->user->getFKPerfil()
		//Zend_Registry::get('logger')->log($this->user, Zend_Log::INFO);
			//getPlanoAcoesOperador($ID_OPERADOR)
			
			try {
					$this->view->planoAcao= $planoAcao->getPlanoAcoesOperador($this->user->getId());
    			} catch (Exception $erro) {
    				
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
			//Zend_Registry::get('logger')->log($this->view->planoAcao, Zend_Log::INFO);
		
	}
	
	public function addContatoAction(){
    	$form = new Application_Form_Contato();
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		if ($form->isValid($formData)) {
				
    			try {
					$NM_CONTATO= $form->getValue('NM_CONTATO');
					$NM_CARGO = $form->getValue('NM_CARGO');
					$NR_TELEFONE = $form->getValue('NR_TELEFONE');
					$NR_TELEFONE2 = $form->getValue('NR_TELEFONE2');
					$TX_OBSERVACAO = $form->getValue('TX_OBSERVACAO');
					
					$DS_EMAIL= $form->getValue('DS_EMAIL');
					$FK_CLIENTE= $form->getValue('FK_CLIENTE');
					$NM_LOGRADOURO= $form->getValue('NM_LOGRADOURO');
					$NR_ENDERECO= $form->getValue('NR_ENDERECO');
					$DS_COMPLEMENTO= $form->getValue('DS_COMPLEMENTO');
					$NM_BAIRRO= $form->getValue('NM_BAIRRO');
					$NM_UF= $form->getValue('NM_UF');
					$NR_CEP= $form->getValue('NR_CEP');
					$FL_AGENDA= $form->getValue('FL_AGENDA');
    				$contato = new Application_Model_DbTable_Contato();
					$contato->addContato($NM_CONTATO, $NM_CARGO, $NR_TELEFONE, $NR_TELEFONE2, $TX_OBSERVACAO,$DS_EMAIL,$FK_CLIENTE,$NM_LOGRADOURO,$NR_ENDERECO,$DS_COMPLEMENTO,$NM_BAIRRO,$NM_UF,$NR_CEP,$FL_AGENDA);
    				//$descricao=$form->getValue('descricao');
    				//$centroCusto->addCentroCusto($descricao);
    				$this->view->erro = 0;
    				$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
    			} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    		} else {
    			Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    	}
		
	}
	public function listaContatoAction() {
        // action body
        $contatos= new Application_Model_DbTable_Contato();
        Zend_Registry::get('logger')->log($_POST, Zend_Log::INFO);
 

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
                $id = $this->getRequest()->getPost('ID_CONTATO');
                $contato = new Application_Model_DbTable_Contato();
                try {
                    $contato->deleteContato($id);

                    $this->view->mensagem = "Excluído com sucesso";
                    $this->view->erro = 0;
                } catch (Exception $e) {
                    $this->view->mensagem = $e->getCode() . " Deletar contato";
                    $this->view->erro = 1;
                    $this->view->mensagemExcecao = $e->getMessage();
                    
                }
            }
        }
       
            $this->view->contatos = $contatos->getContatos();
        
    }
    public function listaContatoSimplesAction() {
        // action body
        $contatos= new Application_Model_DbTable_Contato();
        $this->view->contatos = $contatos->getContatos();
         
    }
    public function listaProjetoContatoAction() {
    	// action body
    	$contatos= new Application_Model_DbTable_Contato();
    	
    
    
    	if ($this->getRequest()->isPost()) {
    		$del = $this->getRequest()->getPost('del');
    		if ($del == 'Sim') {
    			Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
    			$id = $this->getRequest()->getPost('ID_CONTATO');
    			$contato = new Application_Model_DbTable_Contato();
    			try {
    				$contato->deleteContato($id);
    
    				$this->view->mensagem = "Excluído com sucesso";
    				$this->view->erro = 0;
    			} catch (Exception $e) {
    				$this->view->mensagem = $e->getCode() . " Deletar contato";
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    
    			}
    		}
    	}
    	$id = $this->_getParam('id', 0);
    	
    	if ($id > 0) {
    		$projeto= new Application_Model_DbTable_Projeto();
    		$this->view->projeto= $projeto->getProjeto($id);
    		$this->view->contatos = $contatos->getContatosProjeto($id);
    		Zend_Registry::get('logger')->log($this->view->contatos, Zend_Log::INFO);
    	}
    }
    public function deleteProjetoOperadorAction(){
    	
    	
    	
    	try {
    		$FK_OPERADOR= $this->_getParam('ID_OPERADOR', 0);
    	$FK_PROJETO= $this->_getParam('ID_PROJETO', 0);
    	$projetoOperador = new Application_Model_DbTable_ProjetoOperador();
    	$projeto= new Application_Model_DbTable_Projeto();
    	$operador= new Application_Model_DbTable_Operador();
    	
    	$this->view->operador=$operador->getOperador($FK_OPERADOR);
   
    	$this->view->projeto=$projeto->getProjeto($FK_PROJETO);
    	//$this->view->projetoOperador = $projetoOperador->deleteProjetoOperador($FK_PROJETO, $FK_OPERADOR);
    	} catch (Exception $erro) {
    		
    		$this->view->mensagem = $erro->getMessage();
    		$this->view->erro = 1;
    		//exit;
    	}
    }
    public function addProjetoOperadorAction(){
    	$id = $this->_getParam('id', 0);
    	 $form = new Application_Form_ProjetoOperador(array('PROJETO' => $id,'OPERADOR' => $id) );
    
        $form->submit->setLabel('Salvar');
   
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
        	if ($form->isValid($formData)) {
        
        		try {
        			$FK_PROJETO= $form->getValue('FK_PROJETO');
        			$FK_OPERADOR = $form->getValue('FK_OPERADOR');
        			$projetoOperador= new Application_Model_DbTable_ProjetoOperador();
        			$projetoOperador->addProjetoOperador($FK_PROJETO, $FK_OPERADOR);
        			
        			$this->view->erro = 0;
        			$this->view->mensagem = "Adicionado com sucesso";
        			$form->reset();
        		} catch (Exception $erro) {
        			Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
        			$this->view->mensagem = $erro->getMessage();
        			$this->view->erro = 1;
        			//exit;
        		}
        	} else {
        		Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
        		$form->populate($formData);
        		$arrMessages = $form->getMessages();
        		foreach ($arrMessages as $field => $arrErrors) {
        			$this->view->erro = 1;
        			$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
        		}
        	}
        }
        
        
        
        
        
        
        
        
        
        
    	//$form->populate($formData);
    	
    	/*if ($id > 0) {
    		$projeto= new Application_Model_DbTable_Projeto();
    		$operador= new Application_Model_DbTable_Operador();
    		$this->view->projeto= $projeto->getProjeto($id);
    		$this->view->operador = $operador->getOperadorProjeto($id);
    		Zend_Registry::get('logger')->log($this->view->operador, Zend_Log::INFO);
    	}else{
    		$this->view->mensagem = "Projeto não encontrado";
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = "Projeto não encontrado";
    	}*/
    }
    public function listaProjetoOperadorAction() {
    	// action body
    	$projetoOperador= new Application_Model_DbTable_ProjetoOperador();
    	 $menu = new Application_Model_DbTable_MenuPermissaoPerfil();
        $permissao=$menu->retornaPermissaoPagina("add-projeto-operador",$this->user->getFKPerfil());
    	$this->view->permissaoAdicionarOperador=$permissao;
    	
    	$permissao=$menu->retornaPermissaoPagina("delete-projeto-operador",$this->user->getFKPerfil());
    	$this->view->permissaoDeleteOperador=$permissao;
    
    	if ($this->getRequest()->isPost()) {
    		$del = $this->getRequest()->getPost('del');
    		if ($del == 'Sim') {
    			
    			$FK_OPERADOR = $this->getRequest()->getPost('FK_OPERADOR');
    			$FK_PROJETO = $this->getRequest()->getPost('FK_PROJETO');
    			//$contato = new Application_Model_DbTable_Contato();
    			
    			
    			try {
    				$projetoOperador=$projetoOperador->deleteProjetoOperador($FK_PROJETO, $FK_OPERADOR);
    
    				$this->view->mensagem = "Excluído com sucesso";
    				$this->view->erro = 0;
    			} catch (Exception $e) {
    				$this->view->mensagem = $e->getCode() . " Deletar operador do projeto ". $e->getMessage();
    				$this->view->erro = 1;
    				$this->view->mensagemExcecao = $e->getMessage();
    
    			}
    		}
    	}
    	$id = $this->_getParam('id', 0);
    	 
    	if ($id > 0) {
    		$projeto= new Application_Model_DbTable_Projeto();
    		$operador= new Application_Model_DbTable_Operador();
    		$this->view->projeto= $projeto->getProjeto($id);
    		$this->view->operador = $operador->getOperadorProjeto($id);
    		Zend_Registry::get('logger')->log($this->view->operador, Zend_Log::INFO);
    	}
    }
	 public function editContatoAction() {
        // action body
        $form = new Application_Form_Contato();
        $form->submit->setLabel('Salvar contato');
       
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
				 Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
                $ID_CONTATO = (int) $form->getValue('ID_CONTATO');
				$NM_CONTATO= $form->getValue('NM_CONTATO');
				$NM_CARGO = $form->getValue('NM_CARGO');
				$NR_TELEFONE = $form->getValue('NR_TELEFONE');
				$NR_TELEFONE2 = $form->getValue('NR_TELEFONE2');
				$TX_OBSERVACAO = $form->getValue('TX_OBSERVACAO');
				$DS_EMAIL= $form->getValue('DS_EMAIL');
				$FK_CLIENTE= $form->getValue('FK_CLIENTE');
				$NM_LOGRADOURO= $form->getValue('NM_LOGRADOURO');
				$NR_ENDERECO= $form->getValue('NR_ENDERECO');
				$DS_COMPLEMENTO= $form->getValue('DS_COMPLEMENTO');
				$NM_BAIRRO= $form->getValue('NM_BAIRRO');
				$NM_UF= $form->getValue('NM_UF');
				$NR_CEP= $form->getValue('NR_CEP');
				$FL_AGENDA= $form->getValue('FL_AGENDA');
				
				$contato = new Application_Model_DbTable_Contato();
				try {

						$contato->updateContato ($ID_CONTATO,$NM_CONTATO, $NM_CARGO, $NR_TELEFONE, $NR_TELEFONE2, $TX_OBSERVACAO,$DS_EMAIL,$FK_CLIENTE,$NM_LOGRADOURO,$NR_ENDERECO,$DS_COMPLEMENTO,$NM_BAIRRO,$NM_UF,$NR_CEP,$FL_AGENDA);
						$this->view->mensagem = "Atualizado com sucesso";
                        $this->view->erro = 0;
                        //$this->_helper->redirector('lista-usuario');
                    } // catch (pega exceÃƒÂ§ÃƒÂ£o)
                    catch (Exception $e) {
                        $this->view->mensagem = "Atualizar contato";
                        $this->view->erro = 1;
                        $this->view->mensagemExcecao = $e->getMessage();
                        //  echo ($e->getCode()."teste".$e->getMessage() );
                    }
                
            } else {
                $form->populate($formData);
                $arrMessages = $form->getMessages();
                foreach ($arrMessages as $field => $arrErrors) {
                	$this->view->erro = 1;
                	$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
                }
            }
        } else {
            $id = $this->_getParam('id', 0);

            if ($id > 0) {
                $contato = new Application_Model_DbTable_Contato();
                Zend_Registry::get('logger')->log("Id contato =" . $id, Zend_Log::INFO);
                $form->populate($contato->getContato($id));
            }
        }
    }
	public function deleteContatoAction() {


        $id = $this->_getParam('id', 0);
        $contato = new Application_Model_DbTable_Contato();
        $this->view->contatos = $contato->getContato($id);
    }
	public function addRamoAtividadeAction(){
		$form = new Application_Form_RamoAtividade();
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		
    			
    		
    		if ($form->isValid($formData)) {
				
    			try {
					$DS_RAMO_ATIVIDADE= $form->getValue('DS_RAMO_ATIVIDADE');
					
    				$ramoAtividade = new Application_Model_DbTable_RamoAtividade();
					$ramoAtividade->addRamoAtividade($DS_RAMO_ATIVIDADE);
					
    				//$descricao=$form->getValue('descricao');
    				//$centroCusto->addCentroCusto($descricao);
    				$this->view->erro = 0;
    				$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
    			} catch (Exception $erro) {
    				Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
    				$this->view->mensagem = $erro->getMessage();
    				$this->view->erro = 1;
    				//exit;
    			}
    		} else {
    			Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
    			$form->populate($formData);
    			$arrMessages = $form->getMessages();
    			foreach ($arrMessages as $field => $arrErrors) {
    				$this->view->erro = 1;
    				$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
    			}
    		}
    		
    	}
		
	}
	public function editRamoAtividadeAction(){
		// action body
		$form = new Application_Form_RamoAtividade();
    	$form->submit->setLabel('Salvar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
		
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				$ID_RAMO_ATIVIDADE = (int) $form->getValue('ID_RAMO_ATIVIDADE');
				$DS_RAMO_ATIVIDADE= $form->getValue('DS_RAMO_ATIVIDADE');
				
				$ramoAtividade = new Application_Model_DbTable_RamoAtividade();
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				try {
		
					$ramoAtividade->updateRamoAtividade($ID_RAMO_ATIVIDADE, $DS_RAMO_ATIVIDADE);
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} // catch (pega exceÃƒÂ§ÃƒÂ£o)
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar ramo atividade";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
		
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
		
			if ($id > 0) {
				$ramoAtividade = new Application_Model_DbTable_RamoAtividade();
				Zend_Registry::get('logger')->log("Id contato =" . $id, Zend_Log::INFO);
				$form->populate($ramoAtividade->getRamoAtividade($id));
			}
		}
	}
	public function deleteRamoAtividadeAction(){
		$id = $this->_getParam('id', 0);
		$ramoAtividade = new Application_Model_DbTable_RamoAtividade();
		$this->view->ramoAtividade = $ramoAtividade->getRamoAtividade($id);
	}
	public function listaRamoAtividadeAction(){
		$ramoAtividade= new Application_Model_DbTable_RamoAtividade();
		
		
		
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_RAMO_ATIVIDADE');
				$ramoAtividade = new Application_Model_DbTable_RamoAtividade();
				try {
					$ramoAtividade->deleteRamoAtividade($id);
		
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar Ramo de atividade";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
		
				}
			}
		}
		 
		$this->view->ramoAtividade = $ramoAtividade->getRamoAtividades();
		Zend_Registry::get('logger')->log($this->view->ramoAtividade, Zend_Log::INFO);
	}
	
	public function editClienteAction(){
		// action body
		$form = new Application_Form_Cliente();
		$form->submit->setLabel('Salvar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
	
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				
				$cliente = new Application_Model_DbTable_Cliente();
				
				try {
					$ID_CLIENTE= (int) $form->getValue('ID_CLIENTE');
					
					$NM_CLIENTE=$form->getValue('NM_CLIENTE');
					$NR_CNPJ=$form->getValue('NR_CNPJ');
					$TX_OBSERVACAO=$form->getValue('TX_OBSERVACAO');
					$NM_LOGRADOURO=$form->getValue('NM_LOGRADOURO');
					$NR_NUMERO=$form->getValue('NR_NUMERO');
					$DS_COMPLEMENTO=$form->getValue('DS_COMPLEMENTO');
					$NM_BAIRRO=$form->getValue('NM_BAIRRO');
					$NR_CEP=$form->getValue('NR_CEP');
					$NM_CIDADE=$form->getValue('NM_CIDADE');
					$NM_UF=$form->getValue('NM_UF');
					$DT_ATUALIZACAO=$form->getValue('DT_ATUALIZACAO');
					$FK_RAMO_ATIVIDADE=$form->getValue('FK_RAMO_ATIVIDADE');
					
					$cliente->updateCliente($ID_CLIENTE, $NM_CLIENTE, $NR_CNPJ, $TX_OBSERVACAO, $NM_LOGRADOURO, $NR_NUMERO, $DS_COMPLEMENTO, $NM_BAIRRO, $NR_CEP, $NM_CIDADE, $NM_UF, $DT_ATUALIZACAO, $FK_RAMO_ATIVIDADE);
					
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} // catch (pega exceÃƒÂ§ÃƒÂ£o)
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar cliente";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
	
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
	
			if ($id > 0) {
				$cliente = new Application_Model_DbTable_Cliente();
				Zend_Registry::get('logger')->log("Id cliente =" . $id, Zend_Log::INFO);
				$form->populate($cliente->getCliente($id));
			}
		}
	}
	public function addClienteAction(){
		$form = new Application_Form_Cliente();
		$form->submit->setLabel('Adicionar');
		$data_cadastro =new Zend_Date();
		$dataAux=$data_cadastro->get('dd-MM-YYYY HH:mm:ss');
		$form->getElement("DT_ATUALIZACAO")->setValue($dataAux);
		$form->getElement("DT_ATUALIZACAO")->setAttrib("disable", array(1));
		
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
	
			 
	
			if ($form->isValid($formData)) {
	
				try {
					
					$NM_CLIENTE=$form->getValue('NM_CLIENTE');
					$NR_CNPJ=$form->getValue('NR_CNPJ');
					$TX_OBSERVACAO=$form->getValue('TX_OBSERVACAO');
					$NM_LOGRADOURO=$form->getValue('NM_LOGRADOURO');
					$NR_NUMERO=$form->getValue('NR_NUMERO');
					$DS_COMPLEMENTO=$form->getValue('DS_COMPLEMENTO');
					$NM_BAIRRO=$form->getValue('NM_BAIRRO');
					$NR_CEP=$form->getValue('NR_CEP');
					$NM_CIDADE=$form->getValue('NM_CIDADE');
					$NM_UF=$form->getValue('NM_UF');
					
					$data_cadastro =new Zend_Date();
					$DT_ATUALIZACAO=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
					
					$FK_RAMO_ATIVIDADE=$form->getValue('FK_RAMO_ATIVIDADE');
							
					$cliente = new Application_Model_DbTable_Cliente();
					$cliente->addCliente($NM_CLIENTE, $NR_CNPJ, $TX_OBSERVACAO, $NM_LOGRADOURO, $NR_NUMERO, $DS_COMPLEMENTO, $NM_BAIRRO, $NR_CEP, $NM_CIDADE, $NM_UF, $DT_ATUALIZACAO, $FK_RAMO_ATIVIDADE);
						
					//$descricao=$form->getValue('descricao');
					//$centroCusto->addCentroCusto($descricao);
					$this->view->erro = 0;
					$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
				} catch (Exception $erro) {
					Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
					$this->view->mensagem = $erro->getMessage();
					$this->view->erro = 1;
					//exit;
				}
			} else {
				Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
	
		}
	
	}
	public function deleteClienteAction(){
		$id = $this->_getParam('id', 0);
		$cliente = new Application_Model_DbTable_Cliente();
		$this->view->cliente = $cliente->getCliente($id);
	}
	public function listaClienteSimplesAction(){
		$cliente= new Application_Model_DbTable_Cliente();
	    $this->view->cliente = $cliente->getClientes();
		
	}
	public function listaClienteAction(){
		$cliente= new Application_Model_DbTable_Cliente();
	
	
	
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_CLIENTE');
				$cliente= new Application_Model_DbTable_Cliente();
				try {
					$cliente->deleteCliente($id);
	
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar cliente";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
			
		$this->view->cliente = $cliente->getClientes();
		Zend_Registry::get('logger')->log($this->view->cliente, Zend_Log::INFO);
	}
	public function editTipoServicoAction(){
		// action body
		$form = new Application_Form_TipoServico();
		$form->submit->setLabel('Salvar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
	
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				$ID_TIPO_SERVICO = (int) $form->getValue('ID_TIPO_SERVICO');
				$NM_TIPO_SERVICO= $form->getValue('NM_TIPO_SERVICO');
	
				$tipoServico= new Application_Model_DbTable_TipoServico();
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				try {
	
					$tipoServico->updateTipoServico($ID_TIPO_SERVICO, $NM_TIPO_SERVICO);
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} // catch (pega exceÃƒÂ§ÃƒÂ£o)
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar tipo serviço";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
	
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
	
			if ($id > 0) {
				$tipoServico = new Application_Model_DbTable_TipoServico();
				Zend_Registry::get('logger')->log("Id contato =" . $id, Zend_Log::INFO);
				$form->populate($tipoServico->getTipoServico($id));
			}
		}
	}
	public function deleteTipoServicoAction(){
		$id = $this->_getParam('id', 0);
		$tipoServico= new Application_Model_DbTable_TipoServico();
		$this->view->tipoServico = $tipoServico->getTipoServico($id);
	}
	public function listaTipoServicoAction(){
		$tipoServico= new Application_Model_DbTable_TipoServico();
	    if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_TIPO_SERVICO');
				
				try {
					
					$tipoServico->deleteTipoServico($id);
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar tipo de serviço";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
			
		$this->view->tipoServico = $tipoServico->getTipoServicos();
		
	}
	public function addTipoServicoAction(){
		$form = new Application_Form_TipoServico();
		$form->submit->setLabel('Adicionar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
	
			 
	
			if ($form->isValid($formData)) {
	
				try {
					
					$NM_TIPO_SERVICO= $form->getValue('NM_TIPO_SERVICO');
					$tipoServico= new Application_Model_DbTable_TipoServico();
					$tipoServico->addTipoServico($NM_TIPO_SERVICO);
						
					//$descricao=$form->getValue('descricao');
					//$centroCusto->addCentroCusto($descricao);
					$this->view->erro = 0;
					$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
				} catch (Exception $erro) {
					Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
					$this->view->mensagem = $erro->getMessage();
					$this->view->erro = 1;
					//exit;
				}
			} else {
				Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
	
		}
	
	}
	public function addNoticiaAction(){
		$form = new Application_Form_Noticia();
		$form->submit->setLabel('Adicionar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
	
			 
	
			if ($form->isValid($formData)) {
	
				try {
					
					$DS_TITULO = $form->getValue('DS_TITULO');
					$TX_NOTICIA= $form->getValue('TX_NOTICIA');
					$FK_ARQUIVO= $form->getValue('');
					$DS_RESUMO= $form->getValue('DS_RESUMO');
					//$DT_NOTICIA= $form->getValue('');
					
					$data_cadastro =new Zend_Date();
            		$DT_NOTICIA=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
					
					$FK_TIPO_NOTICIA= $form->getValue('FK_TIPO_NOTICIA');
					$FK_OPERADOR= $this->user->getId();
					
					
					$noticia= new Application_Model_DbTable_Noticia();
					$noticia->addNoticia($DS_TITULO,$TX_NOTICIA,$FK_ARQUIVO,$DS_RESUMO,$DT_NOTICIA,$FK_TIPO_NOTICIA,$FK_OPERADOR);
						
					//$descricao=$form->getValue('descricao');
					//$centroCusto->addCentroCusto($descricao);
					$this->view->erro = 0;
					$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
				} catch (Exception $erro) {
					Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
					$this->view->mensagem = $erro->getMessage();
					$this->view->erro = 1;
					//exit;
				}
			} else {
				Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
	
		}
	
	}
	public function editNoticiaAction(){
		// action body
		$form = new Application_Form_Noticia();
		$form->submit->setLabel('Salvar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		$noticia = new Application_Model_DbTable_Noticia();
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				$ID_NOTICIA = $form->getValue('ID_NOTICIA');
				$DS_TITULO = $form->getValue('DS_TITULO');
				$TX_NOTICIA= $form->getValue('TX_NOTICIA');
				$FK_ARQUIVO= $form->getValue('');
				$DS_RESUMO= $form->getValue('DS_RESUMO');
				//$DT_NOTICIA= $form->getValue('');
						
				$data_cadastro =new Zend_Date();
	            $DT_NOTICIA=$data_cadastro->get('YYYY-MM-dd HH:mm:ss');
						
				$FK_TIPO_NOTICIA= $form->getValue('FK_TIPO_NOTICIA');
				$FK_OPERADOR= $this->user->getId();
		
				
				try {
					
					$noticia->updateNoticia($ID_NOTICIA, $DS_TITULO, $TX_NOTICIA, $FK_ARQUIVO, $DS_RESUMO, $DT_NOTICIA, $FK_TIPO_NOTICIA, $FK_OPERADOR);
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} // catch (pega exceÃƒÂ§ÃƒÂ£o)
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar notícia";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
		
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
		
			if ($id > 0) {
				
				$form->populate($noticia->getNoticia($id));
			}
		}
		
	}
	public function listaNoticiaAction(){
		// action body
		$noticia = new Application_Model_DbTable_Noticia();
		
		
		
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_NOTICIA');
				 
				try {
					$noticia->deleteNoticia($id);
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar notícia";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
		
				}
			}
		}
		Zend_Registry::get('logger')->log("aaaa", Zend_Log::INFO);
		$this->view->listaNoticias = $noticia->getNoticiasTodas();
		Zend_Registry::get('logger')->log($this->view->listaNoticias, Zend_Log::INFO);

	}
	public function deleteNoticiaAction() {
	
	
		$id = $this->_getParam('id', 0);
		$noticia= new Application_Model_DbTable_Noticia();
		$this->view->noticia = $noticia->getNoticia($id);
	}
	public function noticiasAction() {
	
		$noticia = new Application_Model_DbTable_Noticia();
		$listaNoticias=$noticia->getNoticias(1);//busca noticias
		$this->view->listaNoticias = $listaNoticias;
		
	}
	public function noticiaAction() {
	
		$id = $this->_getParam('id', 0);
		$noticia = new Application_Model_DbTable_Noticia();
		$noticia=$noticia->getNoticia($id);
		$this->view->noticia = $noticia;
		Zend_Registry::get('logger')->log($noticia, Zend_Log::INFO);
	}
	public function listaProjetoAction(){
		// action body
		$projeto = new Application_Model_DbTable_Projeto();
		$menu = new Application_Model_DbTable_MenuPermissaoPerfil();
        $permissao=$menu->retornaPermissaoPagina("add-projeto",$this->user->getFKPerfil());
    	$this->view->permissaoAdicionarProjeto=$permissao;
	
		$permissao=$menu->retornaPermissaoPagina("delete-projeto",$this->user->getFKPerfil());
    	$this->view->permissaoDeleteProjeto=$permissao;
		
		
		$permissao=$menu->retornaPermissaoPagina("edit-projeto",$this->user->getFKPerfil());
    	$this->view->permissaoEditProjeto=$permissao;
		
		
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				//Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_PROJETO');
					
				try {
					$projeto->deleteProjeto($id);
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar projeto";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
		Zend_Registry::get('logger')->log("aaaa", Zend_Log::INFO);
		//$this->view->listaProjetos = $projeto->getProjetos();
		$this->view->listaProjetos = $projeto->getProjetosIndividual($this->user->getId());
		Zend_Registry::get('logger')->log($this->view->listaProjetos, Zend_Log::INFO);
	
	}
	public function editTipoProjetoAction(){
		
		
		// action body
		$form = new Application_Form_TipoProjeto();
		$form->submit->setLabel('Salvar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
	
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				$ID_TIPO_PROJETO = (int) $form->getValue('ID_TIPO_PROJETO');
				$NM_TIPO_PROJETO= $form->getValue('NM_TIPO_PROJETO');
	
				$tipoProjeto= new Application_Model_DbTable_TipoProjeto();
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				try {
	
					$tipoProjeto->updateTipoProjeto($ID_TIPO_PROJETO, $NM_TIPO_PROJETO);
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} // 
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar tipo tipo projeto";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
	
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
	
			if ($id > 0) {
				$tipoProjeto = new Application_Model_DbTable_TipoProjeto();
				Zend_Registry::get('logger')->log("Id contato =" . $id, Zend_Log::INFO);
				$form->populate($tipoProjeto->getTipoProjeto($id));
				Zend_Registry::get('logger')->log($tipoProjeto->getTipoProjetos(), Zend_Log::INFO);
			}
		}
	}
	public function deleteTipoProjetoAction(){
		$id = $this->_getParam('id', 0);
		$tipoProjeto= new Application_Model_DbTable_TipoProjeto();
		$this->view->TipoProjeto = $tipoProjeto->getTipoProjeto($id);
	}
	public function listaTipoProjetoAction(){
		$tipoProjeto= new Application_Model_DbTable_TipoProjeto();
	    if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_TIPO_PROJETO');
				
				try {
					
					$tipoProjeto->deleteTipoProjeto($id);
					$this->view->mensagem = "Exclíudo com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar tipo de tipo projeto";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
			
		$this->view->tipoProjeto = $tipoProjeto->getTipoProjetos();
		
	}
	public function addTipoProjetoAction(){
		$form = new Application_Form_TipoProjeto();
		$form->submit->setLabel('Adicionar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
	
			 
	
			if ($form->isValid($formData)) {
	
				try {
					
					$NM_TIPO_PROJETO= $form->getValue('NM_TIPO_PROJETO');
					$tipoProjeto= new Application_Model_DbTable_TipoProjeto();
					$tipoProjeto->addTipoProjeto($NM_TIPO_PROJETO);
						
					//$descricao=$form->getValue('descricao');
					//$centroCusto->addCentroCusto($descricao);
					$this->view->erro = 0;
					$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
				} catch (Exception $erro) {
					Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
					$this->view->mensagem = $erro->getMessage();
					$this->view->erro = 1;
					//exit;
				}
			} else {
				Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
	
		}
	
	}
	public function editStatusProjetoAction(){
		// action body
		$form = new Application_Form_StatusProjeto();
		$form->submit->setLabel('Salvar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
	
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				$ID_STATUS_PROJETO = (int) $form->getValue('ID_STATUS_PROJETO');
				$NM_STATUS_PROJETO= $form->getValue('NM_STATUS_PROJETO');
				
	
				$statusProjeto= new Application_Model_DbTable_StatusProjeto();
				Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
				try {
	
					$statusProjeto->updateStatusProjeto($ID_STATUS_PROJETO, $NM_STATUS_PROJETO);
					$this->view->mensagem = "Atualizado com sucesso";
					$this->view->erro = 0;
					//$this->_helper->redirector('lista-usuario');
				} 
				catch (Exception $e) {
					$this->view->mensagem = "Atualizar status projeto";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
					//  echo ($e->getCode()."teste".$e->getMessage() );
				}
	
			} else {
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
		} else {
			$id = $this->_getParam('id', 0);
	
			if ($id > 0) {
				$statusProjeto = new Application_Model_DbTable_StatusProjeto();
				Zend_Registry::get('logger')->log("Id contato =" . $id, Zend_Log::INFO);
				$form->populate($statusProjeto->getStatusProjeto($id));
			}
		}
	}
	public function deleteStatusProjetoAction(){
		$id = $this->_getParam('id', 0);
		$statusProjeto= new Application_Model_DbTable_StatusProjeto();
		$this->view->statusProjeto = $statusProjeto->getStatusProjeto($id);
	}
	public function listaStatusProjetoAction(){
		$statusProjeto= new Application_Model_DbTable_StatusProjeto();
	    if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
				$id = $this->getRequest()->getPost('ID_STATUS_PROJETO');
				
				try {
					
					$statusProjeto->deleteStatusProjeto($id);
					$this->view->mensagem = "Excluído com sucesso";
					$this->view->erro = 0;
				} catch (Exception $e) {
					$this->view->mensagem = $e->getCode() . " Deletar tipo de status projeto";
					$this->view->erro = 1;
					$this->view->mensagemExcecao = $e->getMessage();
	
				}
			}
		}
			
		$this->view->statusProjeto = $statusProjeto->getStatusProjetos();
		
	}
	public function permissaoAction(){
		$menu = new Application_Model_DbTable_MenuPermissaoPerfil();
        $listaPerfil=$menu->listaPerfil();
        $this->view->listaPerfil=$listaPerfil;
	}
	public function editPermissaoAction(){
		$id = $this->_getParam('id', 0);
		$menu = new Application_Model_DbTable_MenuPermissaoPerfil();
		
		
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
		
		//for ($i=0;i<count($_POST['permissao']);$i++){
			
		//}
			Zend_Registry::get('logger')->log($formData['permissao'], Zend_Log::INFO);
			Zend_Registry::get('logger')->log($formData['perm'], Zend_Log::INFO);
			$tam=count($formData['permissao']);
			for ($j = 0; $j< $tam;  $j++){
					
					//echo $formData['perm'][$j];
					Zend_Registry::get('logger')->log($formData['perm'][$j]." ".$formData['permissao'][$j], Zend_Log::INFO);
					$menu->updatePermissaoPerfil ($formData['perm'][$j],$id,$formData['permissao'][$j]);
	
			}
			$this->view->mensagem = "Atualizado com sucesso";
			$this->view->erro = 0;
			
			
		}
		
		//$listaPermissao=$menu->listaPermissao();
		$listaPermissao=$menu->listaPermissaoPerfil($id);
		
		$this->view->listaPermissao=$listaPermissao;
		
		//Zend_Registry::get('logger')->log($listaPermissaoPerfil, Zend_Log::INFO);
	}
	public function addStatusProjetoAction(){
		$form = new Application_Form_StatusProjeto();
		$form->submit->setLabel('Adicionar');
		//$form->removeElement("tabela_contratacao");
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
	
			 
	
			if ($form->isValid($formData)) {
	
				try {
					
					$NM_STATUS_PROJETO= $form->getValue('NM_STATUS_PROJETO');
					$statusProjeto= new Application_Model_DbTable_StatusProjeto();
					$statusProjeto->addStatusProjeto($NM_STATUS_PROJETO);
						
					//$descricao=$form->getValue('descricao');
					//$centroCusto->addCentroCusto($descricao);
					$this->view->erro = 0;
					$this->view->mensagem = "Adicionado com sucesso";
					$form->reset();
				} catch (Exception $erro) {
					Zend_Registry::get('logger')->log("Erroooooooooooooooo", Zend_Log::INFO);
					$this->view->mensagem = $erro->getMessage();
					$this->view->erro = 1;
					//exit;
				}
			} else {
				Zend_Registry::get('logger')->log("formulario inválido", Zend_Log::INFO);
				$form->populate($formData);
				$arrMessages = $form->getMessages();
				foreach ($arrMessages as $field => $arrErrors) {
					$this->view->erro = 1;
					$this->view->mensagem = $this->view->mensagem . $form->getElement($field)->getLabel() . $this->view->formErrors($arrErrors) . "<br>";
				}
			}
	
		}
	
	}
}
