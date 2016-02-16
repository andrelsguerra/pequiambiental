<?php

//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', true);
class IndexController extends Zend_Controller_Action {

    public $user;
    public $urlCompleta = 'http:\\\www.tm1.com.br\\dotz\\upload\\';
    public $session;
    public $log;
    public $caminhoPastaFtp;

    public function init() {
        $this->caminhoPastaFtp = BASE_PATH . '/uploadXml/';
       // $this->log = new Application_Model_DbTable_LogArquivosGerados();
        $this->session = new Zend_Session_Namespace();

        if ($this->session->urlAtual <> $_SERVER['REQUEST_URI']) {
            $this->session->urlAnterior = $this->session->urlAtual;
            $this->session->urlAtual = $_SERVER['REQUEST_URI'];
        }
        $url = Zend_Controller_Front::getInstance()->getRequest()->getRequestUri();
        Zend_Registry::get('logger')->log($this->session->urlAnterior, Zend_Log::INFO);
        Zend_Registry::get('logger')->log($this->session->urlAtual, Zend_Log::INFO);
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
            $this->view->usuario1 = $this->user->getUserName();
        }
        
        if(isset($_POST['Voltar'])){
        	$this->_redirect($this->session->urlAnterior, array('prependBase' => false));
        	exit();
        }
        
    }

    public function indexAction() {
        // resgata o helper, retornando uma instância do helper
        $helper = $this->_helper->getHelper('classeGenerica');
		$date = new Zend_Date();
		$mes = $date->get(Zend_Date::MONTH);
       
		Zend_Registry::get('logger')->log( $mes, Zend_Log::INFO);
		$mes=$helper->retornaMesExtenso( $mes );
		$this->view->mes=$mes;
    }

    public function deleteOperadorAction() {


        $id = $this->_getParam('id', 0);
        $usuarios = new Application_Model_DbTable_Usuario();
        $this->view->usuarios = $usuarios->getUsuario($id);
    }

    public function editOperadorAction() {
        // action body
        $form = new Application_Form_Usuario();
        $form->submit->setLabel('Salvar usuÃ¡rio');

        //$form->getElement("login")->setVisible(false);
        //$form->removeElement($form->getElement("s"));
        //$form->getElement("login")->setAttrib("disable", array(1));
        $form->removeElement("login");
        $this->view->form = $form;
        Zend_Registry::get('logger')->log($form->getValues(), Zend_Log::INFO);
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
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
                }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);

            if ($id > 0) {
                $usuarios = new Application_Model_DbTable_Usuario();
                Zend_Registry::get('logger')->log("Id usuario =" . $id, Zend_Log::INFO);
                $form->populate($usuarios->getUsuario($id));
            }
        }
    }

    public function addOperadorAction() {
        // action body
        $form = new Application_Form_Usuario();
        $form->submit->setLabel('Adicionar usuário');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nome = $form->getValue('nome');
                $email = $form->getValue('email');
                $senha = $form->getValue('senha');
                $login = $form->getValue('login');
                //$jobrole = $form->getValue('jobrole');
                //$cellphone=$form->getValue('cellphone');
                $fk_perfil = $form->getValue('fk_perfil');
                $repetirSenha = $form->getValue('repetirSenha');
                $fk_empresa = $form->getValue('fk_empresa');
                $usuarios = new Application_Model_DbTable_Usuario();

                $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                $imageAdapter->setDestination(BASE_PATH . '/upload');


                Zend_Registry::get('logger')->log("is_uploaded_file", Zend_Log::INFO);
                //$arquivo=$form->getValues('fileUpload');
                $_FILES['fileUpload']['name'] = "teste.jpg";
                Zend_Registry::get('logger')->log($_FILES['fileUpload'], Zend_Log::INFO);
                $nomedaimagem = $_FILES['fileUpload']['name'];
                $fk_arquivo = "";
                $extensao = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
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
                }
            } else {
                $form->populate($formData);
            }
        }
    }

    public function listaOperadorAction() {
        // action body
        $usuarios = new Application_Model_DbTable_Usuario();
        Zend_Registry::get('logger')->log($_POST, Zend_Log::INFO);
 

        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Sim') {
				Zend_Registry::get('logger')->log("teste2222", Zend_Log::INFO);
                $id = $this->getRequest()->getPost('id_usuario');
                $usuarios = new Application_Model_DbTable_Usuario();
                try {
                    $usuarios->deleteUsuario($id);

                    $this->view->mensagem = "Excluído com sucesso";
                    $this->view->erro = 0;
                } catch (Exception $e) {
                    $this->view->mensagem = $e->getCode() . " Deletar usuÃ¡rio";
                    $this->view->erro = 1;
                    $this->view->mensagemExcecao = $e->getMessage();
                    if ($e->getCode() == "23000") {
                        $this->view->mensagem = $e->getCode() . " NÃ£o permitido excluir usuÃ¡rio com reuniÃµes agendadas";
                    }
                }
            }
        }
        try {
            $this->view->usuarios = $usuarios->getUsuariosComPerfil();
        } catch (Exception $e) {
            $this->view->mensagem = "UsuÃ¡rios nao encontrado";
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
        $this->view->titulo = "Alterar UsuÃ¡rio";
        Zend_Registry::get('logger')->log($this->view->titulo, Zend_Log::INFO);

        // action body
        $form = new Application_Form_AlterarPerfil();
        $form->submit->setLabel('Salvar usuÃ¡rio');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
            if ($form->isValid($formData)) {

                $id = (int) $form->getValue('id_usuario');
                $nome = $form->getValue('nome');
                $email = $form->getValue('email');
                $senha = $form->getValue('senha');
                $repetirSenha = $form->getValue('repetirSenha');


                $usuarios = new Application_Model_DbTable_Usuario();
                // Zend_Registry::get('logger')->log($fk_perfil."perfil".$id, Zend_Log::INFO);
                try {
                    if ($repetirSenha != $senha)
                        throw new Exception(
                        "AtenÃ§Ã£o senha e repetir senha tem que ser iguais");


                    $imageAdapter = new Zend_File_Transfer_Adapter_Http();
                    $imageAdapter->setDestination(BASE_PATH . '/upload');
                    $nomedaimagem = $_FILES['fileUpload']['name'];
                    $fk_arquivo = "";
                    $extensao = pathinfo($nomedaimagem, PATHINFO_EXTENSION);
                    Zend_Registry::get('logger')->log($_FILES['fileUpload']['tmp_name'], Zend_Log::INFO);
                    Zend_Registry::get('logger')->log($_FILES['fileUpload'], Zend_Log::INFO);
                    if (is_uploaded_file($_FILES['fileUpload']['tmp_name'])) {
                        Zend_Registry::get('logger')->log("Entrou if is upload", Zend_Log::INFO);
                        //$filename = $imageAdapter->getFileName('fileUpload');
                        $nomeArquivo = md5(uniqid()) . '.' . $extensao;
                        //$filename  = pathinfo($nomedaimagem, PATHINFO_FILENAME);
                        $extension = pathinfo($nomedaimagem, PATHINFO_EXTENSION);

                        $imageAdapter->addFilter('Rename', $nomeArquivo);
                        if (!$imageAdapter->receive('fileUpload')) {
                            $messages = $imageAdapter->getMessages['fileUpload'];
                            //A Imagem NÃƒÂ£o Foi Recebida Corretamente
                            Zend_Registry::get('logger')->log("A Imagem NÃƒÂ£o Foi Recebida Corretamente", Zend_Log::INFO);
                        } else {
                            //Arquivo Enviado Com Sucesso
                            //Realize As AÃƒÂ§ÃƒÂµes NecessÃƒÂ¡rias Com Os Dados
                            Zend_Registry::get('logger')->log("A Imagem  Recebida Corretamente", Zend_Log::INFO);


                            $arquivo = new Application_Model_DbTable_Arquivo();
                            $fk_arquivo = $arquivo->addArquivo($nomeArquivo, $extensao);
                            Zend_Registry::get('logger')->log("Id arquivo =" . $fk_arquivo, Zend_Log::INFO);

                            $usuarios->updateAlterarPerfil($id, $nome, $senha, $email, $fk_arquivo);
                        }
                    } else {

                        Zend_Registry::get('logger')->log("O Arquivo NÃ£o Foi Enviado Corretamente", Zend_Log::INFO);
                        //O Arquivo NÃƒÂ£o Foi Enviado Corretamente
                    }
                    $usuarios->updateAlterarPerfilSemFoto($id, $nome, $senha, $email);


                    //$this->_helper->redirector('index');
                } catch (Exception $erro) {
                    // echo  ;
                    $this->view->mensagem = $erro->getMessage();
                    //exit();
                }
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->user->getId();
            if ($id > 0) {
                $usuarios = new Application_Model_DbTable_Usuario();
                $form->populate($usuarios->getUsuario($id));
            }
        }
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
    				//$centroCusto = new Application_Model_DbTable_CentroCusto();
    				//$descricao=$form->getValue('descricao');
    				//$centroCusto->addCentroCusto($descricao);
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
     public function addServicoAction(){
    	$form = new Application_Form_Servico();
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
    	if ($this->getRequest()->isPost()) {
    		$formData = $this->getRequest()->getPost();
    		Zend_Registry::get('logger')->log($formData, Zend_Log::INFO);
    		if ($form->isValid($formData)) {	
    			try {
    				//$centroCusto = new Application_Model_DbTable_CentroCusto();
    				//$descricao=$form->getValue('descricao');
    				//$centroCusto->addCentroCusto($descricao);
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
     public function editServicoAction(){
    	$form = new Application_Form_Servico();
    	$form->submit->setLabel('Adicionar');
    	//$form->getElement("FK_PROJETO")->setAttrib("disable", array(1));
    	//$form->getElement("TP_SERVICO")->setAttrib("disable", array(1));
     }
     public function addPlanoAcaoAction(){
    	$form = new Application_Form_PlanoAcao();
    	$form->submit->setLabel('Adicionar');
    	//$form->removeElement("tabela_contratacao");	
    	$this->view->form = $form;
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
         Zend_Registry::get('logger')->log($this->view->contatos, Zend_Log::INFO);
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
					$DT_ATUALIZACAO=$form->getValue('DT_ATUALIZACAO');
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

}
