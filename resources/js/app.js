import './bootstrap';

import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();

$(document).ready(() => {
    cursor();
    updateElementsToWatch();
    animeText();
})

// snipper cursor
let elementsToWatch = ['.title', '.subtitle', '.about__content', '.letter', '.button__triangle', '.form__search__input__text', '.remember', 'button'];
let elementsToMouse = ['.button__form__switch', 'a'];
let elementHovered = '';
function cursor() {
    document.body.addEventListener('mousemove', (e) => {
        $('.snipper').css({
            'transform': 'translate(' + e.clientX + 'px, ' + e.clientY + 'px)'
        })
    })
}
function updateElementsToWatch() {
    let element = elementsToWatch
    let elementMouse = elementsToMouse
    element.forEach(element => {
        $(`${element}`).each((index, el) => {
            // console.log('mouse event : ',el)
            el.addEventListener('mouseenter', hoverZoom);
            el.addEventListener('mouseleave', hoverZoom);
        })
    });
    elementMouse.forEach(element => {
        $(`${element}`).each((index, el) => {
            // console.log('mouse event : ',el)
            el.addEventListener('mouseenter', hover);
            el.addEventListener('mouseleave', hover);
        })
    });
}
function hoverZoom(event) {
    const snipper = $('.snipper');
    const snipperPlus = $('.snipper__plus');
    if (elementHovered === '') {
        // console.log('hovered', event.target)
        snipper.addClass('snipper--hover').addClass('snipper--pointer--zoom');
        snipperPlus.addClass('snipper__plus--hover');
        elementHovered = 'hovered';
    } else {
        // console.log('unhovered', event.target)
        snipper.removeClass('snipper--hover snipper--pointer--zoom');
        snipperPlus.removeClass('snipper__plus--hover');
        elementHovered = '';
    }
}
function hover(event) {
    const snipper = $('.snipper');
    if (elementHovered === '') {
        // console.log('hovered', event.target)
        snipper.addClass('snipper--hover').addClass('snipper--pointer');
        elementHovered = 'hovered';
    } else {
        // console.log('unhovered', event.target)
        snipper.removeClass('snipper--hover snipper--pointer');
        elementHovered = '';
    }
}

// Anime text home
const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZあかさたなはまやらわ123456!#&='.split('');
const text = document.querySelectorAll('.letter');
let order = 0;
function animeText() {
    Object.keys(text).forEach(key => {
        const element = text[key];
        element.addEventListener('mouseover', () => {
            element.style.top = '10px';
        });
        element.addEventListener('mouseleave', () => {
            element.style.top = '';
        });
        element.addEventListener('click', () => {
            const currentLetter = element.innerText.toUpperCase();
            const currentIndex = alphabet.indexOf(currentLetter);
            element.innerText = alphabet[(currentIndex + 1) % alphabet.length];
        });
    });
}

//

