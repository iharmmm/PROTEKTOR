document.querySelector('.rasstoyanie').innerHTML = 500;
var btn = document.querySelector('#btn');
out = document.querySelector('#out');
weight = document.querySelector('#weight');
vol = document.querySelector('#vol');
load = document.querySelector('#load');
del = document.querySelector('#del');
track = document.querySelector('#track');
frag = document.querySelector('#frag');
range = document.querySelector('#range');
weight = document.querySelector('#weight');
vol = document.querySelector('#vol');
kg = 5.5;
kub = 3500;
km = 2;

// range slider
range.onchange = function () {
  document.querySelector('.rasstoyanie').innerHTML = range.value;
};
// Basic function
btn.onclick = function () {
  if (weight.value !== '' && vol.value !== '') {
    if (load.checked) {
      load.value = 1500;
    } else {
      load.value = 0;
    }
    if (del.checked) {
      del.value = 3500;
    } else {
      del.value = 0;
    }
    if (frag.checked) {
      frag.value = 2000;
    } else {
      frag.value = 0;
    }
    if (track.checked) {
      track.value = 800;
    } else {
      track.value = 0;
    }
    out.innerHTML = weight.value * kg + vol.value * kub + Number(load.value) + +Number(del.value) + Number(frag.value) + range.value * km + Number(track.value);
  } else {
    alert('Введите вес, объем груза и выберите город');
  }
};