const container_element_occupied_hours = document.querySelector('table')
var crud_array = []
var calendar
var array_ready





//Calendar initializes  here
//=============================================================
function start() {


    axios.defaults.withCredentials = true;
    axios.get('?a=feed_calendar')
        .then(function (response) {

            let originalArray = response.data


            //Removes duplicated dates so only one 'event dot' will appear on calendar, in the edit page
            function removeDuplicateDates(originalArray, property) {
                const newArray = [];
                const uniqueValues = [];

                // Iterate over each object in the original array
                for (let i = 0; i < originalArray.length; i++) {
                    const currentObject = originalArray[i];
                    const propertyValue = currentObject[property];

                    // Check if the property value is already in the uniqueValues array
                    if (!uniqueValues.includes(propertyValue)) {
                        newArray.push(currentObject);
                        uniqueValues.push(propertyValue);
                    }
                }

                return newArray;
            }
            const newArray = removeDuplicateDates(originalArray, 'start');

            //Edits each obj of 'newArray', removin the 'title' property so it's value won't appear on
            //the calendar's event, a red dot will appear instead so the user will figure out 
            //that there are events in that day
            function createNewArrayWithoutProperty(newArray, propertyToDelete) {
                let array = newArray.map(obj => {
                    const newObj = {
                        ...obj
                    }; // Create a shallow copy of the object

                    // Delete the specified property from the copied object
                    delete newObj[propertyToDelete];

                    return newObj;
                });

                return array;
            }

            array_ready = createNewArrayWithoutProperty(newArray, 'title');


            //=======================================================================================


            //Initialize calendar
            var calendarEl = document.getElementById('calendar-editar');
            calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialView: 'dayGridMonth',
                weekends: false,

                dateClick: (e) => {
                    let btnModal = document.querySelector('#btn-modal-editar')
                    btnModal.click()
                    managaEvents(e)

                    //STYLE
                    //Resets day previopus day clicked to it's original style
                    let [...all_days_color] = document.querySelectorAll('.fc-daygrid-day-number')
                    all_days_color.map(i => {
                        i.style.color = '#292d31bb'
                    })


                    let firstChild = e.dayEl.children
                    let secondChild = firstChild[0].children

                    let dayColor = secondChild[0].firstChild
                    dayColor.style.color = 'WHITE'

                    //REsets background of all days
                    const td = document.querySelectorAll('td')
                    for (let i = 0; i < td.length; i++) {
                        td[i].style.background = 'transparent'
                    }

                    //Highlights the day clicked
                    e.dayEl.style.background = '#1fa951'
                    //============================================================================  

                },

                headerToolbar: {
                    start: 'title',
                    center: '',
                    end: 'prev,next'
                },


                events: array_ready,

                eventDisplay: 'background',
                eventColor: 'red',

                //Doing nothing so far
                eventClick: (e) => {
                    //Hour
                    //   let time = e.el.innerText

                    //Day
                    let crud_day = e.event.start.toLocaleDateString('en-US', {
                        day: 'numeric',
                    });
                    let day
                    if (crud_day < 10) {
                        day = "0" + crud_day
                    } else {
                        day = crud_day
                    }

                    //Month
                    let crud_month = e.event.start.toLocaleDateString('en-US', {
                        month: 'numeric',
                    });
                    let month
                    if (crud_month < 10) {
                        month = "0" + crud_month
                    } else {
                        month = crud_month
                    }

                    //Year
                    let year = e.event.start.toLocaleDateString('en-US', {
                        year: 'numeric'
                    });

                    //Date edited
                    //   let date = year + "-" + month + "-" + day
                },


                //Highlights days from the current monht
                dayCellDidMount: function (dayRenderInfo) {
                    let currentDate = new Date();
                    let currentMonth = currentDate.getMonth();
                    let dayMonth = dayRenderInfo.date.getMonth();

                    if (currentMonth === dayMonth) {
                        dayRenderInfo.el.classList.add('current-month-highlight');
                    }
                },

            });
            calendar.render();

        })

}
start()




//Callend on calendar's dateClick method
//=============================================================
function managaEvents(e) {
    let dateClicked = e.dateStr

    //Gets data from backend and creates 'hour buttons'
    //Put inside a function later

    axios.defaults.withCredentials = true;
    axios.get('?a=get_choosen_date_info&data=' + dateClicked)
        .then(function (response) {

            let data = response.data


            //Removes previous btns if they exist
            if (data.length === 0) {

                container_element_occupied_hours.textContent = 'Nada para remover'

            } else if (data.length > 0) {

                //Clears up text
                container_element_occupied_hours.textContent = ''

                /* Loop through all previous btns hours displyed */
                let [...all_occupied_hours] = document.querySelectorAll('.container-element-occupied-hour')

                all_occupied_hours.map(i => {
                    i.remove()
                })
            }



            //Orders in ASC the hour results coming from the backend
            const arrayOrderedHours = data/* data.sort((a, b) => {
                let startTimeA = a.split(' - ')[0];
                let startTimeB = b.split(' - ')[0];
                return startTimeA.localeCompare(startTimeB);
            });

 */

            //Displays available hours to client in ASC order to help them manage
            let tbody = document.createElement('tbody')
            arrayOrderedHours.map(hour => {

                let tr = document.createElement('tr')

                let th = document.createElement('th')
                th.classList.add('w-100', 'd-flex', 'align-items-center', 'justify-content-between')

                //Text
                let p = document.createElement('p')
                p.classList.add('m-0')
                p.textContent = hour.time

                //Btn remove
                let btn_remove_occupied_hour = document.createElement('button')
                btn_remove_occupied_hour.setAttribute('value', hour.time)
                btn_remove_occupied_hour.setAttribute('name', 'submit')
                btn_remove_occupied_hour.setAttribute('type', 'submit')
                btn_remove_occupied_hour.classList.add('btn-remove-hour', 'btn', 'btn-danger', 'text-light')
                btn_remove_occupied_hour.textContent = 'remover'

                tr.appendChild(th)
                //Adds btn remove
                th.appendChild(p)
                th.appendChild(btn_remove_occupied_hour)

                tbody.appendChild(tr)
            })
            container_element_occupied_hours.appendChild(tbody)



            //Handles hour buttons deletion
            const [...all_btn_remove_hour] = document.querySelectorAll('.btn-remove-hour')

            all_btn_remove_hour.map(i => {

                i.addEventListener('click', (e) => {

                    let date_to_remove = dateClicked
                    let hour_to_remove = i.value

                    axios.defaults.withCredentials = true;
                    axios.get('?a=remove_schedule&data=' + date_to_remove + '/' + hour_to_remove)
                        .then(function (response) {
                            console.log(response.data);
                        })

                    //Removes event from the backend
   

                    //Delete btn on the screen and refresh calendar
                    const parent_btn_to_remvove = e.target.parentNode
                    //Removes the parent element of the 'remove btn'
                    parent_btn_to_remvove.remove()

                    //função
                    //Resets day previopus day clicked to it's original style
                    let [...all_days_color] = document.querySelectorAll('.fc-daygrid-day-number')
                    all_days_color.map(i => {
                        i.style.color = '#292d31bb'
                    })
                    //REsets background of all days
                    const td = document.querySelectorAll('td')
                    for (let i = 0; i < td.length; i++) {
                        td[i].style.background = 'transparent'
                    }
                })
            })

        })
}



//Called on every block of code below
//=============================================================
function updateTextContent(data, block, content, selector) {
    $.ajax({
        url: './includes/update_txt_content.inc.php',
        type: 'POST',
        data: {
            data: data,
            block: block,
            content: content
        },
        dataType: 'html',
        success: function (data) {
            let alertUpdateSuccess = document.querySelector(selector)
            alertUpdateSuccess.classList.remove('d-none')

            setTimeout(() => {
                alertUpdateSuccess.classList.add('d-none')
            }, 3000)
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText)
        }
    })
}








//================== EDIT BLOCK 1 ================
var editedDataBlock_1

//Stores the choosen checkbox value into the varivle above
const checkboxesBlock1 = document.querySelectorAll('.custom-control-input')
checkboxesBlock1.forEach((checkbox) => {

    //Unchecks non clicked checkboxesBlock1
    checkbox.addEventListener('click', () => {

        //Unchecks non clicked checkboxesBlock1
        checkboxesBlock1.forEach((otherCheckbox) => {
            if (otherCheckbox !== checkbox) {

                otherCheckbox.checked = false;
            }
        });
        //Ajax will use this variable
        editedDataBlock_1 = checkbox.value
    });
})

//Updates text
const btn_edit_home_blk_1 = document.querySelector('#btn-edit-home-blk-1')
btn_edit_home_blk_1.addEventListener('click', (e) => {
    e.preventDefault();

    //Gets new text to update
    let newTextToUpdate = document.querySelector('#block1-input-new-text').value

    updateTextContent(editedDataBlock_1, 'block 1', newTextToUpdate, '#alert-update-success-blk-1')

})





//================== EDIT BLOCK 2 ================//
var editedDataBlock_2

//Stores the choosen checkbox value into the varivle above
const checkboxes_block_2 = document.querySelectorAll('.checkbox-blk2-row1')
checkboxes_block_2.forEach((checkbox) => {

    checkbox.addEventListener('click', () => {
        editedDataBlock_2 = checkbox.value
    })

})
const btn_edit_home_block_2 = document.querySelector('#btn-edit-home-blk-2-txt')
btn_edit_home_block_2.addEventListener('click', (e) => {
    e.preventDefault();

    let newTextToUpdate = document.querySelector('#block2-row1-textarea').value

    updateTextContent(editedDataBlock_2, 'block 2', newTextToUpdate, '#alert-update-success-blk-2')

})





//================== EDIT BLOCK 3 ================//

//LEFT TEDT & PARAGRAPH
var editedDataBlock_3

//Stores the choosen checkbox value into the varivle above
const checkboxes_block_3 = document.querySelectorAll('.checkbox-blk3-txt')
checkboxes_block_3.forEach((checkbox) => {
    checkbox.addEventListener('click', () => {
        editedDataBlock_3 = checkbox.value
    })
})
const btn_edit_home_block_3 = document.querySelector('#btn-edit-home-blk-3-txt')
btn_edit_home_block_3.addEventListener('click', (e) => {
    e.preventDefault();

    let newTextToUpdate = document.querySelector('#block3-row1-textarea').value

    updateTextContent(editedDataBlock_3, 'block 3', newTextToUpdate, '#alert-update-success-blk-3')

})




//================== EDIT BLOCK 4 ================//
const btn_edit_home_block_4 = document.querySelector('#btn-edit-home-blk-4')
btn_edit_home_block_4.addEventListener('click', (e) => {
    e.preventDefault();

    let newTextToUpdate = document.querySelector('#blk-4-textarea').value

    updateTextContent('', 'block 4', newTextToUpdate, '#alert-update-success-blk-4')

})