<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/basic_dashboard.css') }}">
</head>
<body>
<div class="layout">

    <div class="sidebar">
   
        <h2>Migração</h2>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('forms.index') }}">Formulários</a>
        <a href="#">Indicadores</a>
        <a href="#">Relatórios</a>
<form method="POST" action="{{ route('logout') }}" class="logout-form">
    @csrf
    <button type="submit" class="sidebar-link logout-btn">
        Sair
    </button>
     <p><strong>{{ auth()->user()->name }}</strong></p>
</form>

    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

</body>
</html>
