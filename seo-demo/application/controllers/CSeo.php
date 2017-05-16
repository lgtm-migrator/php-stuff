<?php
/*
Crea páginas principalmente para los usuarios, no para los motores de búsqueda
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class CSeo extends CI_Controller {
	public function index(){
		// Variables para SEO
		$data['titulo'] = 'SEO para dummies dinamico';
		$data['descripcion'] = 'Aqui aprenderas como debe usarse SEO en CI con PHP';
		//Google reconoce esto y provee link para traducir el sitio automaticamente
		$data['google'] = 'notranslate';
		//Google reconoce esto y en el buscador, permite que el usuario encuentre contenido en el idioma que busca
		$data['es'] = site_url('traducir/es');
		//Header
		$this->load->view('plantillas-seo/header', $data);
        //Body
        $this->load->view('body');
        //Footer
        $this->load->view('plantillas-seo/footer');
	}
}
?>
