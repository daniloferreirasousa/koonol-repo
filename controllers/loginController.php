<?php
class loginController extends controller {
    public function index() {
        $dados = array();

        $u = new Usuarios();
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');

            if($u->login($email, $senha)) {
                header("Location:".BASE_URL);
                exit;
            } else {
                header("Location:".BASE_URL);
                exit;
            }

        }

        $this->loadTemplate('login', $dados);
    }

    public function logout() {
        $u = new Usuarios();

        session_start();
        unset($_SESSION['cLogin']);
        header("Location:".BASE_URL);
        exit;
    }
}