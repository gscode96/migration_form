<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistema de Migração</title>
    <link rel="stylesheet" href="{{ asset('css/basic_login.css') }}">
</head>
<body>

<div class="login-container">
    <h2>Acesso ao Sistema</h2>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="seu@email.com" 
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

        <button type="submit" class="btn-login">
            Entrar
        </button>
    </form>
    <div class="register-link">
        <a href="{{ route('administration.users') }}">Não possui uma conta? Cadastre-se</a>
    </div>
    <div class="footer-text">
        Sistema de Migração de Dados
    </div>
</div>

</body>
</html>
