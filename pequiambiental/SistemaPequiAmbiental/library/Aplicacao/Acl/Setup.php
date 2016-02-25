<?php
class Aplicacao_Acl_Setup extends Zend_Controller_Plugin_Abstract

{
	/**
	 * @var Zend_Acl
	 */
	protected $_acl;

	public function __construct()
	{
		$this->_acl = new Zend_Acl();
		$this->_initialize();
	}

	protected function _initialize()
	{
		$this->_setupRoles();
		$this->_setupResources();
		$this->_setupPrivileges();
		$this->_saveAcl();
	}

	protected function _setupRoles()
	{
		$this->_acl->addRole( new Zend_Acl_Role('guest') );
		$this->_acl->addRole( new Zend_Acl_Role('geral'), 'guest' );
		
		$this->_acl->addRole( new Zend_Acl_Role('stakeholders'), 'guest' );
		$this->_acl->addRole( new Zend_Acl_Role('reader'), 'guest' );
		
		$this->_acl->addRole( new Zend_Acl_Role('negocio'), 'guest' );
		$this->_acl->addRole( new Zend_Acl_Role('gerente'), 'guest' );
		$this->_acl->addRole( new Zend_Acl_Role('produtor'), 'guest' );
		$this->_acl->addRole( new Zend_Acl_Role('admin'), 'negocio' );
		$this->_acl->addRole( new Zend_Acl_Role('user'), 'guest' );
	}

	protected function _setupResources()
	{
		$this->_acl->addResource( new Zend_Acl_Resource('login') );
		$this->_acl->addResource( new Zend_Acl_Resource('upload') );
		$this->_acl->addResource( new Zend_Acl_Resource('error') );
		$this->_acl->addResource( new Zend_Acl_Resource('index') );
		$this->_acl->addResource( new Zend_Acl_Resource('usuarios') );
	}

	protected function _setupPrivileges()
	{
		
		$this->_acl->allow( 'guest', 'index', array('logout', 'login','index','edit-alterar-perfil','ajuda','lista-centro-custo','edit-centro-custo','add-centro-custo','delete-centro-custo','lista-compra','add-compra','edit-compra','delete-compra','add-projeto','add-servico','add-plano-acao','add-contato','add-noticia','edit-noticia','delete-noticia','lista-projeto','lista-tipo-projeto','edit-tipo-projeto','delete-tipo-projeto','lista-status-projeto','edit-status-projeto','delete-status-projeto') )
				   ->allow( 'guest', 'error', array('error', 'forbidden') );
	    $this->_acl->allow( 'user', 'index', array('index','logout','lista-remessa','view-remessa','add-projeto') );
		$this->_acl->allow( 'negocio', 'index', array('index', 'ranking-executivo-negocio','lista-fotos-evento','logout') );
				 
	    $this->_acl->allow( 'gerente', 'index', array('index', 'ranking-gerente','lista-fotos-evento','logout') );
	     $this->_acl->allow( 'produtor', 'index', array('index','lista-fotos-evento','logout','observacao-evento') );
	     $this->_acl->allow( 'produtor', 'upload', array('media','uploadjqAction','uploadjq','lista-videos','videos') );
				  
		$this->_acl->allow( 'admin', 'index' );
			$this->_acl->allow( 'admin', 'upload' );
	}

	protected function _saveAcl()
	{
		$registry = Zend_Registry::getInstance();
		$registry->set('acl', $this->_acl);
	}
}