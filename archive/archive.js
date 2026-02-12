
const modal = document.getElementById('modal');
const modalImg = document.getElementById('modal-image');
const modalDesc = document.getElementById('modal-description');
const closeBtn = document.querySelector('.close');

const openButtons = document.querySelectorAll('.open-btn');

openButtons.forEach(button => {
  button.addEventListener('click', function(e){
    e.preventDefault();

    const imageScr = this.dataset.image;
    const description = this.dataset.description;

    modalImg.src = imageScr;
    modalDesc.textContent = description;

    modal.style.display = 'block';
  });
});

closeBtn.addEventListener('click', function(){
  modal.style.display = 'none';
});

window.addEventListener('click', function(e){
  if (e.target === modal){
    modal.style.display = 'none';
  }
});
