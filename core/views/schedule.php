<div class="bg-body-tertiary vh-100 position-relative">

    <div class="py-4  mx-auto" id="calendar-container" style="margin-top: 60px;">


        <!-- Steps display -->
        <div class="container-lg">
            <?php
            if (isset($_SESSION['error'])) {


                echo '<div class="alert alert-danger d-flex mb-3 align-items-center justify-content-center ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon-fill" viewBox="0 0 16 16">
                        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                       </svg>
                        
                        <p class="m-0 ms-2 p-0 "> ' . $_SESSION['msg'] . '</p>
        
                     </div>';

                unset($_SESSION['error']);
                unset($_SESSION['msg']);
            }
            ?>

            <!-- Steps display -->
            <div class="p-0 d-flex align-items-start justify-content-between mb-3 ">

                <div name="1" class="step-number d-flex flex-column align-items-center ">

                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#40996f" class="svg-number-1 bi bi-1-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312V4.002Z" />
                    </svg>

                    <p class="mt-2 text-wrap text-center">Selecione data</p>

                </div>

                <hr class="my-4 bg-dark w-50">

                <div name="2" class="step-number d-flex flex-column align-items-center ">

                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#929292" class="svg-number-2 bi bi-2-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z" />
                    </svg>

                    <p class="mt-2 text-wrap text-center">Selecione Hora</p>

                </div>

                <hr class="my-4 bg-dark w-50">

                <div name="3" class="step-number d-flex flex-column align-items-center ">

                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#929292" class="svg-number-3 bi bi-3-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z" />
                    </svg>

                    <p class="mt-2">Enviar</p>

                </div>

            </div>

        </div>


        <div class="container-lg py-4 bg-white shadow-lg border" style="max-width:800px">


            <!-- ALERT ELEMENT TO HELP USER -->
            <div class="mb-3  d-flex align-items-center">

                <div id="alert-help-client" class="d-none w-100 m-auto d-flex align-items-center ">

                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>

                    <p id="client-choosen-date" class="m-0 ms-3 fw-bold"></p>

                </div>

            </div>



            <!--  DATE SELECTION -->
            <div id="calendar" class="w-100  " style="height: 450px"></div>


            <!--  HOUR SELECTION -->
            <div id="inner-container-select-hour" class="select-hour-step d-none list-group bg-light p-0 w-100 bg-primary" style="height:300px"></div>


            <!-- agendamento-form -->
            <div class="fill-form-step d-none  w-100 m-auto position-relative">

                <!-- INPUT NAME -->
                <div class="form-group mb-1">

                    <label for="input-schedule-name" class="d-none">Nome completo</label>

                    <input id="input-schedule-name" class="border border-dark-subtle rounded-0 form-control bg-transparent mb-3 " name="sche-confirm-name" type="text" placeholder="Nome completo">

                </div>


                <!-- INPUT EMAIL -->
                <div class="form-group mb-1">

                    <label for="input-schedule-email" class="d-none">Email</label>

                    <input id="input-schedule-email" class="input-check-email-check border border-dark-subtle rounded-0 mb-3 form-control bg-transparent" name="sche-confirm-email" type="text" placeholder="Seu melhor email" value="we@c.com">

                </div>


                <!-- INPUT NUMBER -->
                <div class="form-group mb-1">

                    <label for="input-schedule-number" class="d-none">Telefone</label>

                    <input id="input-schedule-number" class=" border border-dark-subtle rounded-0 mb-3 form-control bg-transparent " name="sche-confirm-number" type="text" placeholder="Telefone (00) 00000-0000">

                </div>


                <!-- INPUT TEXT -->
                <div class="form-group mb-1">

                    <label for="input-schedule-text" class="d-none">Por qual motivo você busca ajuda?</label>

                    <textarea id="input-schedule-text" class=" border border-dark-subtle  rounded-0 mb-3 form-control bg-transparent" name="sche-confirm-text" type="text" cols="30" rows="4" placeholder="Por qual motivo você busca ajuda? (opcional)"></textarea>

                </div>



                <div id="form-alert-info" class="d-none alert alert-danger d-flex align-items-center " role="alert">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>

                    <p id="error-msg-form" class="m-0 ms-2"></p>

                </div>


            </div>



            <div class="steps-management d-none d-flex align-items-center justify-content-between mt-3">

                <button id="btn-step-back" class="btn border border-dark-subtle " style="background-color: #D3D4D5;">Anterior</button>


                <button id="btn-schedule-confirmation" class="d-none btn btn-green-custom text-light mt-1 " type="submit" name="submit">Agendar</button>

            </div>


        </div>


    </div>

    <div  class="loading-container align-items-center justify-content-center flex-column" style="display:none; position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);">

        <p class="mb-3 fs-4">Enviando, aguarde...</p>

        <img src="assets/images/loading-gif.gif"  alt="">

    </div>


</div>



<!-- Modal form confirmation-->
<button id="btn-form-confirm" type="button" class="d-none btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-form-confirm"></button>
<!--Form Confirmation Modal -->
<div class="modal " id="modal-form-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header border-0">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar dados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-1 py-3">

                <form class="container-md text-light rounded bg-white text-dark" action="?a=send_email_schedule_request" method="post">


                    <div class="d-none form-group mb-1">

                        <label for="input-schedule-confirmation-name">Nome completo</label>

                        <input id="input-schedule-confirmation-name" class=" border-0  rounded-0 form-control bg-transparent" name="sche-confirm-name" type="text">

                    </div>

                    <div class="d-none form-group mb-1">
                        <label for="input-schedule-confirmation-email">Email</label>

                        <input id="input-schedule-confirmation-email" class="  border-0  rounded-0 form-control bg-transparent " name="sche-confirm-email" type="text">

                    </div>

                    <div class="d-none form-group mb-1">

                        <label for="input-schedule-confirmation-number">Telefone</label>

                        <input id="input-schedule-confirmation-number" class="border-0  rounded-0 form-control bg-transparent" name="sche-confirm-number" type="text">

                    </div>

                    <div class="d-none form-group mb-1">

                        <label for="input-schedule-confirmation-text">Por qual motivo você busca ajuda?</label>

                        <textarea id="input-schedule-confirmation-text" class=" border-0 border-bottom rounded-0 form-control bg-transparent" name="sche-confirm-text" type="text"></textarea>
                    </div>


                    <div class="d-none form-group">

                        <label for="input-schedule-confirmation-date">Date</label>

                        <input id="input-schedule-confirmation-date" class=" border-0 border-bottom rounded-0 form-control bg-light" name="sche-confirm-date" type="text">

                    </div>


                    <div class="d-none form-group">

                        <label for="input-schedule-confirmation-hour">Hour</label>

                        <input id="input-schedule-confirmation-hour" class=" border-0 border-bottom rounded-0 form-control bg-light" name="sche-confirm-hour" type="text">
                    </div>



                    <div id="info-confirm-name" class=" p-1 d-block border border-bottom-0"></div>
                    <div id="info-confirm-email" class=" p-1 d-block border border-bottom-0 d-block"></div>
                    <div id="info-confirm-number" class=" p-1 d-block border border-bottom-0 d-block"></div>
                    <div id="info-confirm-text" class=" p-1 d-block border border-bottom-0"></div>
                    <div id="info-confirm-date" class=" p-1 d-block border border-bottom-0 w-fit-content "></div>
                    <div id="info-confirm-hour" class=" p-1 d-block border"></div>


                    <button id="btn-form-confirmation" class="btn btn-green-custom mt-3 text-light" type="submit" name="submit">Enviar
                    </button>


                </form>

            </div>

        </div>
    </div>

</div>





</div>

<script src="assets/js/agendamento.js"></script>