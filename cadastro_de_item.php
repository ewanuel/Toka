<?php

// Etapa 1: Configurar a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "-951753/8520+654";
$dbname = "cadastros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Etapa 2: Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeProduto = $_POST["Nome"];
    $Img_pdt = $_FILES["Img_pdt"];
    $precoProduto = $_POST["Preço"];
    $descricaoProduto = $_POST["dscr"];
    $tagsProduto = $_POST["tags"];
    $especsProduto = $_POST["espec"];
    $estoqueDoProduto = $_POST["estq"];
    $vidProduto = $_POST["Video_pdt"];

//imagem pdt1

if (isset($_FILES["Img_pdt"]) && $_FILES["Img_pdt"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/"; // Substitua pelo caminho correto
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt"]["name"]);

    if (!is_dir($targetDirectory)) {
        // Crie o diretório se ele não existir
        mkdir($targetDirectory, 0777, true);
    }
    
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt"]["name"]);


    if (move_uploaded_file($_FILES["Img_pdt"]["tmp_name"], $targetFile)) {
        $imagemProduto = $_FILES["Img_pdt"]["name"];
        // Restante do código de upload
    } else {
        // Tratar o caso em que o arquivo não foi movido corretamente
        echo "Erro ao enviar a imagem.";
    }
} else {
    // Tratar o caso em que o arquivo não foi enviado corretamente
    echo "Erro ao enviar a imagem.";
}

//Imagem pdt2

if (isset($_FILES["Img_pdt2"]) && $_FILES["Img_pdt2"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/"; // Substitua pelo caminho correto
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt2"]["name"]);

    if (!is_dir($targetDirectory)) {
        // Crie o diretório se ele não existir
        mkdir($targetDirectory, 0777, true);
    }
    
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt2"]["name"]);


    if (move_uploaded_file($_FILES["Img_pdt2"]["tmp_name"], $targetFile)) {
        $imagemProduto2 = $_FILES["Img_pdt2"]["name"];
        // Restante do código de upload
    } else {
        // Tratar o caso em que o arquivo não foi movido corretamente
        echo "Erro ao enviar a imagem.";
    }
} else {
    // Tratar o caso em que o arquivo não foi enviado corretamente
    echo "Erro ao enviar a imagem.";
}

$imagemProduto3 = $imagemProduto4 = $imagemProduto5 = null;

//imagem pdt3

if (isset($_FILES["Img_pdt3"]) && $_FILES["Img_pdt3"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/"; // Substitua pelo caminho correto
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt3"]["name"]);

    if (!is_dir($targetDirectory)) {
        // Crie o diretório se ele não existir
        mkdir($targetDirectory, 0777, true);
    }
    
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt3"]["name"]);


    if (move_uploaded_file($_FILES["Img_pdt3"]["tmp_name"], $targetFile)) {
        $imagemProduto3 = $_FILES["Img_pdt3"]["name"];
        // Restante do código de upload
    } else {
        // Tratar o caso em que o arquivo não foi movido corretamente
        echo "Erro ao enviar a imagem.";
    }
} else {
    // Tratar o caso em que o arquivo não foi enviado corretamente
    echo "Erro ao enviar a imagem.";
}

//imagem pdt4

if (isset($_FILES["Img_pdt4"]) && $_FILES["Img_pdt4"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/"; // Substitua pelo caminho correto
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt4"]["name"]);

    if (!is_dir($targetDirectory)) {
        // Crie o diretório se ele não existir
        mkdir($targetDirectory, 0777, true);
    }
    
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt4"]["name"]);


    if (move_uploaded_file($_FILES["Img_pdt4"]["tmp_name"], $targetFile)) {
        $imagemProduto4 = $_FILES["Img_pdt4"]["name"];
        // Restante do código de upload
    } else {
        // Tratar o caso em que o arquivo não foi movido corretamente
        echo "Erro ao enviar a imagem.";
    }
} else {
    // Tratar o caso em que o arquivo não foi enviado corretamente
    echo "Erro ao enviar a imagem.";
}

//imagem pdt5

if (isset($_FILES["Img_pdt5"]) && $_FILES["Img_pdt5"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/"; // Substitua pelo caminho correto
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt5"]["name"]);

    if (!is_dir($targetDirectory)) {
        // Crie o diretório se ele não existir
        mkdir($targetDirectory, 0777, true);
    }
    
    $targetFile = $targetDirectory . basename($_FILES["Img_pdt5"]["name"]);


    if (move_uploaded_file($_FILES["Img_pdt5"]["tmp_name"], $targetFile)) {
        $imagemProduto5 = $_FILES["Img_pdt5"]["name"];
        // Restante do código de upload
    } else {
        // Tratar o caso em que o arquivo não foi movido corretamente
        echo "Erro ao enviar a imagem.";
    }
} else {
    // Tratar o caso em que o arquivo não foi enviado corretamente
    echo "Erro ao enviar a imagem.";
}

  //envio de vídeos

  if (isset($_FILES["Video_pdt"]) && $_FILES["Video_pdt"]["error"] === UPLOAD_ERR_OK) {
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/";
    $targetFile = $targetDirectory . basename($_FILES["Video_pdt"]["name"]);

    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $targetFile = $targetDirectory . basename($_FILES["Video_pdt"]["name"]);

    if (move_uploaded_file($_FILES["Video_pdt"]["tmp_name"], $targetFile)) {
        $vidProduto = $_FILES["Video_pdt"]["name"];

    } else {
        print "Erro ao enviar o vídeo";
    }

}

    // Etapa 3: Processar os dados (validações, etc.)

    // Etapa 4: Fazer o upload da imagem (se necessário)
    $targetDirectory = "caminho/para/o/diretorio/de/imagens/"; // Substitua pelo caminho correto

    var_dump($nomeProduto, $imagemProduto, $imagemProduto2, $imagemProduto3, $imagemProduto4, $imagemProduto5, $precoProduto, $descricaoProduto, $tagsProduto, $especsProduto, $categoriasProduto);

    $sql = "INSERT INTO cadastros (Nome, Img_pdt, Img_pdt2, Img_pdt3, Img_pdt4, Img_pdt5, Video_pdt, Preço, dscr, tags, espec, catg, estq) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    $categoriasSelecionadas = $_POST['catg'] ?? array(); // Certifique-se de definir um valor padrão se nenhuma categoria for selecionada
    $categoriasProduto = implode(', ', $categoriasSelecionadas);

    if ($stmt) {
        $stmt->bind_param("sssssssdsssss", $nomeProduto, $imagemProduto, $imagemProduto2, $imagemProduto3, $imagemProduto4, $imagemProduto5, $vidProduto, $precoProduto, $descricaoProduto, $tagsProduto, $especsProduto, $categoriasProduto, $estoqueDoProduto);
    
        if ($stmt->execute()) {
            // Redirecionar após o sucesso da inserção
            header("Location: product.php?produto_id=" . $stmt->insert_id);
            exit(); // Certifique-se de sair após o redirecionamento
        } else {
            echo "Erro ao cadastrar o produto: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração SQL: " . $conn->error;
    }
}    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cadastro_de_item.css">
</head>
<body>
    <header id="cab">
        <div class="b_sup">
    
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
                <button class="Ent">Controle de estoque</button>
            </a>
            <a href="crie sua conta.html">
                <button class="Cr_s_c">Controle de database</button>
            </a>
        </div>
    
        </div>
        </header>

    <h1>
    <div class="container">

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="Nome">
                <p>Nome do produto</p>
                <input type="text" name="Nome">
            </div>

            <div class="Img_pdt">
                <p>Imagem do produto</p>
                <input type="file" id="imagemProduto1" accept="image/*" name="Img_pdt">
                <div id="imagemPreview1">
                    <img id="previewImg1" src="" alt="">
                </div>
            </div>

            <div class="Img_pdt2">
                <input type="file" id="imagemProduto2" accept="image/*" name="Img_pdt2">
                <div id="imagemPreview2">
                    <img id="previewImg2" src="" alt="">
                </div>
            </div>

            <div class="Img_pdt3">
                <input type="file" id="imagemProduto3" accept="image/*" name="Img_pdt3">
                <div id="imagemPreview3">
                    <img id="previewImg3" src="" alt="">
                </div>
            </div>

            <div class="Img_pdt4">
                <input type="file" id="imagemProduto4" accept="image/*" name="Img_pdt4">
                <div id="imagemPreview4">
                    <img id="previewImg4" src="" alt="">
                </div>
            </div>

            <div class="Img_pdt5">
                <input type="file" id="imagemProduto5" accept="image/*" name="Img_pdt5">
                <div id="imagemPreview5">
                    <img id="previewImg5" src="" alt="">
                </div>
            </div>

            <div class="Video_pdt">
                <p>Vídeo do produto</p>
                <input type="file" id="videoProduto1" accept="video/*" name="Video_pdt">
                <div id="videoPreview1">
                </div>
            </div>

            <div class="Preço">
                <p>Preço do Produto</p>
                <input type="text" name="Preço">
            </div>

            <div class="dscr">
                <p>Descrição do produto</p>
                <textarea name="dscr" rows="4" placeholder="Digite a descrição do produto"></textarea>
            </div>

            <div class="tags">
                <p>tags</p>
                <input type="text" name="tags">
            </div>

            <p class="es">ficha técnica</p>

            <div class="espec">
            <textarea name="espec" rows="2" placeholder="Digite as especificações"></textarea>
            </div>

            <div class="catg">
                <p>Escolha a Categoria</p>
                <input type="checkbox" id="Cat_cards"name="catg[]">
                <label for="Cat_cards">Cards</label>
                <input type="checkbox" id="Cat_games"name="catg[]">
                <label for="Cat_games">Games</label>
                <input type="checkbox" id="Cat_geeks"name="catg[]">
                <label for="Cat_geeks">Geeks</label>
                <input type="checkbox" id="Cat_livros"name="catg[]">
                <label for="Cat_livros">Livros</label>
                <input type="checkbox" id="Cat_pedagogicos"name="catg[]">
                <label for="Cat_pedagogicos">Pedagogicos</label>
                <input type="checkbox" id="Cat_pelucias"name="catg[]">
                <label for="Cat_pelucias">Pelucias</label>
            </div>

            <div class="estq">
                <p>Quantidade no Estoque</p>
                <input type="text" name="estq">
            </div>

            <div class="preview">
                <button class="cadast" type="button" onclick="previewItem()">pré visualizar</button>
            </div>

            <div class="cadastrar">
                <button class="cadast" type="submit">cadastrar</button>
            </div>
        </form>
    </div>
    </h1>
        <section id="previewSection" class="seção" style="display: none;">
                
            <div class="produt">
                <img src="img/fts/Produtos/product_1.jpg">
            </div>
            <div class="produt_n">
                <p>Fisher Price BeatBo</p>
            </div>
            <div class="desconto">
                <p>X%</p>
            </div>
            <div class="preco">
                <p>R$40,00</p>
            </div>
            <div class="btn_comp">
                <button><p>Adicionar ao carrinho</p></button>
            <div class="a_vist">
                
            </div>
            <div class="acd_c">
                <button>Comprar</button>
            </div>
            </div>
            <hr class="linha">
            <div class="coment">
                <div class="coment_txt">
                    <p>Comentários</p>
                </div>
                <div class="esc">
                    <p>escreve seu comentário</p>
                    <input type="text"><button>enviar</button>
                </div>
            </div>
        
    </section>

<!--Preview da imagem-->

<script>
        const imagemProdutoInput = document.getElementById('imagemProduto');
        const previewImg = document.getElementById('previewImg');

        imagemProdutoInput.addEventListener('change', function () {
            const file = imagemProdutoInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                previewImg.src = '';
            }
        });
</script>

<!--Adicionar outra imagem-->

<script>
    function addimg() {
        var imgor = document.querySelector('.Img_pdt');
        var newimg = imgor.cloneNode(true);

        var inputFile = newimg.querySelector('input[type="file"]');
        inputFile.value = ''; 
       
        inputFile.addEventListener('change', function () {
            const file = inputFile.files[0];
            const previewImg = newimg.querySelector('img'); 

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                previewImg.src = '';
            }
        });

        imgor.insertAdjacentElement('afterend', newimg);
    }
</script>

<!--Adicionar outra espec-->

<script>
    function addespec(){
        var especor = document.querySelector('.espec');
        var newespec = especor.cloneNode(true);

        var inputText = newespec.querySelector('input[type="text"]');
        inputText.value = '';

        var removeButton = document.createElement('button');
        removeButton.textContent = 'Remover';
        removeButton.addEventListener('click', function() {
        newespec.parentNode.removeChild(newespec); 
       });

        newespec.appendChild(removeButton);
        
        especor.insertAdjacentElement('afterend', newespec);

    }
</script>

<!--Preview da página-->

<script>
    function previewItem() {
    const nomeProduto = document.querySelector('.Nome input').value;
    const descricaoProduto = document.querySelector('.dscr input').value;
    const precoProduto = document.querySelector('.Preço input').value;
    const tagsProduto = document.querySelector('.tags input').value;

    const categoriaProdutos = [];
    const categoriasCheckBoxes = document.querySelectorAll('.catg input[type="checkbox"]');
    categoriasCheckBoxes.forEach((checkbox) => {
    if (checkbox.checked) {
    categoriaProdutos.push(checkbox.nextElementSibling.textContent);
}
});

    const imagemPreviewSrc = document.querySelector('#previewImg').src;

    const previewNome = document.querySelector('.produt_n p');
    const previewImagem = document.querySelector('.produt img');
    const previewDescricao = document.querySelector('.desconto p');
    const previewPreco = document.querySelector('.preco p');

    previewNome.textContent = nomeProduto;
    previewImagem.src = imagemPreviewSrc;
    previewDescricao.textContent = descricaoProduto;
    previewPreco.textContent = `R$${precoProduto}`;

    const previewSection = document.getElementById('previewSection');
    previewSection.style.display = 'block';
}
</script>


</body>
</html>