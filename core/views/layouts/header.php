<nav style="height:60px;"
        class="container-fluid bg-white fixed-top navbar navbar-expand-lg py-0 border-bottom  d-flex justify-content-between ">

        <!-- LOGO -->
        <a class=" navbar-brand d-flex p-1 ms-2" href="?a=home">

            <img id="img-logo" class="px-0 me-1" src="assets/images/header-logo.png" />

            <h1 class="logo-text text-secondary nav-brand w-100  mb-0 p-0 fs-2">
                <?php
                if (isset($_SESSION['adm'])) {
                    echo "Administrador";
                } else {
                    echo APP_OWNER_NAME;
                }
                ?>

            </h1>

        </a>

        <!-- HAMBURGER -->
        <button class="btn-green-custom navbar-toggler me-2 p-2 text-light border-0 rounded-1 " type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">MENU</button>

        <!-- HEADER LIST -->
        <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item  ">
                    <a class="nav-link active  m-2" aria-current="page" href="?a=home">Home</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link m-2 active" href="?a=portfolio">Portfólio</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link  m-2 active" href="?a=contact">Contato</a>
                </li>
        
               






                <?php
                if (isset($_SESSION['adm'])) {

                    echo '
                                    <li class="nav-item ">
                                        <a href="?a=edit" class="header-link nav-link  m-2 active">Editar</a>
                                    </li>
    
                                    <li class="nav-item ">
                                        <a href="?a=logout" class="header-link nav-link m-2 active" active>Sair</a>
                                    </li>';
                }
                ?>

                <li class="nav-item">

                    <a class="btn btn-green-custom nav-link  m-2 text-light  d-flex  align-items-center rounded"
                        href="?a=schedule">

                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-calendar3" viewBox="0 0 16 16">
                            <path
                                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                            <path
                                d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>

                        <p class="m-0 ms-2">Agendar consulta</p>

                    </a>

                </li>

            </ul>

        </div>


    </nav>


    <!-- MAIN CONTAINER -->
    <div class="container-fluid  p-0">