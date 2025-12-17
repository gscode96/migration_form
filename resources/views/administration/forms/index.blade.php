@extends('administration.components.dashboard-layout')

@section('content')
<h1>Formulários</h1>

<form method="GET" class="filters">

    <div class="filter-group">
        <label>Data inicial</label>
        <input type="date" name="start_date" value="{{ request('start_date') }}">
    </div>

    <div class="filter-group">
        <label>Data final</label>
        <input type="date" name="end_date" value="{{ request('end_date') }}">
    </div>

    <div class="filter-group">
        <label>Status</label>
        <select name="answered">
            <option value="">Todos</option>
            <option value="yes" {{ request('answered') == 'yes' ? 'selected' : '' }}>
                Respondidos
            </option>
            <option value="no" {{ request('answered') == 'no' ? 'selected' : '' }}>
                Não respondidos
            </option>
        </select>
    </div>

    <button type="submit" class="btn-filter">
        Filtrar
    </button>

    <a href="{{ route('forms.export', request()->query()) }}" class="btn-export">
        Exportar CSV
    </a>
</form>

<div class="cards">
    <div class="card">
        <h3>Média de Satisfação</h3>

        <div class="value">
            {{ $averagePercentage !== null ? $averagePercentage . '%' : '—' }}
        </div>

        <small style="color:#666">
            Considerando os filtros aplicados
        </small>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Usuclin</th>
            <th>Sistema</th>
            <th>Migração</th>
            <th>Status</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($forms as $form)
            <tr>
                <td>{{ $form->usuclin }}</td>
                <td>{{ $form->system_name }}</td>
                <td>{{ $form->migration_id }}</td>
                <td>
                    {{ $form->overall_satisfaction ? 'Respondido' : 'Não respondido' }}
                </td>
                <td>{{ $form->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('forms.show', $form->id) }}">Ver</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $forms->withQueryString()->links() }}
@endsection
