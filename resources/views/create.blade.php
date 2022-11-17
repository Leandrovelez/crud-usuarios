<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8d70dac4bc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Cadastro</title>
</head>
<body>
<div class="container justify-content pt-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title fw-bold">Cadastrar novo usuário</div>
            <div class="d-flex justify-content-between">
                <form action="{{route('usuarios.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control mb-3"/>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="email" class="form-label">email</label>
                            <input type="text" name="email" class="form-control mb-3"/>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="senha" class="form-label">senha</label>
                            <input type="text" name="senha" class="form-control mb-3"/>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="data_nascimento" class="form-label">Data nascimento</label>
                            <input type="text" name="data_nascimento" class="form-control mb-3"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<style>
body{
    background-color: #D3D3D3;
}
</style>
</html>