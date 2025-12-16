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
    
    <!-- TABELA -->
    <div class="table-container">
        <h3>Últimos Formulários Respondidos</h3>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Usuclin</th>
                    <th>Sistema</th>
                    <th>Migração</th>
                    <th>Satisfação</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>@foreach ($satisfaction as $satisfaction_item)
                    <td>{{ $satisfaction_item->usuclin ?? '---' }}</td>
                    <td>{{ $satisfaction_item->system_name ?? '---' }}</td>
                    <td>{{ $satisfaction_item->migration_id ?? '---' }}</td>
                    <td>{{ $satisfaction_item->overall_satisfaction ?? '---' }}</td>

                    @if ($satisfaction_item->overall_satisfaction)
                        <td><span class="badge badge-success">Respondido</span></td> 
                    @else
                        <td><span class="badge badge-warning">Pendente</span></td>
                    @endif
                </tr>
                    
                @endforeach
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
