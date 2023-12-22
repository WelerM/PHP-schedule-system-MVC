//Animation
const intersectionContainers = document.querySelectorAll('.intersection-container')
const observer = new IntersectionObserver(
    entries => {

        entries.forEach(entry => {
            entry.target.classList.toggle('show', entry.isIntersecting)
            if (entry.isIntersecting) observer.unobserve(entry.target)
        })
    }/* ,
    {
        threshold: 0.1
    } */
)
intersectionContainers.forEach(container => {
    observer.observe(container)
})





//Will be a link to it in the footer
// Opens login form modal
document.addEventListener('keydown', function (event) {

    if (event.ctrlKey && event.shiftKey && event.key === 'L') {
        document.querySelector('#btn-open-login-form').click();

    }
});

