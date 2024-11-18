<?php
session_start();

// Verifica se o pagamento foi validado
if (!isset($_SESSION['payment_valid']) || $_SESSION['payment_valid'] !== true) {
    // Se o pagamento não for validado, redireciona para a página de envio do comprovante
    header("Location: index.php"); // Redireciona para a página do formulário
    exit();
}

// Caso o pagamento tenha sido validado, exibe o curso
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Completo de Inteligência Artificial</title>
</head>
<body>
    <h1>Curso Completo de Inteligência Artificial</h1>
    <p>Parabéns! Seu pagamento foi confirmado. Agora você tem acesso ao conteúdo do curso.</p>

    <h2>Conteúdo do Curso</h2>
    <ul>
        <li>Fundamentos da Inteligência Artificial</li>
        <li>Técnicas de Aprendizado de Máquina</li>
        <li>Redes Neurais e Aprendizado Profundo</li>
        <li>Processamento de Linguagem Natural (NLP)</li>
        <li>Visão Computacional</li>
        <li>Aplicações Práticas da IA</li>
        <li>Ferramentas e Bibliotecas</li>
    </ul>

    <p>Acesse os materiais, vídeos e artigos através do menu abaixo.</p>

    <!-- Aqui você pode adicionar links ou botões para acessar o conteúdo do curso -->
    <ul>
        <li><a href="modulo1.php">Módulo 1: Introdução à IA</a></li>
        <li><a href="modulo2.php">Módulo 2: Aprendizado de Máquina</a></li>
        <li><a href="modulo3.php">Módulo 3: Redes Neurais</a></li>
        <!-- Adicione outros módulos conforme necessário -->
    </ul>
</body>
</html>
