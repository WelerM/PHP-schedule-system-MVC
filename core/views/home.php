<?php

use core\classes\Functions;



?>

<!-- ====== 1  BLOCK 1 | Bem-vindo!  ======= -->
<div id="main-section" class="bg-custom container-fluid  p-0 " style="margin-top: 60px">
    <?php

    if (isset($_SESSION['error'])) {
        echo   '<div class="alert alert-danger text-center p-2">
            '.$_SESSION['msg'].'
        </div>';

        unset($_SESSION['error']);
        unset($_SESSION['msg']);
    }
    ?>

    <div class="container-lg py-5  w-100 h-100 d-flex align-items-center justify-content-center">
      

        <div class="text-light">

            <h2 id="main-sec-h2" class="fs-1 mb-0"><?php print_r($data['block_1'][0]->txt_content_1); ?></h2>

            <h1 id="main-sec-h1" style="color: #99ffbf;"><?php print_r($data['block_1'][0]->txt_content_2); ?></h1>

            <a href="?a=schedule">
                <button class="btn btn-green-custom text-light mt-1 px-5 shadow-lg">AGENDE SUA CONSULTA</button>
            </a>

        </div>

        <img id="block-1-img" src="assets/images/header-logo.png" class="" alt="">

    </div>

</div>




<!-- ====== 2 BLOCK 2 | Sobre mim  ======= -->
<div class="intersection-container container-block-2 container-lg p-0 pt-5">

    <!-- RIGHT IMAGE AND LEFT TITLES -->
    <div class=" mb-3 d-flex flex-column align-items-center" style="min-width: 200px; width:100%;">

        <!-- LEFT IMAGE CONTAINER -->
        <img id="profile-sec-img-1" class="p-0 bg-dark-subtle m-auto w-75 mb-2" style="max-width:300px">

        <h1 class="text-green-custom text-center">
            <?php echo APP_OWNER_NAME ?>
        </h1>

        <p class="text-center">
            <?php echo APP_OWNER_SPECIALITY ?>
        </p>

        <a class="m-2 w-auto p-0" href="portfolio.php">

            <button class="btn btn-green-custom w-100 d-flex align-items-center justify-content-center shadow-lg fs-5">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>

                <p class="m-0 ms-2 text-light ">Ver portfólio</p>

            </button>
        </a>


    </div>

    <!-- TEXT BELOW CONTAINER -->
    <div class="px-2">

        <h1 id="block_2_title" class="mb-3 text-center"><?php print_r($data['block_2'][0]->txt_content_1); ?></h1>

        <p id="block_2_txt" class=" mb-3 "><?php print_r($data['block_2'][0]->txt_content_2); ?></p>

        <p id="block_3_txt" class=" mb-3 "><?php print_r($data['block_2'][0]->txt_content_3); ?></p>

        <p id="block_4_txt" class=" mb-3 "><?php print_r($data['block_2'][0]->txt_content_4); ?></p>


    </div>


</div>




<!-- ====== 3 BLOCK 3 =========== -->
<div class="bg-custom text-light p-0 py-5 d-flex w-100">

    <div class="container-lg">

        <div class="intersection-container intersection-block-3  m-auto m-0 ">

            <div class="p-0">

                <h1 id="block-3-title" class="mb-3" style="color:#99ffbf;"><?php print_r($data['block_3'][0]->txt_content_1); ?></h1>

                <p id="block-3-txt" class="mb-2 fs-5"><?php print_r($data['block_3'][0]->txt_content_2); ?></p>

            </div>

            <img id="block-3-img" class="img-fluid" style="" src="" alt="">

        </div>

    </div>

</div>




<!-- ====== 4  | AGENDAR CONSULTA ======= -->
<div id="calendar-container" class="text-green-custom bg-white p-0 py-5 p-0 w-100  ">


    <div class="intersection-container intersection-calendar-block w-100  d-flex container-lg">

        <!-- Calendar schedule presentation -->
        <div id="calendar-sche-presentation" class=" d-flex justify-content-center align-items-start flex-column p-0">

            <h1 id="block-4-title" class="mb-5 "><?php print_r($data['block_4'][0]->txt_content_1); ?></h1>
            <p id="block-4-txt"><?php print_r($data['block_4'][0]->txt_content_1); ?></p>

            <a class="w-75 my-0 shadow-lg" href="?a=schedule">

                <button class="btn btn-green-custom d-flex align-items-center justify-content-center w-100 text-light p-2 fs-5">

                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>

                    <p class="m-0 ms-3">Agendar agora</p>

                </button>

            </a>

        </div>

        <!-- Calendar schedule img -->
        <img id="block-4-img" class="w-50  p-0" alt="">

    </div>

</div>



<!-- ====== 5 PERGUNTAS FREQUENTES $ CONTATO ======= -->
<div class="bg-primary">

    <div class="block-5-container p-0 py-5  m-auto container-lg ">

        <!-- Perguntas frequentes -->
        <div class=" me-4 ">


            <h1 class="text-light-green-custom mb-3 ps-2">Perguntas frequentes</h1>

            <!-- 1 -->
            <div class="dropdown mb-3">

                <button class="btn btn-primary dropdown-toggle text-wrap text-start text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Quais serviços que você oferece?
                </button>

                <div class="dropdown-menu bg-white text-dark border border-secondary p-3  text-light">

                    <p class="">Ofereço serviços de psicologia focados no bem-estar emocional e desenvolvimento
                        pessoal. Minhas sessões de terapia online proporcionam um espaço seguro para
                        discutir desafios emocionais, aprender estratégias de enfrentamento e embarcar em
                        uma jornada de autodescoberta. Minha abordagem empática e experiência especializada
                        abrangem uma variedade de preocupações, incluindo ansiedade, depressão,
                        relacionamentos e autocuidado. Estou aqui para guiá-lo rumo a uma vida mais saudável
                        e equilibrada.</p>
                </div>

            </div>

            <!-- 2 -->
            <div class="dropdown mb-3">

                <button class="btn btn-primary dropdown-toggle text-wrap text-start text-light " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Como a terapia online funciona?
                </button>

                <div class="dropdown-menu bg-white text-dark border border-secondary p-3 text-light">

                    <p>A terapia online é realizada através de sessões virtuais por meio de uma plataforma
                        segura de vídeo. Você pode participar das sessões no conforto da sua casa ou de qualquer
                        lugar que seja conveniente para você. Apenas agende um horário, conecte-se à plataforma
                        no momento marcado e estaremos prontos para explorar suas preocupações e metas
                        terapêuticas.</p>
                </div>

            </div>

            <!-- 3 -->
            <div class="dropdown mb-3">

                <button class="btn btn-primary dropdown-toggle text-light text-wrap text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Quais são os benefícios da terapia online?
                </button>

                <div class="dropdown-menu border border-secondary text-dark p-3 text-light">
                    <p>A terapia online oferece a conveniência de acessar apoio psicológico de qualquer lugar,
                        eliminando a necessidade de deslocamentos. Isso é especialmente vantajoso para quem tem
                        agendas lotadas ou dificuldades de locomoção. Além disso, a terapia online mantém a
                        confidencialidade, proporciona flexibilidade de horários e permite que você escolha um
                        ambiente confortável para suas sessões.</p>
                </div>

            </div>

            <!-- 4 -->
            <div class="dropdown mb-3">

                <button class="btn btn-primary dropdown-toggle text-light    text-wrap text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Como você aborda questões específicas, como ansiedade e depressão?
                </button>

                <div class="dropdown-menu border border-secondary p-3 bg-white text-dark">
                    <p>Com experiência em diversas áreas, incluindo ansiedade e depressão, minha abordagem
                        começa com uma avaliação individualizada das suas necessidades. Juntos, exploraremos os
                        desafios que você enfrenta, identificaremos padrões de pensamento e comportamento, e
                        desenvolveremos estratégias para gerenciar essas questões. Meu objetivo é ajudá-lo a
                        construir resiliência e desenvolver ferramentas para enfrentar suas preocupações.</p>
                </div>

            </div>

            <!-- 5 -->
            <div class="dropdown mb-3">

                <button class="btn btn-primary text-light dropdown-toggle text-wrap text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Como posso iniciar o processo de terapia online?
                </button>

                <div class="dropdown-menu border border-secondary  p-3  text-dark">
                    <p> Iniciar o processo é fácil. Basta entrar em contato por meio do nosso site ou e-mail
                        para agendar uma sessão inicial. Durante essa primeira sessão, discutiremos suas
                        preocupações, responderemos a quaisquer perguntas adicionais que você possa ter e
                        começaremos a traçar o caminho para sua jornada terapêutica.</p>
                </div>

            </div>

        </div>

        <!-- Contact FORM -->
        <form class="col-4 px-3  text-light" action="?a=send_email" method="post">

            <h1 class="text-light-green-custom mb-3 ">Contato</h1>

            <div class="form-group mb-2 ">

                <label for="input-schedule-confirmation-name" class="d-none">Nome</label>

                <input id="input-schedule-confirmation-name" class=" form-control bg-body-secondary border border-primary-subtle rounded-1" name="sche-confirm-name" type="text" placeholder="Nome">
            </div>


            <div class="form-group mb-2">

                <label for="input-schedule-confirmation-email" class="d-none">E-mail</label>

                <input id="input-schedule-confirmation-email" class="form-control bg-body-secondary border border-primary-subtle rounded-1" name="sche-confirm-email" type="text" placeholder="E-mail">

            </div>

            <div class="form-group mb-2">

                <label for="input-schedule-confirmation-number" class="d-none">Número</label>

                <input id="input-schedule-confirmation-number" class=" form-control bg-body-secondary bottom rounded-1" name="sche-confirm-number" type="text" placeholder="Número">
            </div>

            <div class="form-group mb-2">

                <label class="mb-2 d-none" for="input-schedule-confirmation-number">Mensagem</label>

                <textarea id="input-schedule-confirmation-message" class="form-control bg-body-secondary rounded-1 bo
                     der-0 border-bottom" name="sche-confirm-text" cols="30" rows="4" placeholder="Mensagem (opcional)"></textarea>

            </div>

            <input type="hidden" name="source" value="original.php">

            <button id="btn-footer-form-confirm" class="btn btn-green-custom mt-3 w-100 text-light" t ype="submit" name="submit">Enviar</button>


        </form>

    </div>



</div>





<!-- ====== LOGIN admin FORM MODAL ======= -->
<!-- Button trigger modal -->
<button id="btn-open-login-form" type="button" class="d-none btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginFormModal"></button>

<div class="modal" id="loginFormModal" tabindex="-1" aria-labelledby="loginFormModal" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Criar conta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3">

                <form action="?a=login" method="post">

         
                    <div class="form-group mb-2 ">
                        <label for="input-login-name">Email</label>
                        <input id="input-login-name" class="form-control bg-transparent  border-secondary-subtle  rounded-0"  name="email" type="text">
                    </div>

                    <div class="form-group mb-2">
                        <label for="input-login-pwd">Senha</label>
                        <input id="input-login-pwd" class="form-control bg-transparent  border-secondary-subtle  rounded-0"  name="password" type="password">
                    </div>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger text-center p-2">
                            <?= $_SESSION['error'] ?>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <button class="btn btn-green-custom p1 text-light"  type="submit" name="submit">Entrar</button>
                </form>

            </div>

        </div>

    </div>

</div>





<script src="assets/js/index.js"></script>