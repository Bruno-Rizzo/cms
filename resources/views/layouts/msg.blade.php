@if (session('add'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.success('Usuário cadastrado com sucesso!', 'Cadastro de Usuários');
});
</script>
@endif

@if (session('edit'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.info('Usuário editado com sucesso!', 'Editar Usuário');
});
</script>
@endif

@if (session('del'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.error('Usuário excluído com sucesso!', 'Excluir Usuário');
});
</script>
@endif

@if (session('config'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.info('Perfil editado com sucesso!', 'Editar Perfil');
});
</script>
@endif

@if (session('pageAdd'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.success('Página criada com sucesso!', 'Cadastro de Página');
});
</script>
@endif

@if (session('pageEdit'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.info('Página editada com sucesso!', 'Editar Página');
});
</script>
@endif

@if (session('pageDel'))
<script>
    $(document).ready(function() {
    toastr.options = {
        "progressBar": true,
        "timeOut": "2800",
        "positionClass": "toast-top-right"
    }
    toastr.error('Página excluída com sucesso!', 'Excluir Página');
});
</script>
@endif