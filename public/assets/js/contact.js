document.querySelector('#btn-confirm-form-contact-page').addEventListener('click', () => {
    let contact_container = document.querySelector('#contact-container')
    contact_container.classList.add('d-none')
    
    let loading_container = document.querySelector('.loading-container')
    loading_container.style.display = 'flex'

})
