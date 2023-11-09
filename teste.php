<?php
function gerarNumerosAleatorios()
{
    $vetor = array();
    $somaPositivos = 0;
    $quantidadeNegativos = 0;

    for ($i = 0; $i < 20; $i++) {
        $numero = rand(-100, 100);
        $vetor[] = $numero;

        if ($numero > 0) {
            $somaPositivos += $numero;
        } elseif ($numero < 0) {
            $quantidadeNegativos++;
        }
    }

    echo "Soma dos elementos positivos: $somaPositivos\n";
    echo "<br>";

    echo "Quantidade de números negativos: $quantidadeNegativos\n";
    echo "<br>";

    return $vetor;
}


function compararVetores($vetor1, $vetor2)
{
    $comuns = array_intersect($vetor1, $vetor2);
    $naoComuns = array_merge(array_diff($vetor1, $vetor2), array_diff($vetor2, $vetor1));
    $inexistentes = array_diff(range(0, 30), array_merge($vetor1, $vetor2));

    echo "Números comuns: " . implode(", ", $comuns) . "\n";
    echo "<br>";
    echo "Números não comuns: " . implode(", ", $naoComuns) . "\n";
    echo "<br>";
    echo "Números inexistentes nos dois vetores: " . implode(", ", $inexistentes) . "\n";
    echo "<br>";
}


function gerarTabelaQuadrada($lado)
{
    echo "<table border='1'>";

    for ($i = 1; $i <= $lado; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $lado; $j++) {
            echo "<td>" . ($i * $j) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}


function gerarTabela($linhas, $colunas)
{
    echo "<table border='1'>";

    for ($i = 1; $i <= $linhas; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $colunas; $j++) {
            echo "<td>" . "Linha $i, Coluna $j" . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}


function gerarChaveEuromilhoes()
{
    // Gera 5 números inteiros não repetidos no intervalo [1, 50]
    $numeros = array();
    while (count($numeros) < 5) {
        $numero = rand(1, 50);
        if (!in_array($numero, $numeros)) {
            $numeros[] = $numero;
        }
    }

    // Gera 2 estrelas no intervalo [1, 12]
    $estrelas = array();
    while (count($estrelas) < 2) {
        $estrela = rand(1, 12);
        if (!in_array($estrela, $estrelas)) {
            $estrelas[] = $estrela;
        }
    }

    // Ordena os números e estrelas
    sort($numeros);
    sort($estrelas);

    // Imprime a chave gerada
    echo "Chave do Euromilhões: Números [" . implode(", ", $numeros) . "], Estrelas [" . implode(", ", $estrelas);
    echo "<br>";
}


function verificarChavesEuromilhoes($chaveSorteio, $chaveUsuario)
{
    // Verifica os números corretos
    $numerosCorretos = array_intersect($chaveSorteio['numeros'], $chaveUsuario['numeros']);

    // Verifica as estrelas corretas
    $estrelasCorretas = array_intersect($chaveSorteio['estrelas'], $chaveUsuario['estrelas']);

    // Imprime os resultados
    echo "Números corretos: " . implode(", ", $numerosCorretos);
    echo "<br>";
    echo "Estrelas corretas: " . implode(", ", $estrelasCorretas);
    echo "<br>";

    // Retorna o número total de elementos corretos
    $totalCorretos = count($numerosCorretos) + count($estrelasCorretas);
    return $totalCorretos;
}

//EXERCÍCIO 1
echo "<h3>Exercicio 1</h3>";
// Chamando a função e armazenando o vetor gerado
$vetorGerado = gerarNumerosAleatorios();

// Imprimindo o vetor gerado
echo "Vetor gerado: " . implode(", ", $vetorGerado);


//EXERCÍCIO 2
echo "<h3>Exercicio 2</h3>";
// Gerando dois vetores com 10 números aleatórios inteiros entre 0 e 30
$vetor1 = array_map(function () {
    return rand(0, 30);
}, range(1, 10));
$vetor2 = array_map(function () {
    return rand(0, 30);
}, range(1, 10));

// Chamando a função com os dois vetores
compararVetores($vetor1, $vetor2);


//EXERCÍCIO 3
echo "<h3>Exercicio 3</h3>";
// Chamando a função com um argumento, por exemplo, 5
gerarTabelaQuadrada(5);


//EXERCÍCIO 4
echo "<h3>Exercicio 4</h3>";
// Chamando a função com dois argumentos, por exemplo, 3 linhas e 4 colunas
gerarTabela(3, 4);


//EXERCÍCIO 5
echo "<h3>Exercicio 5</h3>";
// Chamando a função para gerar a chave do Euromilhões
gerarChaveEuromilhoes();


//EXERCÍCIO 6
echo "<h3>Exercicio 6</h3>";
// Exemplo de chaves do Euromilhões
$chaveSorteio = array('numeros' => [5, 10, 15, 20, 25], 'estrelas' => [3, 8]);

// Chave do usuário (pode ser gerada pela função anterior)
$chaveUsuario = array('numeros' => [5, 15, 25, 30, 35], 'estrelas' => [3, 8]);

// Chamando a função para verificar os elementos corretos
$totalCorretos = verificarChavesEuromilhoes($chaveSorteio, $chaveUsuario);

echo "Total de elementos corretos: $totalCorretos";
echo "<br>";


?>