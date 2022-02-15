var modal = document.querySelector('.modal');
var modals = document.querySelectorAll('.modal');
var modalBtn = document.querySelector('.modal-close');
var menu = document.querySelectorAll('.floating-menu');
var coursesDropdown = document.querySelector('.courses-menu-dropdown');
var coursesDropdownArrow = document.querySelector('.courses-menu-frame img');
var showMore = document.querySelector('.tablet-now-active button');
var tabletParticipants = document.querySelector('.participants.show-on-tablet');

function openModal() {
    modal.style.display = 'grid'
}

function closeModal() {
    modal.style.display = 'none'
}

function openModals(id) {
    modals[id].style.display = 'grid'
}

function closeModals(id) {
    modals[id].style.display = 'none'
}

function filename() {
    document.querySelector('.modal .modal-box .modal-content.modal-content-confirm .modal-form div p').innerText = document.querySelector('.modal .modal-box .modal-content.modal-content-confirm .modal-form div input').value
}

function closeParticipants() {
    tabletParticipants.style.display = 'none'
}

function openParticipants() {
    tabletParticipants.style.display = "block"
}



var clickCounter = 0

function isEven(value) {
	if (value%2 == 0)
		return true;
	else
		return false;
}



let vh = window.innerHeight * 0.01
document.documentElement.style.setProperty('--vh', `${vh}px`)

window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01
    document.documentElement.style.setProperty('--vh', `${vh}px`)
})



coursesDropdownArrow.onclick = function () {
    clickCounter ++
    coursesDropdownArrow.style.transform = 'rotate(-90deg)'
    coursesDropdown.style.visibility = 'visible'

    if (isEven(clickCounter)) {
        coursesDropdownArrow.style.transform = 'rotate(90deg)'
        coursesDropdown.style.visibility = 'hidden'
    }
}