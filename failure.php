<?php
session_start();

// Caminho para o diretório onde os comprovantes serão armazenados
$uploadDirectory = 'uploads/';

// Garante que o diretório de uploads exista
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// Verifica se o arquivo foi enviado via formulário
if (isset($_FILES['comprovante'])) {
    $file = $_FILES['comprovante'];

    // Checa se houve erro no envio do arquivo
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Gera um nome único para o arquivo
        $fileName = uniqid() . '-' . basename($file['name']);
        $filePath = $uploadDirectory . $fileName;

        // Valida o tipo de arquivo (por exemplo, imagem ou PDF)
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        if (!in_array($file['type'], $allowedMimeTypes)) {
            echo 'Tipo de arquivo não permitido. Envie uma imagem (JPEG/PNG) ou PDF.';
            exit();
        }

        // Limita o tamanho do arquivo (exemplo: 5MB)
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        if ($file['size'] > $maxFileSize) {
            echo 'O arquivo é muito grande. O tamanho máximo permitido é 5MB.';
            exit();
        }

        // Move o arquivo para o diretório de uploads
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Simula o processo de verificação do pagamento (aqui você pode integrar com o Pix)
            $_SESSION['payment_valid'] = true; // Simulação de pagamento validado

            echo 'Comprovante enviado com sucesso! Aguarde a verificação do pagamento.';
            // Redireciona para a página do curso ou desbloqueia o acesso
            header("Location: curso.php"); // Redireciona para a página do curso
            exit();
        } else {
            echo 'Erro ao enviar o comprovante. Por favor, tente novamente.';
        }
    } else {
        echo 'Erro no envio do arquivo. Código de erro: ' . $file['error'];
    }
} else {
    echo 'Nenhum arquivo foi enviado.';
}
?>
