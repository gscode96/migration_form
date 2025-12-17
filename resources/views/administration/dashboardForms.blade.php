@extends('administration.components.dashboard-layout')

@section('content')
<h1>Formulários</h1>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Usuclin</th>
                <th>Sistema</th>
                <th>Migração</th>
                <th>Satisfação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->usuclin }}</td>
                    <td>{{ $form->system_name }}</td>
                    <td>{{ $form->migration_id }}</td>
                    <td>{{ $form->overall_satisfaction ?? 'Pendente' }}</td>
                    <td>
                        <a href="{{ route('forms.show', $form->id) }}">
                            Ver detalhes
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
