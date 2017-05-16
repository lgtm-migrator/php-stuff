<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTraducir extends CI_Controller {
	public function index($idioma){
		if($idioma == 'es'){
            echo '<html>
                        <head>
                          <title>Pagina traducida</title>
                        </head>
                        <body>
                          <h1>Pagina traducida</h1>
                        </body>
                        </html>';
        }
	}
}
?>
