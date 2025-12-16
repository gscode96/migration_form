<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Migração de Dados</title>
    <link rel="stylesheet" href="{{ asset('css/basic_dashboard.css') }}">
</head>
<body>

<!-- MENU -->
<div class="sidebar">
    <h2>Migração</h2>
    <a href="#">Dashboard</a>
    <a href="#">Formulários Respondidos</a>
    <a href="#">Indicadores</a>
    <a href="#">Relatórios</a>
    <a href="#">Sair</a>
</div>

<!-- CONTEÚDO -->
<div class="content">
    <h1>Dashboard Administrativo</h1>

    <!-- INDICADORES -->
    <div class="cards">
        <div class="card">
            <h3>Formulários Enviados</h3>
            <div class="value">128</div>
        </div>

        <div class="card">
            <h3>Formulários Respondidos</h3>
            <div class="value">92</div>
        </div>

        <div class="card">
            <h3>Média de Satisfação (Trimestre)</h3>
            <div class="value">4.3</div>
        </div>

        <div class="card">
            <h3>Perda de Dados Reportada</h3>
            <div class="value">5</div>
        </div>
    </div>

    <!-- TABELA -->
    <div class="table-container">
        <h3>Últimos Formulários Respondidos</h3>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Sistema</th>
                    <th>Migração</th>
                    <th>Satisfação</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Clínica Vida</td>
                    <td>Sistema X</td>
                    <td>MIG-123</td>
                    <td>5</td>
                    <td><span class="badge badge-success">Concluído</span></td>
                </tr>
                <tr>
                    <td>Hospital Alpha</td>
                    <td>Sistema Y</td>
                    <td>MIG-124</td>
                    <td>3</td>
                    <td><span class="badge badge-warning">Atenção</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        Sistema de Migração de Dados
    </div>
</div>

</body>
</html>
