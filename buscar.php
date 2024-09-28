<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Senac Report</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding-top: 50px;
    height: 100vh;
    background: linear-gradient(to right, #9B30FF, #4B0082), linear-gradient(to right, #FF69B4, #8A2BE2);
    background-blend-mode: overlay;
    color: #fff;
}

.container {
    width: 80%;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    color: #000;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #000;
    padding-bottom: 10px;
}

.logo img {
    width: 100px;
}

.header-text {
    text-align: center;
    flex: 1;
}

.header-text p {
    margin: 5px 0;
}

.date {
    text-align: right;
}

.date p {
    margin: 5px 0;
}

.student-info {
    margin: 20px 0;
}

.student-info p {
    margin: 5px 0;
}

.student-info span {
    font-weight: bold;
}

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead th, tbody td {
    border: 1px solid #000;
    padding: 5px;
    text-align: center;
    font-size: 12px; /* Ajuste o tamanho da fonte conforme necessário */
}

footer {
    text-align: center;
    margin-top: 20px;
    border-top: 1px solid #000;
    padding-top: 10px;
}

/* Estilo do painel do menu lateral */
.menu-lateral {
    background-color: #f0f0f0; /* cor de fundo do menu */
    width: 60px; /* largura do menu */
    height: 100vh; /* altura total da tela */
    box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1); /* sombra sutil */
    position: fixed; /* fixo na tela */
    left: 0; /* alinhado à esquerda */
    top: 0; /* alinhado ao topo */
    overflow-y: auto; /* barra de rolagem se necessário */
}

/* Estilo dos itens do menu */
.item-menu {
    padding: 15px 20px; /* espaçamento interno */
    border-bottom: 1px solid #ddd; /* linha divisória */
    color: #333; /* cor do texto */
    font-family: 'Arial', sans-serif; /* tipo de fonte */
    font-size: 16px; /* tamanho da fonte */
    text-decoration: none; /* sem sublinhado */
    display: block; /* ocupa a largura toda */
    transition: background-color 0.3s; /* transição suave de cores */
    margin-left: -12px;
}

.item-menu:hover {
    background-color: #e9e9e9; /* cor de fundo ao passar o mouse */
}

/* Estilo do item ativo */
.item-menu.ativo {
    background-color: #ddd; /* cor de fundo do item ativo */
    color: purple; /* cor do texto do item ativo */
}

#turmas {
    display: flex;
    flex-wrap: wrap; /* Permite que os itens sejam alinhados em múltiplas linhas */
    justify-content: flex-start; /* Alinha os itens ao início do container */
    padding: 20px;
}

.card-turma {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 35px;
    width: calc(50% - 20px); /* Ajusta a largura para caber dois elementos por linha */
    box-sizing: border-box; /* Garante que padding e border sejam incluídos na largura total */
    position: relative;
}

</style>

    <!-- <style>
      body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .logo img {
            width: 150px;
        }
        .header-text {
            text-align: center;
        }
        .student-info {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style> */ -->
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="assets/img/download.png" alt="Senac Logo">
            </div>
            <div class="header-text">
                <p>SERVIÇO NACIONAL DE APRENDIZAGEM COMERCIAL</p>
                <p>DEPARTAMENTO REGIONAL DE PERNAMBUCO</p>
                <p>UNIDADE EDUCAÇÃO PROFISSIONAL DO PAULISTA</p>
                <p>CURSO TÉCNICO DE INFORMÁTICA INTEGRADO AO ENSINO MÉDIO</p>
                <p>CURSO TÉCNICO EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS INTEGRADO AO ENSINO MÉDIO</p>
            </div>
            <div class="date">
                <p>DATA</p>
                <p><time datetime="<?php echo date('c'); ?>"><?php echo date('d/m/Y'); ?></time></p>
            </div>
        </header>
        
        <div class="student-info">
            <form method="GET" action="">
                <label for="student-name">NOME:</label>
                <input type="text" id="student-name" name="nome" required>
                <button type="submit">Buscar</button>
               <p>TURMA: B</p> 
               <p>ANO: 2024</p>



            </form>
        </div>
        
        <?php
        // Incluir o arquivo de conexão
        include 'conexao.php';

        // Verificar se o parâmetro 'nome' foi passado pela URL e não está vazio
        if (isset($_GET['nome']) && !empty($_GET['nome'])) {
            $nome = $_GET['nome'];

            // Query para buscar alunos pelo nome nas três tabelas
            $sql =  " SELECT 
            u1.nome, u1.disciplina, u1.turma,
            u1.av1_1, u1.av2_1, u1.conceito_1, u1.noa_1,
            u2.av1_2, u2.av2_2, u2.conceito_2, u2.noa_2,
            u3.av1_3, u3.av2_3, u3.conceito_3, u3.noa_3
        FROM unidade1 u1
        LEFT JOIN unidade2 u2 ON u1.nome = u2.nome AND u1.disciplina = u2.disciplina AND u1.turma = u2.turma
        LEFT JOIN unidade3 u3 ON u1.nome = u3.nome AND u1.disciplina = u3.disciplina AND u1.turma = u3.turma
        WHERE u1.nome LIKE '%$nome%' 
    ";

            // Executar a query
            $result = $conexao->query($sql);

            // Verificar se há resultados
            if ($result->num_rows > 0) {
                echo "<h2>Resultado para: " . htmlspecialchars($nome) . "</h2>";
                echo "
                <table>
                    <thead>
                        <tr>
                            <th rowspan='2'>COMPONENTE CURRICULAR</th>
                            <th colspan='2'>1ª UNIDADE</th>
                            <th colspan='2'>MENÇÃO</th>
                            <th colspan='2'>2ª UNIDADE</th>
                            <th colspan='2'>MENÇÃO</th>
                            <th colspan='2'>3ª UNIDADE</th>
                            <th colspan='2'>MENÇÃO</th>
                            <th>MENÇÃO FINAL ANUAL</th>
                            <th>TOTAL DE FALTAS</th>
                            <th>MENÇÃO FINAL ANUAL PÓS NOA</th>
                            <th>RESULTADO FINAL</th>
                        </tr>
                        <tr>
                            <th>AV1</th>
                            <th>AV2</th>
                            <th>Unidade</th>
                            <th>Pós NOA</th>
                            <th>AV1</th>
                            <th>AV2</th>
                            <th>Unidade</th>
                            <th>Pós NOA</th>
                            <th>AV1</th>
                            <th>AV2</th>
                            <th>Unidade</th>
                            <th>Pós NOA</th>
                            <th colspan='4'></th>
                        </tr>
                    </thead>
                    <tbody>";
                
                // Exibir cada linha de resultado
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . ($row['disciplina']) . "</td>
                            <td>" . ($row['av1_1']) . "</td>
                            <td>" . ($row['av2_1']) . "</td>
                            <td>" . ($row['conceito_1']) . "</td>
                            <td>" . ($row['noa_1']) . "</td>
                            <td>" . ($row['av1_2']) . "</td>
                            <td>" . ($row['av2_2']) . "</td>
                            <td>" . ($row['conceito_2']) . "</td>
                            <td>" . ($row['noa_2']) . "</td>
                            <td>" . ($row['av1_3']) . "</td>
                            <td>" . ($row['av2_3']) . "</td>
                            <td>" . ($row['conceito_3']) . "</td>
                            <td>" . ($row['noa_3']) . "</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                          </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p>Nenhum aluno encontrado com o nome '$nome'.</p>";
            }
        } else {
            echo "<p>Por favor, insira um nome para buscar.</p>";
        }

        // Fechar a conexão
        $conexao->close();
        ?>
        <footer>
            <p>COORDENAÇÃO PEDAGÓGICA</p>
        </footer>
    </main>
</div>
<button onclick="window.print()">Imprimir</button>
    </div>
</body>
</html>
