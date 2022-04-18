var filterHeaders = document.getElementsByClassName("rdk_catalog__toolbar__filter__header");

var toggleOpen = function(el) {

    console.log(el)

    if (! el.classList.contains("opened")){
        var openedItems = document.getElementsByClassName("opened");

        for (let item of openedItems) {
            // item.classList.remove("opened");
            // item.nextElementSibling.classList.remove("opened");
        }
    }



    el.classList.toggle("opened");
    el.nextElementSibling.classList.toggle("opened");
};



function coverImgMouseMove(event){

    let rect = event.target.getBoundingClientRect();
    let mosXPos = event.clientX - rect.left;
    let mosYPos = event.clientY - rect.top;
    let itemWidth = event.target.offsetWidth;
    let itemHeight = event.target.offsetHeight;
    let mosXOffset = mosXPos - (itemWidth / 2 )
    let mosYOffset = mosYPos - (itemHeight / 2 )

    let xPosPercent = (mosXOffset / itemWidth) * 5
    let yPosPercent = (mosYOffset / itemHeight) * 5

    event.target.style.transform = `perspective(${itemWidth}px) rotateX(${yPosPercent}deg) rotateY(${xPosPercent}deg) scale3d(1, 1, 1)`;

}


function resetCoverImg(event){
    let itemWidth = event.target.offsetWidth;
    let target = event.target;

    setTimeout(function(){
        event.target.style.transform  = 'rotateX(0deg)';
        event.target.style.transform  = 'rotateY(0deg)';
        event.target.style.transform = `perspective(${itemWidth}px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;
    }, 1000);

}


jQuery( function($) {
  $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100,
      values: [ 0, 100 ],
      change: function( event, ui ) {
          Livewire.emit('setMinPriceFilter', ui.values[ 0 ]);
          Livewire.emit('setMaxPriceFilter', ui.values[ 1 ]);
      }
  });
});
