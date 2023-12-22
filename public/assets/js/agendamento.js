const container_btns = document.querySelector('#inner-container-select-hour')
var dayClicked
var previousElement = null;
let input_name
let input_email
let input_number
let input_text
let input_date
let input_hour
let schedule_position = 1
let editedDate
var choosen_date
var choosen_hour

const calendar_schedule = new FullCalendar.Calendar(document.getElementById('calendar'), {
    locale: 'pt-br',
    initialView: 'dayGridMonth',
    weekends: false,
    height: 450,

    dateClick: (e) => {

        displayHoursBtns(e)


        //Gets current month from FullCalendar API
        let currentMonthNameCrud = document.querySelector('.fc-toolbar-title').textContent
        let currentMonthName = currentMonthNameCrud.split(" ")


        //Edits date from YYYY-MM-YY to DD-MM-YYYY
        let dateParts = e.dateStr.split('-')
        editedDate = `${dateParts[2]} de ${currentMonthName[0]} de ${dateParts[0]}`


        choosen_date = `${dateParts[0]}-${dateParts[1]}-${dateParts[2]}`


        //Shows current step btn to help user. It only appears in thr second step, 
        //The first is shown automatically
        document.querySelector('.select-hour-step').style.display = 'flex'

        //Updates step position to second and calls function to acually change the step
        schedule_position = 2
        changeScheduleSteps(schedule_position)




        document.querySelector('.steps-management').classList.remove('d-none')

        //Takes page to the top
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // This provides smooth scrolling
        });
    },



    headerToolbar: {
        start: 'title',
        center: '',
        end: 'prev,next'
    },

    //Highlights days from the current monht
    dayCellDidMount: function (dayRenderInfo) {
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let dayMonth = dayRenderInfo.date.getMonth();

        if (currentMonth === dayMonth) {
            dayRenderInfo.el.classList.add('current-month-highlight');
        } else {
            dayRenderInfo.el.classList.add('not-current-month-highlight');
        }
    },

})
calendar_schedule.render();

//Weekday name
let currentDate = calendar_schedule.getDate();
calendar_schedule.formatDate(currentDate, {
    weekday: 'long'
});


//Displays hours
let objDate = calendar_schedule.getDate();
let formattedDate = objDate.toISOString();
let todaysDate = formattedDate.slice(0, 10)

//Sets current date to 'dayClicked' var so if users wants to schedule an hrour in the same
//Day that is automatically marked, the 'dayClicked' var will be used later in the system
dayClicked = todaysDate
//-------------------------------------




/* ======= Change steps ======= */
function changeScheduleSteps(position) {
    let step_indicator_off = '#929292'
    let step_indicator_on = '#40996f'

    if (position === 1) {

        //Hides btn step back
        document.querySelector('#btn-step-back').classList.add("d-none")

        //Hides hour selection
        document.querySelector('.select-hour-step').classList.remove("d-flex")
        document.querySelector('.select-hour-step').classList.add("d-none")


        //Turns off steo indicator's color
        document.querySelector('.svg-number-2').setAttribute('fill', step_indicator_off)

        //Removes user's choosen info that appears on top of each schedule step
        document.querySelector('#alert-help-client').classList.add('d-none')

        //Shows calendar
        document.querySelector('#calendar').classList.remove("d-none")
        document.querySelector('#calendar').classList.add("d-flex")

        document.querySelector('#btn-schedule-confirmation').classList.add('d-none')

        document.querySelector('#client-choosen-date').textContent = ``

    } else if (position === 2) {

        //Hides calendar interface
        document.querySelector('#calendar').classList.add("d-none")

        //Hides step 3
        document.querySelector('.fill-form-step').classList.add('d-none')

        //Manages step indicator's color
        document.querySelector('.svg-number-2').setAttribute('fill', step_indicator_on)
        document.querySelector('.svg-number-3').setAttribute('fill', step_indicator_off)

        //Adds user's choosen info that appears on top of each schedule step
        document.querySelector('#alert-help-client').classList.remove('d-none')

        //Shows hour selection
        document.querySelector('.select-hour-step').classList.remove("d-none")
        document.querySelector('.select-hour-step').classList.add("d-flex")

        //Shows btn step back
        document.querySelector('#btn-step-back').classList.remove("d-none")

        document.querySelector('#btn-schedule-confirmation').classList.add('d-none')

        document.querySelector('#client-choosen-date').textContent = `${editedDate} às`

    } else if (position === 3) {

        //Hides hour selection
        document.querySelector('.select-hour-step').classList.remove("d-flex")
        document.querySelector('.select-hour-step').classList.add("d-none")

        //Change color of the step number
        document.querySelector('.svg-number-3').setAttribute('fill', step_indicator_on)

        //Shows schedule form
        document.querySelector('.fill-form-step').classList.remove('d-none')
        //document.querySelector('#agendamento-form').classList.add('d-flex')

        document.querySelector('#btn-schedule-confirmation').classList.remove('d-none')

    }

    //Displays error message on the form
    document.querySelector('#form-alert-info').classList.add('d-none')
}
//Go one step back
document.querySelector("#btn-step-back").addEventListener('click', () => {
    schedule_position--
    changeScheduleSteps(schedule_position)


    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
})
//===============================================







//========== SELECT HOUR STEP ================ 
//Callend by calendar's 'dateClick' 




function displayHoursBtns(e) {

    let container_hours = document.querySelector('#inner-container-select-hour')

    //Removes old btn 
    let childElements = Array.from(container_hours.children)

    if (childElements.length > 0) {
        childElements.map(i => {
            i.remove();
        })
    }


    //On click over a day from calendar
    dayClicked = e.dateStr

    let array_hours = [{
        hour: "08:00 - 09:00",
        isOccupied: false
    },
    {
        hour: "09:00 - 10:00",
        isOccupied: false
    },
    {
        hour: "10:00 - 11:00",
        isOccupied: false
    },
    {
        hour: "11:00 - 12:00",
        isOccupied: false
    },
    {
        hour: "13:00 - 14:00",
        isOccupied: false
    },
    {
        hour: "14:00 - 15:00",
        isOccupied: false
    },
    {
        hour: "15:00 - 16:00",
        isOccupied: false
    },
    {
        hour: "16:00 - 17:00",
        isOccupied: false
    },
    {
        hour: "17:00 - 18:00",
        isOccupied: false
    },
    ]

    let array_occupiedHours = []



    axios.defaults.withCredentials = true;
    axios.get('?a=get_schedules&data=' + dayClicked)
        .then(function (response) {
            let data = response.data


            //Cleans up previous btns
            const remove_hour_btns = document.querySelectorAll('.btn-hour')
            for (let i = 0; i < remove_hour_btns.length; i++) {
                remove_hour_btns[i].remove()
            }

            //If there are occupied hours coming from backend
            if (data.length > 0) {

                //Occupied hours array
                let obj = {}

                data.map(i => {
                    obj.hour = i.time
                    obj.isOccupied = true

                    array_occupiedHours.push(obj)

                })


                //Modifies array of hours setting occupied or not
                array_hours.map(i => {
                    for (let x = 0; x < array_occupiedHours.length; x++) {

                        if (i.hour == array_occupiedHours[x].hour) {

                            i.isOccupied = true
                        }
                    }
                })

                //Creates btns
                array_hours.map(i => {

                    let btn_hour_element = document.createElement('a')

                    if (i.isOccupied === true) {

                        btn_hour_element.classList.add('list-group-item', 'list-group-item-action', 'disabled', 'fs-3', 'text-center')
                        btn_hour_element.setAttribute('style', 'user-select: none; background-color: rgb(175, 175, 175); color:rgb(136, 136, 136);')
                        btn_hour_element.disabled = true
                        btn_hour_element.textContent = i.hour

                    } else {

                        btn_hour_element.classList.add('list-group-item', 'list-group-item-action', 'fs-3', 'text-center')
                        btn_hour_element.setAttribute('style', 'user-select: none; ')
                        btn_hour_element.textContent = i.hour
                    }

                    container_hours.appendChild(btn_hour_element)

                })

                //If there are not occupied hours coming from backend
            } else {

                array_hours.map(i => {

                    let btn_hour_element = document.createElement('a')
                    // btn_hour_element.classList.add('btn-hour')

                    btn_hour_element.classList.add('list-group-item', 'list-group-item-action', 'fs-3', 'text-center')
                    btn_hour_element.textContent = i.hour

                    container_hours.appendChild(btn_hour_element)
                })
            }
        })
}
//Handles btn hours click
container_btns.addEventListener('click', (e) => {

    let clickedElement = e.target

    //If the actual btn was clicked, not the parent elemenet
    if (clickedElement !== container_btns) {


        choosen_hour = clickedElement.textContent


        //Change the schedule step
        schedule_position++
        changeScheduleSteps(schedule_position)

        //Adds choosen hour to the top of the form, to help users
        document.querySelector('#client-choosen-date').textContent = `${editedDate} às ${clickedElement.textContent} horas`

        window.scrollTo({
            top: 0,
            behavior: 'smooth' // This provides smooth scrolling
        });
    }
})





//--------------------------------------------









//=========== FORM VALIDATION ==========================

//INPUT NAME
document.querySelector('#input-schedule-name').addEventListener('input', (e) => {

    let newValue = e.target.value;

    if (newValue.trim() === "") {

        green_check_name.style.display = 'none'
    } else {

        let input_name = document.querySelector('#input-schedule-name')
        document.querySelector('#input-schedule-name').style.color = '#006400'
        input_name.classList.remove('border-dark-subtle')
        input_name.classList.add('border-success-subtle', 'border-2')
    }
})
//----------------------------------------------------



//INPUT EMAIL
const emailInput = document.querySelector("#input-schedule-email"); // Replace with your input element's ID

var isValidEmailInput
function validateEmailOnKeyUp() {

    const email = emailInput.value;

    isValidEmailInput = isValidEmailFunction(email);

}

emailInput.addEventListener("keyup", validateEmailOnKeyUp);

function isValidEmailFunction(email) {
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailRegex.test(email);
}
//----------------------------------------------------



//INPUT NUMBER
document.querySelector('#input-schedule-number').addEventListener('input', (e) => {

    let newValue = e.target.value;

})
//----------------------------------------------------








/* 'BTN 'AGENDARR' CONFIRM FORM  */
//btn 'agendar' form , opens final confirmation form
document.querySelector('#btn-schedule-confirmation').addEventListener('click', () => {


    input_name = document.querySelector('#input-schedule-name').value.trim()
    input_email = document.querySelector('#input-schedule-email').value.trim()
    input_number = document.querySelector('#input-schedule-number').value.trim()
    input_text = document.querySelector('#input-schedule-text').value.trim()

    input_date = choosen_date//document.querySelector('#input-schedule-date').value.trim()
    input_hour = choosen_hour//document.querySelector('#input-schedule-hour').value.trim()

    if (input_name === '' || input_email === '' || input_number === '' || input_text === '' || input_date === '' || input_hour === '') {

        //Displays error message
        document.querySelector('#error-msg-form').textContent = "Preencha todos os campos!"

        //Displays error message on the form
        document.querySelector('#form-alert-info').classList.remove('d-none')


    } else if (!isValidEmailInput) {

        document.querySelector('#error-msg-form').textContent = ""
        document.querySelector('#error-msg-form').textContent = "Email inválido"

    } else {

        //Adds all the information to a modal popup so the user can confirm them all and actually send to the backend
        let crudDate = input_date.split("-")
        let currentMonthNameCrud = document.querySelector('.fc-toolbar-title').textContent
        let currentMonthName = currentMonthNameCrud.split(" ")



        //Cleans up any error message
        document.querySelector('#error-msg-form').textContent = ""

        //Feed inputs which the values will be sent to backend
        document.querySelector('#input-schedule-confirmation-name').value = input_name
        document.querySelector('#input-schedule-confirmation-email').value = input_email
        document.querySelector('#input-schedule-confirmation-number').value = input_number
        document.querySelector('#input-schedule-confirmation-text').value = input_text
        document.querySelector('#input-schedule-confirmation-date').value = input_date
        document.querySelector('#input-schedule-confirmation-hour').value = input_hour

        //Feeds confirmation container
        document.querySelector('#info-confirm-name').innerHTML = `<p class="m-0"><strong>Nome: </strong>${input_name}</p>`
        document.querySelector('#info-confirm-email').innerHTML = `<p class="m-0"><strong>Email: </strong>${input_email}</p>`
        document.querySelector('#info-confirm-number').innerHTML = `<p class="m-0"><strong>Número: </strong>${input_number}</p>`
        document.querySelector('#info-confirm-text').innerHTML = `<p class="m-0"><strong>Mensagem: </strong>${input_text}</p>`

        document.querySelector('#info-confirm-date').innerHTML = `<p class="m-0"><strong>Data: </strong>${crudDate[2]} de ${currentMonthName[0]} de ${crudDate[0]}</p>`//`Data: ${crudDate[0]} de ${currentMonthName[0]} de ${crudDate[2]}`
        document.querySelector('#info-confirm-hour').innerHTML = `<p class="m-0"><strong>Horário: </strong>${input_hour}</p>`

        //Shows up confirmation form modal
        document.querySelector('#btn-form-confirm').click();

    }
})




document.querySelector('#btn-form-confirmation').addEventListener('click', () => {

    let schedule_page_content = document.querySelector('#calendar-container')
    schedule_page_content.style.display='none'

    let modal_confirmation = document.querySelector('#modal-form-confirm')
    modal_confirmation.classList.add('d-none')

    let loading_container = document.querySelector('.loading-container')
    loading_container.style.display='flex'
})