
function counter() {
  const counters = document.querySelectorAll('.counter .counter__number');
  const counter = [];

  for (i = 0; i < counters.length; i++) {
    counter[i] = parseInt(counters[i].innerHTML);
  }

  const count = function(start, value, id, speed) {
    let localStart = start;
    setInterval(function() {
      if (localStart < value) {
        localStart++;
        counters[id].innerHTML = localStart;
      }
    }, speed);
  }

  for (j = 0; j < counters.length; j++) {
    const value = counter[j];
    const speed = 100 / value.toString().length;
    count(0, value, j, speed);
  }
}

function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

let counterTarget;
let counterTriggered = false;

window.addEventListener('DOMContentLoaded', () => {
  counterTarget = document.querySelector('.counter');
});

window.addEventListener('scroll', function() {
  if(counterTarget && isInViewport(counterTarget) && !counterTriggered) {
    counter();
    counterTriggered = true;
  }
});