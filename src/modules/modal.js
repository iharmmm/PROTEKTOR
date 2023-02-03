let openModal = document.getElementById('open-modal');
// Modal ID
let modal = document.getElementById('modal-demo');
// Close modal button
let closeModal = document.getElementsByClassName('close-modal')[0];
// Open modal event listener
openModal.addEventListener('click', function(){
    modal.classList.toggle('visible');
});
// Close modal event listener
closeModal.addEventListener('click', function(){
    modal.classList.remove('visible');
});