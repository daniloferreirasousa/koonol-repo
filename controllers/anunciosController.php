<?php
class anunciosController extends controller {
    public function index() {
       
        if(empty($_SESSION['cLogin'])) {
            header("Location:".BASE_URL);
            exit;
        }
        else {
            $dados = array();
            $a = new Anuncios();
		    $anuncios = $a->getMeusAnuncios();
            
            $dados['anuncios'] = $anuncios;

            $this->loadTemplate('anuncios', $dados);
        }
    }

    public function adicionar() {

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL);
            exit;
        } else {
            $dados = array();
            $a = new Anuncios();
            $c = new Categorias();
            $cats = $c->getLista();

            if(!empty($_POST['titulo']) && !empty($_POST['titulo'])) {
                $titulo = filter_input(INPUT_POST, 'titulo');
                $categoria = filter_input(INPUT_POST, 'categoria');
                $valor = filter_input(INPUT_POST, 'valor');
                $descricao = filter_input(INPUT_POST, 'descricao');
                $estado = filter_input(INPUT_POST, 'estado');

                $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
                header("Location: ".BASE_URL."anuncios");
                exit;
            }

            $dados['cats'] = $cats;

            $this->loadTemplate('adicionar', $dados);

            
        }
    }

    public function editar() {
         $info = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location:".BASE_URL);
            exit;
        } else {
            $dados = array();
            $a = new Anuncios();
            $c = new Categorias();
            $cats = $c->getLista();

            $id = filter_input(INPUT_GET,'id');

            if(isset($id) && !empty($id)) {
                $info = $a->getAnuncio($id);
                $id_categoria = $info['id_categoria'];
                $titulo = $info['titulo'];
                $valor = $info['valor'];
                $descricao = $info['descricao'];
                $estado = $info['estado'];
            
            } else {
               header("Location:".BASE_URL."anuncios");
               exit;
            }

            if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
                $titulo = addslashes($_POST['titulo']);
                $categoria = addslashes($_POST['categoria']);
                $valor = addslashes($_POST['valor']);
                $descricao = addslashes($_POST['descricao']);
                $estado = addslashes($_POST['estado']);
                
                if(isset($_FILES['fotos'])) {
                    $fotos = $_FILES['fotos'];
                } else {
                    $fotos = array();
                }

                $a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);
                header("Location: ".BASE_URL."anuncios");
                exit;    
            }
            $dados['cats'] = $cats;
            $dados['info'] = $info;
            $dados['id_categoria'] = $id_categoria;
            $dados['titulo'] = $titulo;
            $dados['valor'] = $valor;
            $dados['descricao'] = $descricao;
            $dados['estado'] = $estado;
            $dados['id'] = $id;
            $this->loadTemplate("editar", $dados);
            
            
        }
    }

    public function excluir() {
        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $id = filter_input(INPUT_GET,'id');
        if(isset($id) && !empty($id)) {
            $a = new Anuncios();
            $a->excluirAnuncio($id);
            
            header("Location: ".BASE_URL."anuncios");
            exit;
        } else{
            header("Location: ".BASE_URL."anuncios");
            exit;
        }

    }
}