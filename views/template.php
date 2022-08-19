<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koonol</title>
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/css/style.css" />
</head>
<body>
    <?=md5('1204@Dan.');?>
    <nav class="navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="<?=BASE_URL;?>" class="navbar-brand">KOONOL</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <li><a href="<?=BASE_URL;?>anuncios">Meus Anúncios</a></li>
                    <li><a href="<?=BASE_URL;?>login/logout" onclick="return confirm('Deseja realmente encerrar a sessão?')">Sair</a></li>
                <?php else: ?>
                    <li><a href="<?=BASE_URL;?>cadastro">Cadastre-se</a></li>
                    <li><a href="<?=BASE_URL;?>login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav> 
    
    <section id="content">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </section>                    
    <footer>
        <span> &copy; Created by <b>Danilo Ferreira</b></span>
        All rights Reserved
    </footer>



    <scrip type="text/javascript" src="<?= BASE_URL; ?>assets/js/jquery.min.js"></script>
    <scrip type="text/javascript" src="<?= BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <scrip type="text/javascript" src="<?= BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>