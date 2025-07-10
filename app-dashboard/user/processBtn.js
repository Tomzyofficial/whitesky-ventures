const btn = document.getElementById('process');
btn.addEventListener('click', () => {
  btn.innerHTML = 'Processing...';
  btn.style.backgroundColor = '#ddd';
  btn.style.color = '#aaa';

})