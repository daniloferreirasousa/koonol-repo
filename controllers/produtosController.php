<?php
class produtosController extends controller {
    public function index() {}

    public function abrir($id) {
        $dados = array();
        
        $a = new Anuncios();
        $u = new Usuarios();

        if(empty($id)) {
            header("Location: ".BASE_URL);
        }

        $info = $a->getAnuncio($id);

        $dados['info'] = $info;

        $this->loadTemplate("produto", $dados);
    }
}