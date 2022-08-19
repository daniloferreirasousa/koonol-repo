<?php
class cadastroController extends controller {
    public function index() {
        $dados = array();

        $u = new Usuarios();
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = filter_input(INPUT_POST, 'nome');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');
            $telefone = filter_input(INPUT_POST, 'telefone');

            if(!empty($nome) && !empty(filter_var($email, FILTER_SANITIZE_EMAIL)) && !empty($senha) && !empty($telefone)) {
                $u->cadastrar($nome, $email, $senha, $telefone);
                header("Location:".BASE_URL."login");
                exit;
            } else {
                header("Location: ".BASE_URL."cadastro");
                exit;
            }
        }
            $this->loadTemplate('cadastro', $dados);
    }
}