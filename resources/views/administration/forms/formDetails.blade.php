@extends('administration.components.dashboard-layout')

@section('content')
<h1>Detalhes do Formulário</h1>

<div class="card">
    <p><strong>Usuclin:</strong> {{ $form->usuclin }}</p>
    <p><strong>Sistema:</strong> {{ $form->system_name }}</p>
    <p><strong>Migração:</strong> {{ $form->migration_id }}</p>
    <p><strong>Responsável:</strong> {{ $form->responsible }}</p>
    <p><strong>Relator:</strong> {{ $form->rapporteur }}</p>
    <p><strong>Migração:</strong> {{ $form->migration_id }}</p>
    <p><strong>Integridade dos Dados:</strong> {{ $form->data_integrity }}</p>
    <p><strong>Tempo de Entrega:</strong> {{ $form->delivery_time }}</p>
    <p><strong>Comunicação:</strong> {{ $form->communication }}</p>
    <p><strong>Satisfação Geral:</strong> {{ $form->overall_satisfaction }}</p>
    <p><strong>Comentário:</strong> {{ $form->comments }}</p>
</div>

<br>

<a href="{{ route('forms.index') }}">← Voltar para lista</a>
@endsection
