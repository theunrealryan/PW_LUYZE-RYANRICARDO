<?php
class Banco
{
  private $__servername;
  private $__username;
  private $__password;
  private $__dbname;
  private $conn;

  function __construct($servername, $username, $password, $dbname)
  {
    $this->__servername = $servername;
    $this->__username = $username;
    $this->__password = $password;
    $this->__dbname = $dbname;

    $this->conn = mysqli_connect($this->__servername, $this->__username, $this->__password, $this->__dbname);
  }

  public function select($sql)
  {
    return mysqli_query($this->conn, $sql);
  }

  public function SQL($sql)
  {
    return mysqli_query($this->conn, $sql);
  }
}

include "cadastro.php";
$banco = new Banco($servername, $username, $password, $dbname);

$sql = "SELECT * FROM chamados";
$result = $banco->select($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Administrativa</title>
  <link rel="stylesheet" href="./css/reset.css" />
  <link rel="stylesheet" href="./css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
  <!--header-->
  <header>
    <div class="container-header">
      <div class="container">
        <div class="row d-flex header-top">
          <div class="col-lg-8 d-flex">
            <a href="./index.html">
              <img src="./img/logocdados.png" alt="Logo do curso de ciência de dados." /></a>
          </div>
          <!--logo-->
          <div class="col-lg-4 d-flex d-none d-lg-block">
            <h1>
              <img src="img/logo_uepa2023.png" />
            </h1>
          </div>
        </div>
      </div>

      <!--menu navegacao de paginas-->
      <div id="menu-pages">
        <nav>
          <ul>
            <li>
              <a href="./structure-course.html">ESTRUTURA DO CURSO <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./evaluation-system.html">SISTEMA DE AVALIAÇÃO <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./professors.html">CORPO DOCENTE <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./campus.html">CAMPUS <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./committee.html">COLEGIADO <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./nde.html">NÚCLEO DOCENTE ESTRUTURANTE <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./contact-us.php">FALE CONOSCO <i class="bi bi-chevron-down"></i></a>
            </li>
            <li>
              <a href="./adm.php">ADMINISTRADOR <i class="bi bi-chevron-down"></i></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!--fim header-->

  <main>
    <div class="container-main container d-flex flex-column align-items-center">

      <div id="ouvidoria" class="d-flex flex-column align-items-center">
        <h2>Bacharelado em Ciência de Dados</h2>
        <h3>Página Administrativa - Consulta Chamados</h3>
      </div>


      <div class="container my-4">

        <div class="row my-2">

          <div class="col-1">
            <p class="h5">ID</p>
          </div>
          <div class="col-3">
            <p class="h5">Nome</p>
          </div>
          <div class="col-3">
            <p class="h5">E-mail</p>
          </div>
          <div class="col-1">
            <p class="h5">Assunto</p>
          </div>
          <div class="col-4">
            <p class="h5">Manifestação</p>
          </div>

        </div>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="row" <?php if ($i % 2 == 0) echo ("style= \" background-color: #dcdcdc\""); ?>>

            <div class="col-1 adm">
              <?php echo ($row["idChamado"]); ?>
            </div>
            <div class="col-3 adm">
              <?php echo ($row["nome"]); ?>
            </div>
            <div class="col-3 adm">
              <?php echo ($row["email"]); ?>
            </div>
            <div class="col-1 adm">
              <?php echo ($row["assunto"]); ?>
            </div>
            <div class="col-4 adm">
              <?php echo ($row["descricao"]); ?>
            </div>

          </div>

        <?php
          $i++;
        }
        ?>

        <a class="btn btn-primary my-4 botao" style="background-color: #312783; border: none;" role="button" href="contact-us.php">
          Fale Conosco
        </a>


      </div>
    </div>
  </main>

  <footer>
  <div class="container-footer container">
        <div
          class="row d-flex justify-content-space-around"
          style="margin-top: 2rem"
        >
          <div
            id="footer-img"
            class="col d-flex justify-content-start align-items-center d-none d-md-flex"
          >
            <img
              style="width: 14.5rem; height: 4.5rem"
              src="./img/logo-uepa-branco.png"
              alt="Logo da UEPA."
            />
          </div>

          <!--redes sociais-->
          <div
            id="footer_social_media"
            class="col d-flex justify-content-center"
          >
            <a
              href="https://www.youtube.com/channel/UCiW52AgF7Y62gvDw500haAw"
              class="footer-link"
              id="youtube"
            >
              <i class="bi bi-youtube"></i>
            </a>
            <a
              href="https://twitter.com/uepaoficial"
              class="footer-link"
              id="twitter"
            >
              <i class="bi bi-twitter"></i>
            </a>
            <a
              href="https://www.instagram.com/uepaoficial"
              class="footer-link"
              id="instagram"
            >
              <i class="bi bi-instagram"></i>
            </a>
            <a
              href="https://www.facebook.com/UepaOficial"
              class="footer-link"
              id="facebook"
            >
              <i class="bi bi-facebook"></i>
            </a>
          </div>

          <!--localização-->
          <div
            class="footer-location col d-flex justify-content-end d-none d-lg-flex"
          >
            <a
              style="width: 15rem"
              href="https://maps.app.goo.gl/FAY25EhQFKXkoJvH9"
              id="link-maps"
            >
              <p>
                Universidade do Estado do Pará - Campus XXII Ananindeua <br />
                <i class="bi bi-geo-alt-fill">
                  <small
                    >Avenida Independência, S/N, ao lado da Usina da Paz
                    Icuí-Guajará</small
                  >
                </i>
              </p>
            </a>
          </div>
        </div>
      </div>
    <div class="authors">
      <a href="https://github.com/theunrealryan/PW_LUYZE-RYANRICARDO" id="github">
        <i class="bi bi-github">
          Authors: Luyze Beatriz Marques Caetano e Ryan Ricardo de Souza</i>
      </a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script defer src="./js/script.js"></script>
</body>

</html>