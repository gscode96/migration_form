<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa de Satisfação | Migração de Dados</title>
    <link rel="stylesheet" href="{{ asset('css/basic_form.css') }}">
</head>
<body>

<div class="container">

    <h2>Pesquisa de Satisfação</h2>
    <div class="subtitle">
        Sua opinião é muito importante para melhorarmos nossos processos.
    </div>

    <!-- Informações da migração -->
    <div class="info">
        <div><strong>Cliente:</strong> {{ $satisfaction->usuclin ?? '---' }}</div>
        <div><strong>Sistema Legado:</strong> {{ $satisfaction->system_name ?? '---' }}</div>
        <div><strong>Migração:</strong> {{ $satisfaction->migration_id ?? '---' }}</div>
        <div><strong>Responsável:</strong> {{ $satisfaction->responsible ?? '---' }}</div>
        <div><strong>Relator:</strong> {{ $satisfaction->rapporteur ?? '---' }}</div>
    </div>

    <form method="POST" action="{{ route('satisfaction.submit', ['token' => $satisfaction->token]) }}">
        @csrf

        <!-- Perguntas escala 1 a 5 -->
        <div class="question">
            <label>Integridade dos dados</label>
            <div class="scale">
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="data_integrity" value="{{ $i }}">
                        {{ $i }}
                    </label>
                @endfor
            </div>
        </div>

        <div class="question">
            <label>Tempo de entrega</label>
            <div class="scale">
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="delivery_time" value="{{ $i }}">
                        {{ $i }}
                    </label>
                @endfor
            </div>
        </div>

        <div class="question">
            <label>Comunicação</label>
            <div class="scale">
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="communication" value="{{ $i }}">
                        {{ $i }}
                    </label>
                @endfor
            </div>
        </div>

        <div class="question">
            <label>Satisfação geral</label>
            <div class="scale">
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="overall_satisfaction" value="{{ $i }}">
                        {{ $i }}
                    </label>
                @endfor
            </div>
        </div>

        <!-- Pergunta objetiva -->
        <div class="question">
            <label>Houve perda de dados?</label>
            <select name="data_loss">
                <option value="">Selecione</option>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <!-- Comentários -->
        <div class="question">
            <label>Observações</label>
            <textarea name="comments" placeholder="Deixe aqui seu comentário (opcional)"></textarea>
        </div>

        <div class="actions">
            <button type="submit">Enviar avaliação</button>
        </div>
    </form>

    <div class="footer">
        Sistema de Migração de Dados
    </div>

</div>

</body>
</html>
