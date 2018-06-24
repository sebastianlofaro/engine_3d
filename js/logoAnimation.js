
// Logo Animation
$("#logo").on("click", function() {
  console.log("Logo Clicked");
  anime.timeline().add({
    targets: '#logo',
    easing: 'linear',
    duration: 1000,
    opacity: 1
  }).add({
    targets: '#logo-a',
    easing: 'linear',
    duration: 2000,
    width: '50px',
    height: '50px',
    marginTop: '27px',
    marginLeft: '30px'
  }).add({
    targets: '.nav-background',
    easing: 'linear',
    duration: 500,
    top: 0,
    offset: "-=500"
  });
});


$(document).ready(function(){
  anime.timeline().add({
    targets: '#logo-a',
    easing: 'linear',
    duration: 2000,
    opacity: 1
  }).add({
    targets: '#logo-a',
    easing: 'linear',
    duration: 1500,
    width: '50px',
    height: '50px',
    marginTop: '-26px',
    marginLeft: '30px'
  }).add({
    targets: '.nav-background-a',
    easing: 'linear',
    duration: 500,
    top: 0,
    offset: "-=500"
  }).add({
    targets: '.category-wrapper',
    easing: 'linear',
    duration: 1000,
    delay: function(el, i, l) { return 100 + (i * 200);},
    opacity: 1
  });
});
