<div id="section-editar" class="p-0 py-5 bg-light" style="margin-top: 60px">


    <!-- Pages's Main content -->
    <div class="m-auto p-0 d-flex flex-column align-items-center">


        <?php

        if (isset($_SESSION['error'])) {

            if ($_SESSION['error'] === true) {

                echo '<div class="alert alert-danger d-flex mb-3 align-items-center justify-content-center ms-2">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                            
                              <p class="m-0 ms-2 p-0 "> ' . $_SESSION['msg'] . '</p>
                    </div>';
            
            } else if ($_SESSION['error'] === false) {

                echo '<div class="alert alert-success d-flex mb-3 align-items-center justify-content-center ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill text-success" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                
                        <p class="m-0 ms-2 p-0 "> ' . $_SESSION['msg'] . '</p>

                    </div>';
            }
            unset($_SESSION['error']);
            unset($_SESSION['msg']);
        }

        ?>


        <!-- ================= CALENDAR ===================== -->
        <h3 class="">Gerenciar calendário</h3>

        <div id="calendar-editar" class="bg-white p-4 shadow-lg rounded "></div>





        <!--  =============== HOME BLOCK 1 ================== -->
        <h3 class=" mt-5 px-5 py-3 bk-custom m-0 container-xl">Editar página home - bloco 1</h3>

        <div class="edit-page-block1-form container-xl d-flex border border-secondary-subtle rounded text-dark shadow-lg h bg-white ">

            <div id="alert-update-success-blk-1" class="d-none alert alert-success d-flex align-items-center justify-content-center w-100" role="alert">

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>

                <p class="m-0">Texto alterado com sucesso!</p>

            </div>


            <!-- Block 1 Left Texxt -->
            <div id="edit-block-1-container" class="">

                <div class="edit-page-block1-title-options w-25 px-3 py-4">

                    <h5>Selecione</h5>

                    <div class="d-flex border  p-2  custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input me-2" value="title 1" id="blk-1-checkbox-1">
                        <label class="custom-control-label" for="blk-1-checkbox-1">Título 1</label>

                    </div>

                    <div class="d-flex border p-2 custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input me-2" value="title 2" id="blk-1-checkbox-2">
                        <label class="custom-control-label" for="blk-1-checkbox-2">Título 2</label>

                    </div>

                </div>


                <div class="edit-page-block1-textarea-container border-start  w-75 px-3 py-4">

                    <h5>Novo texto</h5>

                    <textarea id="block1-input-new-text" class="w-100 " type="text"></textarea>

                    <button id="btn-edit-home-blk-1" class="btn-green-custom btn mt-3 w-100 text-light" type="submit" name="submit">Enviar</button>

                </div>

            </div>

            <!-- Block 1 Right image -->
            <form class="edit-page-block-2-left-image px-3 py-4" action="./includes/block_1_save_img.inc.php" enctype="multipart/form-data" method="POST">

                <h5 class="mb-5">Imagem à direita</h5>

                <div class="mb-3">

                    <label for="imageInput" class="form-label">Selecionar imagem</label>
                    <input type="file" class="form-control " id="imageInput" name="file">

                </div>

                <button type="submit" name="submit" class="btn-green-custom btn w-100 text-light">Salvar</button>
            </form>


        </div>





        <!-- ==============  HOME BLOCK 2  =================== -->
        <h3 class=" mt-5 px-5 py-3 bk-custom  m-0 container-xl">Editar página home - bloco 2 </h3>

        <div class="edit-page-block-2 container-xl   flex-wrap border border-secondary-subtle rounded text-dark shadow-lg  bg-white ">



            <div id="alert-update-success-blk-2" class="d-none alert alert-success d-flex align-items-center justify-content-center w-100" role="alert">

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>

                <p class="m-0">Texto alterado com sucesso!</p>

            </div>

            <!-- Right text action response -->
            <div id="edit-block-2-container" class="">

                <!-- EDIT PROFILE LEFT IM-AGE -->
                <form class="edit-page-block-2-left-image px-3 py-4" action="./includes/block_2_save_img.inc.php" enctype="multipart/form-data" method="POST">

                    <h5 class="mb-5">Imagem de perfil</h5>

                    <div class="mb-3">

                        <label for="imageInput" class="form-label">Selecionar imagem</label>
                        <input type="file" class="form-control " id="imageInput" name="file">

                    </div>

                    <button type="submit" name="submit" class="btn-green-custom btn w-100 text-light">Salvar</button>
                </form>

                <!-- EDIT PROFILE RIGHT TEXT -->
                <div class="edit-page-block-2-right-text px-3 py-4 border-start">

                    <h5 class="mb-5">Textos à direita</h5>

                    <div class="d-flex ">

                        <div class="block-2-left-texts-ul pe-2">

                            <p>Selecione</p>

                            <div class="custom-control custom-checkbox d-flex border  p-2 ">

                                <input type="checkbox" class="checkbox-blk2-row1 custom-control-input me-2" value="title 1" id="blk-2-checkbox-1">

                                <label class="checkbox-blk2-row2 custom-control-label" for="blk-2-checkbox-1">Título
                                    1</label>
                            </div>

                            <div class="custom-control custom-checkbox d-flex border  p-2 ">
                                <input type="checkbox" class="checkbox-blk2-row1 custom-control-input me-2" value="title 2" id="blk-2-checkbox-2">

                                <label class="checkbox-blk2-row2 custom-control-label" for="blk-2-checkbox-2">Título
                                    2</label>

                            </div>

                            <div class="custom-control custom-checkbox d-flex border  p-2 ">
                                <input type="checkbox" class="checkbox-blk2-row1 custom-control-input me-2" value="text" id="blk-2-checkbox-3">
                                <label class="checkbox-blk2-row2 custom-control-label" for="blk-2-checkbox-3">Texto</label>
                            </div>

                            <div class="custom-control custom-checkbox d-flex border  p-2 ">
                                <input type="checkbox" class="checkbox-blk2-row1 custom-control-input me-2" value="paragraph 1" id="blk-2-checkbox-4">
                                <label class="checkbox-blk2-row2 custom-control-label" for="blk-2-checkbox-4">Parágrafo
                                    1</label>
                            </div>

                            <div class="custom-control custom-checkbox d-flex border  p-2 ">
                                <input type="checkbox" class="checkbox-blk2-row1 custom-control-input me-2" value="paragraph 2" id="blk-2-checkbox-5">
                                <label class="checkbox-blk2-row2 custom-control-label" for="blk-2-checkbox-5">Parágrafo
                                    2</label>
                            </div>

                            <div class="custom-control custom-checkbox d-flex border  p-2 ">
                                <input type="checkbox" class="checkbox-blk2-row1 custom-control-input me-2" value="paragraph 3" id="blk-2-checkbox-6">
                                <label class="checkbox-blk2-row2 custom-control-label" for="blk-2-checkbox-6">Parágrafo
                                    3</label>
                            </div>

                        </div>

                        <div class="form-group ps-2">

                            <p>Novo texto</p>

                            <textarea type="text" id="block2-row1-textarea" class="form-control-label w-100" cols="30" rows="4"></textarea>
                            <button id="btn-edit-home-blk-2-txt" class="btn-green-custom btn mt-3 text-light  w-100" type="submit" name="submit">Salvar</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>





        <!-- ==============  HOME BLOCK 3  =================== -->
        <h3 class=" mt-5 px-5 py-3 bk-custom  m-0 container-xl">Editar página home - bloco 3 </h3>

        <div class=" edit-page-block-3 container-xl    border border-secondary-subtle rounded text-dark shadow-lg  bg-white ">

            <div id="alert-update-success-blk-3" class="d-none alert alert-success d-flex align-items-center justify-content-center w-100" role="alert">

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>

                <p class="m-0">Texto alterado com sucesso!</p>

            </div>

            <div class="d-flex">
                <!-- EDIT  RIGHT TEXT -->
                <div class=" border-end  px-3 py-4">
                    <h5 class="mb-5">Título e texto à esquerda</h5>
                    <div class=" w-100">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="checkbox-blk3-txt custom-control-input" value="title" id="blk-3-checkbox-1">
                            <label class="custom-control-label" for="blk-3-checkbox-1">Título</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="checkbox-blk3-txt custom-control-input" value="text" id="blk-3-checkbox-2">
                            <label class="custom-control-label" for="blk-3-checkbox-2">Texto</label>
                        </div>
                    </div>
                    <div class="form-group border-0 w-100">
                        <textarea type="text" id="block3-row1-textarea" class="form-control-label w-100" cols="30" rows="4"></textarea>
                        <button id="btn-edit-home-blk-3-txt" class="btn-green-custom btn w-100 text-light" type="submit" name="submit">Salvar</button>
                    </div>
                </div>
                <!-- EDIT  LEFT IMAAGE -->
                <div class="  px-3 py-4 ">
                    <h5 class="mb-5">Imagem à direita</h5>
                    <form class="" action="./includes/block_3_save_img.inc.php" enctype="multipart/form-data" method="POST">
                        <div class="mb-3 form-group">
                            <label for="imageInput" class="form-label">Selecionar imagem</label>
                            <input type="file" class="form-control" id="imageInput" name="file">
                        </div>
                        <button type="submit" name="submit" class="btn-green-custom btn text-light  w-100">Salvar</button>
                    </form>
                </div>
            </div>

        </div>




        <!-- ==============  HOME BLOCK 4 ( PROFILE SECTION ) =================== -->
        <h3 class=" mt-5 px-5 py-3 bk-custom  m-0 container-xl">Editar página home - bloco 4</h3>

        <div class="bg-white container-xl bg-white shadow-lg  border border-secondary-subtle">


            <div id="alert-update-success-blk-4" class="d-none alert alert-success d-flex align-items-center justify-content-center w-100" role="alert">

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>

                <p class="m-0">Texto alterado com sucesso!</p>

            </div>

            <div class="d-flex">

                <div class=" px-3 py-4   text-dark  border-end">
                    <h5 class="mb-4">Texto esquerdo ao calendário</h5>
                    <div class="form-group mb-2">
                        <label class="mb-2" for="blk-4-textarea"></label>
                        <textarea id="blk-4-textarea" class="form-control bg-transparent rounded-0  border-secondary-subtle " name="text" cols="30" rows="4"></textarea>
                    </div>
                    <button id="btn-edit-home-blk-4" class="btn-green-custom btn  w-100 text-light" type="submit" name="submit">Salvar</button>
                </div>

                <form class="edit-page-block-2-left-image px-3 py-4 bg-white" action="./includes/block_4_save_img.inc.php" enctype="multipart/form-data" method="POST">
                    <h5 class="mb-5">Imagem à direita</h5>
                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Selecionar imagem</label>
                        <input type="file" class="form-control " id="imageInput" name="file">
                    </div>
                    <button type="submit" name="submit" class="btn-green-custom btn w-100 text-light">Salvar</button>
                </form>
            </div>

        </div>


    </div>




    <!-- Nodal hour selection -->
    <button id="btn-modal-editar" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendamentos ativos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <table class="table table-striped"></table>

                </div>

                <div class="modal-footer">

                    <div id="alert-delete-success" class="d-none alert alert-success d-flex align-items-center justify-content-center w-100" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>

                        <p class="m-0">Horário deletado com sucesso!</p>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                </div>

            </div>

        </div>

    </div>


</div>


<script src="assets/js/editar.js"></script>