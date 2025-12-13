<!-- resources/views/satisfaction/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Satisfação da Migração</title>
</head>
<body>
<h2>Pesquisa de Satisfação – Migração de Dados</h2>

<form method="POST" action="/satisfacao/{{ $satisfaction->token }}">
    @csrf

    <label>Migração - {{ $satisfaction->migration_id }}</label><br>
    <label>Sistema Legado - {{ $satisfaction->system_name }}</label><br><br>
    <label>Codigo da base - {{ $satisfaction->usuclin }}</label><br><br>

    @foreach ([
        'data_integrity' => 'Integridade dos Dados',
        'delivery_time' => 'Tempo de Entrega',
        'communication' => 'Comunicação',
        'overall_satisfaction' => 'Satisfação Geral'
    ] as $field => $label)
        <label>{{ $label }}</label><br>
        @for ($i = 1; $i <= 5; $i++)
            <input type="radio" name="{{ $field }}" value="{{ $i }}" required> {{ $i }}
        @endfor
        <br><br>
    @endforeach

    <label>Houve perda de dados?</label><br>
    <select name="data_loss">
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select><br><br>

    <label>Observações</label><br>
    <textarea name="comments"></textarea><br><br>

    <button type="submit">Enviar</button>
</form>
</body>
</html>
