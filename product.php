<!DOCTYPE html>
<head>

    <!--charset localiza os caracteres permitindo ç-->

    <meta charset="UTF-8">

    <title>Toka dos Brinquedos e Colecionaveis</title>

    <link rel="stylesheet" href="produto.css">

</head>
<body>


    <header id ="cab">
        
        <div class="b_sup">

            <button class="Cat"><img src="img/icone/menu_burger.png"></button>

            <div class="lg">
                <button onclick="window.location.href='index.html'">
                <img src="img/icone/logo/Toka Logo-01.png">
                </button>
            </div>
                
            <div class="b_psq">
                <input type="text">
                <button class="psq_icon"><img src="img/icone/search-alt-2-regular-24.png"></button>
            </div>

            <div class="b_sup_btns">
                <a href="entrar.html">
                    <button class="Ent">Entrar</button>
                </a>
                <a href="crie sua conta.html">
                    <button class="Cr_s_c">Crie sua Conta</button>
                </a>
            </div>

        </div>
    </header>

    <?php

$servername = "localhost";
$username = "root";
$password = "-951753/8520+654";
$dbname = "cadastros";

$conn = new mysqli($servername, $username, $password, $dbname);

$produto_id = $_GET['Nome'];

$sql = "SELECT Nome, Img_pdt, Img_pdt2, Img_pdt3, Img_pdt4, Img_pdt5, Video_pdt, Preço, dscr, tags, espec, catg FROM cadastros WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $produto_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $nomeProduto = $row['Nome'];
        $imagemProduto = $row['Img_pdt'];
        $imagemProduto2 = $row['Img_pdt2'];
        $imagemProduto3 = $row['Img_pdt3'];
        $imagemProduto4 = $row['Img_pdt4'];
        $imagemProduto5 = $row['Img_pdt5'];
        $vidProduto = $row["Video_pdt"];
        $precoProduto = $row['Preço'];
        $descricaoProduto = $row['dscr'];
        $tagsProduto = $row['tags'];
        $especsProduto = $row['espec'];
        $categoriasProduto = $row['catg'];

        // Restante do seu código para exibir os resultados
    } else {
        echo "Nenhum resultado encontrado para o ID do produto: " . $produto_id;
    }

    //postar comentários
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $produto_id = $_POST['Nome'];
        $usuario = "Nome do Usuário";
        $comentario = $_POST['comentario'];

        // Reabra a conexão antes de preparar o statement
        $stmt = $conn->prepare("INSERT INTO cadastros (Nome, usuario, comentario) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $produto_id, $usuario, $comentario);

        if ($stmt->execute()) {
            echo "Comentário postado com sucesso!";
        } else {
            echo "Erro ao postar o comentário: " . $stmt->error;
        }

        $stmt->close();
    }

    //Exibir os comentários
    $sql_comentarios = "SELECT usuario, comentario FROM comentarios WHERE Nome = ?";
    $stmt_comentarios = $conn->prepare($sql_comentarios);

    if ($stmt_comentarios) {
        $stmt_comentarios->bind_param("i", $produto_id);
        $stmt_comentarios->execute();
        $result_comentarios = $stmt_comentarios->get_result();

        if ($result_comentarios->num_rows > 0) {
            echo '<div class="comentarios">';
            while ($row_comentario = $result_comentarios->fetch_assoc()) {
                echo '<div class="comentario">';
                echo '<p><strong>' . $row_comentario['usuario'] . '</strong>' . $row_comentario['comentario'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>Esta página não possui comentários ainda. Caso tenha algo a dizer sobre o produto, seja o primeiro ;)</p>';
        }

        $stmt_comentarios->close();
    } else {
        echo "Erro na consulta de comentários: " . $stmt_comentarios->error;
    }

    $conn->close();
}
?>  
        <div class="product-image">
                <img src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto; ?>">
                <video src="caminho/para/o/diretorio/de/imagens/<?php echo $vidProduto; ?>">
            </div>

            <div class="additional-images" style="margin-top: 3%">
                <?php if (!empty($imagemProduto)): ?>
                    <img class="additional-image" style="border-radius: 10%; width: 75px; height: 75px;" src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto; ?>">
                <?php endif; ?>

                <?php if (!empty($imagemProduto2)): ?>
                    <img class="additional-image" style="border-radius: 10%; width: 75px; height: 75px;" src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto2; ?>">
                <?php endif; ?>

                <?php if (!empty($imagemProduto3)): ?>
                    <img class="additional-image" style="border-radius: 10%; width: 75px; height: 75px;" src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto3; ?>">
                <?php endif; ?>

                <?php if (!empty($imagemProduto4)): ?>
                    <img class="additional-image" style="border-radius: 10%; width: 75px; height: 75px;" src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto4; ?>">
                <?php endif; ?>

                <?php if (!empty($imagemProduto5)): ?>
                    <img class="additional-image" style="border-radius: 10%; width: 75px; height: 75px;" src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto5; ?>">
                <?php endif; ?>

                <?php if (!empty($vidProduto)): ?>
                    <video class="additional-image" class="product-video" autoplay style="border-radius: 10%; width: 75px; height: 75px;" controls data-video="<?php echo $vidProduto; ?>">
                        <source src="caminho/para/o/diretorio/de/imagens/<?php echo $vidProduto; ?>.webm" type="video/webm">
                        <source src="caminho/para/o/diretorio/de/imagens/<?php echo $vidProduto; ?>.mp4" type="video/mp4">
                    </video>
                <?php endif; ?>
            </div>
        </div>

                <div class="product_n">
                    <p><?php echo $nomeProduto; ?></p>
                </div>
                <div class="preco">
                    <p>R$<?php echo number_format($precoProduto, 2, ',', '.'); ?></p>
                </div>
                <div class="desconto">
                <!-- Adicione aqui o código para exibir o desconto, se aplicável -->
                </div>

                <div class="btn_comp">
                    <button><p>Adicionar ao carrinho</p></button>
                </div>
                <div class="a_vist">
                <!-- Adicione aqui o código para exibir as informações adicionais, se necessário -->
                </div>
                <div class="acd_c">
                    <button>Comprar</button>
                </div>
                
                <div class="dscr">
                    <?php echo $descricaoProduto?>
                </div>

                <div class="espec">
                    <?php echo $especsProduto?>
                </div>

            <hr class="linha">
            <div class="coment">
                <!-- Adicione aqui o código para exibir os comentários, se necessário -->
            </div>

            <div class="coment">
                <div class="coment_txt">
                    <p>Comentários</p>
                </div>
                <div class="esc">
                <form id="commentForm" action="product.php" method="post">
                        <p>escreva seu comentário</p>
                        <textarea name="comentario" class="esc_u" rows="4" placeholder="Digite seu comentário"></textarea>
                        <input type="hidden" name="Nome" value="<?php echo $produto_id; ?>">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </h1>
    </section>

    <div class="rdp sr">
        <a href="https://www.instagram.com/tokabrinquedos/?ref=balancegurus"><img src="img/icone/instagram.png" class="inst"></a>
        <a href="https://www.facebook.com/tokabrinquedos/?locale=pt_BR" class="fac"><img src="img/icone/facebook.png"></a>
        <img class="zap" src="img/icone/zap.png">
        <p class="zaptxt">+55 41 9931-8796</p>
        <p class="email">Toka.curitiba@gmail.com</p>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const additionalImages = document.querySelectorAll('.additional-image');
    const mainImage = document.querySelector('.product-image img');
    const videoContainer = document.querySelector('.product-video');

    additionalImages.forEach(function (image) {
        image.addEventListener('mouseover', function () {
            if (image.dataset.video) {
                mainImage.style.display = 'none';
                videoContainer.innerHTML = `
                    <video style="border-radius: 10%; width: 100%; height: 100%;" controls>
                        <source src="caminho/para/o/diretorio/de/imagens/seu_video_teste.mp4" type="video/mp4">
                    </video>
                `;
            } else {
                mainImage.style.display = 'block';
                mainImage.src = image.src;
                videoContainer.innerHTML = '';
            }
        });

        image.addEventListener('mouseout', function () {
            // Limpar o conteúdo do contêiner de vídeo apenas se o mouse estiver sobre a imagem de vídeo
            if (image.dataset.video) {
                videoContainer.innerHTML = '';
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const additionalImages = document.querySelectorAll('.additional-image');
    const mainImage = document.querySelector('.product-image img');
    const videoContainer = document.querySelector('.product-video');

    additionalImages.forEach(function (image) {
        image.addEventListener('mouseover', function () {
            if (image.dataset.video) {
                mainImage.style.display = 'none';
                videoContainer.innerHTML = `
                    <video style="border-radius: 10%; width: 100%; height: 100%;" controls>
                        <source src="caminho/para/o/diretorio/de/imagens/seu_video_teste.mp4" type="video/mp4">
                    </video>
                `;
            } else {
                mainImage.style.display = 'block';
                mainImage.src = image.src;
                videoContainer.innerHTML = '';
            }
        });

        image.addEventListener('mouseout', function () {
            // Limpar o conteúdo do contêiner de vídeo apenas se o mouse estiver sobre a imagem de vídeo
            if (image.dataset.video) {
                videoContainer.innerHTML = '';
            }
        });
    });
});

</script>