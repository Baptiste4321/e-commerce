const button = document.querySelector('.button-hist'); // select the button using its class
const footer = document.querySelector('.footer'); // select the footer using its class

function adjustButtonPosition() {
    const buttonRect = button.getBoundingClientRect();
    const footerRect = footer.getBoundingClientRect();

    // check if the button is overlapping with the footer
    if (buttonRect.bottom >= footerRect.top) {
        // calculate the new position of the button
        const newTop = footerRect.top - buttonRect.height - 10; // subtract the height of the button and add some padding

        // update the CSS properties of the button
        button.style.marginBottom = `${newTop}px`;
        button.style.position = 'fixed';
    }
}

// call the function initially and on window resize
adjustButtonPosition();
window.addEventListener('resize', adjustButtonPosition);