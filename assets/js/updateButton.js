var updateButtons = document.querySelectorAll('.update-btn')

updateButtons.forEach(button => {
    button.addEventListener('click', () => {
        const userId = button.getAttribute('data-user-id')
        const userIdNumber = userId.replace('user-details-', '');
        const userHideId = `user-hide-${userIdNumber}`;
        const userDetails = document.getElementById(`${userHideId}`)
        userDetails.classList.toggle('d-none');
    })
})