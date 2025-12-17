@extends('administration.components.dashboard-layout')

@section('title', 'Dashboard Administrativo')

@section('content')

<h1>Dashboard Administrativo</h1>

<div class="cards">
    <div class="card">
        <h3>Formulários Enviados</h3>
        <div class="value">{{ $totalSatisfactions }}</div>
    </div>

    <div class="card">
        <h3>Formulários Respondidos</h3>
        <div class="value">{{ $totalanswered }}</div>
    </div>

    <div class="card">
        <h3>Média de Satisfação (Trimestre)</h3>
        <div class="value">{{ $percentage }}%</div>
    </div>

    <div class="card">
        <h3>Perda de Dados Reportada</h3>
        <div class="value">{{ $totalLostData }}</div>
    </div>
</div>

<div class="table-container">
    <h3>Últimos Formulários Respondidos</h3>

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
        @foreach ($satisfaction as $item)
            <tr>
                <td>{{ $item->usuclin ?? '---' }}</td>
                <td>{{ $item->system_name ?? '---' }}</td>
                <td>{{ $item->migration_id ?? '---' }}</td>
                <td>{{ $item->overall_satisfaction ?? '---' }}</td>
                <td>
                    @if ($item->overall_satisfaction)
                        <span class="badge badge-success">Respondido</span>
                    @else
                        <span class="badge badge-warning">Pendente</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
