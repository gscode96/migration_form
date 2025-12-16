<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário | Migração de Dados</title>
    <link rel="stylesheet" href="{{ asset('css/basic_create_user.css') }}">
</head>
<body>

<div class="container">
    <h2>Cadastrar Usuário</h2>

    <form method="POST" action="{{ route('administration.users.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Nome completo"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="usuario@email.com"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="••••••••"
                required
            >
        </div>
        <div class="form-group">
    <label for="password_confirmation">Confirmar senha</label>
    <input
        type="password"
        id="password_confirmation"
        name="password_confirmation"
        required
    >
    </div>
        <div class="actions">
            <button type="submit">Salvar Usuário</button>
        </div>
    </form>

    <div class="footer">
        Sistema de Migração de Dados
    </div>
</div>

</body>
</html>
