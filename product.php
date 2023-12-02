<!DOCTYPE html>
<head>

    <!--charset localiza os caracteres permitindo ç-->

    <meta charset="UTF-8">

    <title>Toka dos Brinquedos e Colecionaveis</title>

    <link rel="stylesheet" href="product.css">

</head>
<body>


    <header id ="cab">
        
        <div class="b_sup">

            <button class="Cat"><img src="img/icone/menu_burger.png"></button>

            <div class="lg">
                <button onclick="window.location.href='main.html#h1'">
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
  
  $produto_id = $_GET['produto_id'];
  
  $sql = "SELECT Nome, Img_pdt, Img_pdt2, Img_pdt3, Img_pdt4, Img_pdt5, Preço, dscr, tags, espec, catg FROM cadastros WHERE id = ?";
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
          $precoProduto = $row['Preço'];
          $descricaoProduto = $row['dscr'];
          $tagsProduto = $row['tags'];
          $especsProduto = $row['espec'];
          $categoriasProduto = $row['catg'];
  
          // Restante do seu código para exibir os resultados
      } else {
          echo "Nenhum resultado encontrado para o ID do produto: " . $produto_id;
      }
  

?>

        <div class="product-image">
                <img src="caminho/para/o/diretorio/de/imagens/<?php echo $imagemProduto; ?>">
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

            <?php
        }
    $conn->close();
?>
        
            <div class="coment">
                <div class="coment_txt">
                    <p>Comentários</p>
                </div>
                <div class="esc">
                    <p>escreva seu comentário</p>
                    <textarea class="esc_u" rows="4" placeholder="Digite seu comentário"></textarea>
                    <button>Enviar</button>
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

        additionalImages.forEach(function (image) {
            image.addEventListener('mouseover', function () {
                mainImage.src = image.src;
            });
        });
    });
</script>
