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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <title>Cadastro</title>
</head>
<body>
<div class="container justify-content-center d-flex pt-4">
    <div class="card"  style="max-width: 936px">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title fw-bold">Cadastrar novo usuário</div>
                <div class="card-title fw-bold">
                    <small class="text-secondary">Data de criação: {{$user->getCreateDate()}}</small>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <form action="" method="POST" id="formUpdate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control mb-3" value="{{$user->nome}}"/>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="email" class="form-label">email</label>
                            <input type="text" name="email" id="email" class="form-control mb-3" value="{{$user->email}}"/>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="senha" class="form-label">senha</label>
                            <input type="password" name="senha" id="senha" class="form-control mb-3" value="{{$user->getSenha()}}"/>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="data_nascimento" class="form-label">Data nascimento</label>
                            <input type="text" name="data_nascimento" id="data_nascimento" class="form-control mb-3" value="{{$user->data_nascimento}}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 justify-content-around">
                            <input type="submit" name="enviar" value="Salvar" class="btn btn-primary"/>
                            <a href="{{route('usuarios.index')}}" class="text-decoration-none">
                                <div class="btn btn-danger">Cancelar</div>
                            </a>
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
<script>
    $(document).ready(function () {
        $("#formUpdate").submit(function (event) {
            var formData = {
                nome: $("#nome").val(),
                email: $("#email").val(),
                senha: $("#senha").val(),
                data_nascimento: $("#data_nascimento").val(),
            };

            $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            type: "PUT",
            url:"{{route('usuarios.update', $user->id)}}",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (response) {
                if (!response.success) {
                    toastr.error(response.message)
                } else {
                    toastr.success(response.message)
                }
            })

            event.preventDefault();
        });
    });
</script>
</html>