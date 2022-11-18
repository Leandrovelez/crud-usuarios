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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <title>HOME</title>
</head>
<body>
    <div class="container justify-content pt-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title fw-bold">Lista de usuários</div>
                @if(!$users->isEmpty())
                <table class="table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data criação</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->nome}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->getCreateDate()}}</td>
                                <td>
                                    <a href="{{route('usuarios.edit', $user->id)}}" class="text-decoration-none">
                                        <div class="btn btn-primary" title="editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </div>
                                    </a>
                                    <button type="button" class="btn btn-danger bg-danger" data-bs-toggle="modal" data-bs-target="#confirmaExclusao" title="deletar" data-id="{{ $user->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <span>Nenhum usuário cadastrado</span>
                <br>
                <a href="{{route('usuarios.create')}}">
                    <div class="btn btn-primary mt-2">Cadastrar novo usuário</div>
                </a>
                @endif
                <div class="row mb-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="confirmaExclusao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmaExclusaoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmaExclusaoLabel">Confirmar exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja deletar o registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                    <form id="deleteForm" action="" method="GET">
                    @csrf
                        <input id="deleteConfirm" type="submit" value="Confirmar" class="btn btn-primary bg-primary" data-rota=""/>
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
    
    //Com essa função eu consigo manter o id a ser deletado e assim usar o modal do bootstrap para confirmar a exclusão,
    //que é mais bonito que o alert confirm do javascript
    $('#confirmaExclusao').on('show.bs.modal', function (event) {
            
        var button = $(event.relatedTarget);
        var idUsuario = button.data('id');
        var rota = "{{ route('usuarios.delete', 0) }}"
        rota = rota.replace('/0', '/'+idUsuario)
        
        $('#deleteConfirm').attr("data-rota", rota );
        
    })

    $(document).ready(function () {
        $("#deleteForm").submit(function (event) {
            var button = $('#deleteConfirm');
            var rotaDelete = button.data('rota');
            
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            type: "GET",
            url: rotaDelete,
            dataType: "json",
            encode: true,
            }).done(function (response) {
                if (!response.success) {
                    toastr.error(response.message)
                } else {
                    location.reload()
                }
            })

            event.preventDefault();
        });
    });
    
</script>
</html>