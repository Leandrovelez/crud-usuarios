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
    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script type="text/javascript" src="{{ asset('../../js/jquery.mask.js') }}"></script>
    <title>Cadastro</title>
</head>
<body>
<div class="container justify-content-center d-flex pt-4">
    <div class="card" style="max-width: 936px">
        <div class="card-body">
            <div class="card-title fw-bold">Cadastrar novo usuário</div>
            <div class="d-flex justify-content-around">
                <form action="" method="POST" id="form">
                    @csrf
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                                <label for="nome" class="form-label">Nome<small class="text-danger">*</small></label>
                                <input type="text" name="nome" id="nome" class="form-control" required/>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                                <label for="email" class="form-label">email<small class="text-danger">*</small></label>
                                <input type="email" name="email" id="email" class="form-control" required/>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                                <label for="senha" class="form-label">senha<small class="text-danger">*</small></label>
                                <input type="text" name="senha" id="senha" class="form-control" required/>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                                <label for="data_nascimento" class="form-label">Data nascimento</label>
                                <input type="text" name="data_nascimento" id="data_nascimento" class="form-control"/>
                            </div>
                        </div>
                    </fieldset>
                        
                    <div class="row">
                        <div class="col-12 justify-content-around pt-3">
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
.error{
    color: red;
}
</style>

<script>
    /*
    $("#form").validate({
        debug: false,
        rules: {
            nome: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            senha:{
                minlength: 8,
            }
        },
        messages:{
            nome: {
                accept: "O nome é obrigatório"
            },
            senha: {
                accept: "A senha deve ter no mínimo 8 caracteres"
            }
        }
    });
    */
    
    $("#form").validate({
        rules:{
            nome: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 8
            }
        },
        messages:{
            nome: {
                required: "O nome é obrigatório"
            },
            email: {
                required: "O e-mail é obrigatório",
                email: "Digite um e-mail válido"
            },
            senha: {
                required: "A senha é obrigatória",
                minlength: "A senha deve ter no mínimo 8 caracteres"
            },
        },
        submitHandler: function(form) {
        
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
            type: "POST",
            url: "{{route('usuarios.store')}}",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (response) {
                if (!response.success) {
                    toastr.error(response.message)
                } else {
                    toastr.success(response.message)
                    document.getElementById("form").reset()
                }
            })
               
        }
    });

    $(document).ready(function () {
        $('#data_nascimento').mask('00/00/0000');
    });

</script>
</html>