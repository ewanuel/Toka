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

        <form method="POST" action="">
            <div class="Nome">
                <p>Nome do produto</p>
                <input type="text" name="Nome">
            </div>

            <div class="Img_pdt">
                <p>Imagem do produto</p>
                <input type="file" id="imagemProduto" accept="image/*" name="Img_pdt">
                <div id="imagemPreview">
                    <img id="previewImg" src="" alt="">
                    <button class="out_img" onclick="addimg()">adicionar outra imagem</button>
                </div>
            </div>

            <div class="Preço">
                <p>Preço do Produto</p>
                <input type="text" name="Preço">
            </div>

            <div class="dscr">
                <p>Descrição do produto</p>
                <input type="text" name="dscr">
            </div>

            <div class="tags">
                <p>tags</p>
                <input type="text" name="tags">
            </div>

            <p class="es">ficha técnica</p>

            <div class="espec">
            <input type="text" name="espec">
                <button class="out_espec" onclick="addespec()">adicionar outra espec</button>
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

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os valores do formulário
    $Nome = $_POST["Nome"];
    $Img_pdt = $_POST["Img_pdt"];
    $Preço = $_POST["Preço"];
    $dscr = $_POST["dscr"];
    $tags = $_POST["tags"];
    $espec = $_POST["espec"];
    
    // Verificar se o array $_POST["catg"] está definido e não está vazio
    if (isset($_POST["catg"]) && !empty($_POST["catg"])) {
        $catg = $_POST["catg"];
    } else {
        // Se nenhum checkbox foi marcado, defina $catg como um array vazio
        $catg = array();
    }

    // Verificar se algum campo obrigatório está vazio
    if (empty($Nome) || empty($Img_pdt) || empty($Preço) || empty($dscr) || empty($tags) || empty($espec) || empty($catg)) {
        $erro = true; // Defina a variável de erro como true se um campo estiver vazio
    }

    if (!$erro) {
        // Preparar e executar a instrução SQL para inserir os dados no banco de dados
        $sql = "INSERT INTO sua_tabela (Nome, Img_pdt, Preço, dscr, tags, espec, catg) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $Nome, $Img_pdt, $Preço, $dscr, $tags, $espec, implode(',', $catg));
        
        if ($stmt->execute()) {
            // Inserção bem-sucedida, você pode redirecionar o usuário para outra página, exibir uma mensagem de sucesso, etc.
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o produto: " . $conn->error;
        }

        // Feche a conexão com o banco de dados
        $stmt->close();
    }
}
?>

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