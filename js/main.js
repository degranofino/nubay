// before start
beforeStart();

// Loading
window.addEventListener('load', () => {
  start();
})

// Window On Resize
window.addEventListener('resize', onResize);

//  before start
function beforeStart() {

  shrink_body();
  svg_replace();
  boton_to_top_normal();

  if (jQuery('.animated_letters').length) { animated_letters(); }
  if (jQuery('.module__banner').length) { carousel__banner(); }
  if (jQuery('.type-carousel').length) { gallery_carousel(); }
  if (jQuery('.type-slider').length) { gallery_slider(); }
  if (jQuery('.lg__gallery').length) { lg_gallery(); }
  if (jQuery('.module__types').length) { carousel__type(); }
  

}

// after start
function start() {

  // loading
  jQuery('body').addClass('loaded');

  setTimeout(
    function () {
      jQuery('.loading').css('display', 'none');
    }, 500);

  if (jQuery('.animated_head').length) { animate_heads(); }
  if (jQuery('.icons').length) { animate_iconos(); }
  if (jQuery('.banner__content').length) { animate_banner(); }
  if (jQuery('.module__banner').length) { animate_cabecera(); }
  if (jQuery('.normal__animation').length) { scroll_magic(); }
  if (jQuery('.btn_ancla_contact').length) { btn_contacto(); }
  if (jQuery('.btn__gallery').length) { btnGallery(); }
  if (jQuery('.draggable__content').length) { hotspots(); }

}

function onResize() {}

// hotspots

function hotspots () {

  // console.log('draggable');

  draggable = Draggable.create(".draggable__content", {
    type: "x",
    bounds: ".draggable__wrapper",
    edgeResistance: 1
  });

  jQuery('.hotspots__item').each(function() {

    // Obtén el elemento y el label asociado
    const elemento = jQuery(this);
    const item = jQuery(this).attr('data-item');
    const label = jQuery('#' + item);

    // Obtén el elemento contenedor
    const contenedor = elemento.offsetParent();

    // Obtén el alto del contenedor
    const altoContenedor = contenedor.height();

    // Obtén el valor de "top" del elemento (en píxeles)
    const topElemento = parseInt(elemento.css('top'), 10);
    // Obtén el valor de "top" del label (en porcentaje)
    const topLabelPorcentaje = parseFloat(label.css('top'));

    // Convierte el valor de "top" del label a píxeles
    const topLabelPixeles = (topLabelPorcentaje / 100) * altoContenedor;

    // console.log('topElemento en píxeles:', topElemento);
    // console.log('topLabel en porcentaje:', topLabelPorcentaje);
    // console.log('topLabel en píxeles:', topLabelPixeles);

    // Calcula la diferencia entre los valores de "top"
    const diferenciaTop = topElemento - topLabelPixeles;

    console.log('Diferencia de top en píxeles:', diferenciaTop);

    if(diferenciaTop > 0) {
      // Ajusta la altura de la barra
      jQuery(this).find('.hotspots__bar').css('height', (diferenciaTop - 18) + 'px');
    } else {
      jQuery(this).addClass('reverse');
      jQuery(this).find('.hotspots__bar').css('height',  ((diferenciaTop + 18) * -1) + 'px');
    }    


  });

  jQuery('.hotspots__item').each(function () {
    var _this = this;
    var inview = new Waypoint({
      element: _this,
      handler: function (direction) {
        element: this,
          jQuery(this.element).each(function (i) {
            var $li = jQuery(this);
            setTimeout(function () {
              $li.addClass('animation');
            }, i * 3000); // delay 100 ms
          });
      },
      offset: '60%'
    });
  })

}

// Formularios OK

(function () {

  // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
  if (!String.prototype.trim) {
    (function () {
      // Make sure we trim BOM and NBSP
      var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
      String.prototype.trim = function () {
        return this.replace(rtrim, '');
      };
    })();
  }

  [].slice.call(document.querySelectorAll('.input__field')).forEach(function (inputEl) {
    // in case the input is already filled..
    if (inputEl.value.trim() !== '') {
      classie.add(inputEl.parentNode, 'input--filled');
    }

    // events:
    inputEl.addEventListener('focus', onInputFocus);
    inputEl.addEventListener('blur', onInputBlur);
  });

  function onInputFocus(ev) {
    classie.add(ev.target.parentNode, 'input--filled');
  }

  function onInputBlur(ev) {
    if (ev.target.value.trim() === '') {
      classie.remove(ev.target.parentNode, 'input--filled');
    }
  }
})();

// Lightgallery OK

function lg_gallery() {

  var elements = document.getElementsByClassName('lg__gallery');

  for (let item of elements) {
    lightGallery(item, {
      share: false,
      selector: 'a',
      speed: 500,
      licenseKey: 'RWGFX-KWFPH-57MZ4-GKE8B',
      counter: false,
      mousewheel: true,
      download: false,
      mobileSettings: {
        showCloseIcon: true
      }
    })
  }
}

/*********** BTN GALLERY  ************/
function btnGallery () {
  jQuery('.btn__gallery').click(function(event) {
    event.preventDefault();
    var gallery = jQuery(this).attr('data-gallery');
    if (gallery) {
      var firstChild = jQuery('#' + gallery + ' a:first-child');
      if (firstChild.length) {
        firstChild[0].click();
      } 
    } 
  });
}

/*********** BTN CONTACT  ************/
function btn_contacto() {
  jQuery('.btn_ancla_contact').click(function (event) {
    event.preventDefault();
    setTimeout(
      function () {
        jQuery('html, body').animate({
          scrollTop: jQuery('#contacto').offset().top
        }, 500);
      }, 500);
  });
}

/*********** ANIMATED LETTERS  ************/
function animated_letters() {
  jQuery('.animated_letters').each(function () {
    var text = jQuery(this).text().split(' ');
    for (var i = 0, len = text.length; i < len; i++) {
      text[i] = '<span class="word-' + i + '"><span class="word-' + i + '">' + text[i] + '</span></span>';
    }
    jQuery(this).html(text.join(' '));
  });
}

/*********** SCROLL MAGIC  ************/
function scroll_magic() {

  // init controller
  var controller = new ScrollMagic.Controller();

  if (jQuery('.module').length) {
    jQuery('.module').each(function () {
      // build scene
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 1, // show, when scrolled 10% into view
        // duration: "100%", // hide 10% before exiting view (80% + 10% from bottom)
        offset: 25, // move trigger to center of element
        // reverse: false
      })
        .setClassToggle(this, "animation") // add class to reveal
        .addTo(controller);
    })
  }

  if (jQuery('.normal__animation').length) {
    jQuery('.normal__animation').each(function () {
      // build scene
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 1, // show, when scrolled 10% into view
        // duration: "100%", // hide 10% before exiting view (80% + 10% from bottom)
        offset: 80, // move trigger to center of element
        // reverse: false
      })
        .setClassToggle(this, "animation") // add class to reveal
        .addTo(controller);
    })
  }

  if (jQuery('.normal__animation2').length) {
    jQuery('.normal__animation2').each(function () {
      // build scene
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: 1, // show, when scrolled 10% into view
        // duration: "100%", // hide 10% before exiting view (80% + 10% from bottom)
        offset: 10, // move trigger to center of element
        // reverse: false
      })
        .setClassToggle(this, "animation") // add class to reveal
        .addTo(controller);
    })
  }

  if (jQuery('.banner__bg').length) {
    jQuery('.banner__bg').each(function () {
      var banner_bg = jQuery(this).find('banner_bg__fondo');
      // build scenes
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: "onEnter",
        duration: "200%"
      })
        .setTween(banner_bg, { y: "100%", ease: Linear.easeNone })
        .addTo(controller);
    })
  }

}

/*****************************************/
/******** CARRUSEL FULLPAGE BG ***********/
/*****************************************/
function carousel__type () {

  const carousels = document.querySelectorAll( '.module__types .splide');

  // animation for each title
  carousels.forEach((carousel) => {

    const splide = new Splide(carousel, {
      type   : 'slide',
      padding: { left: '200px', right: '200px'},
      perPage: 3,
      perMove: 1,
      arrows: false,
      pagination: false,
      breakpoints: {
        767: {
          perPage: 1,
          padding: { left: '30px', right: '60px'},
        },
        991: {
          perPage: 2,
          padding: { left: '40px', right: '100px'},
        },
        1199: {
          perPage: 3,
          padding: { left: '60px', right: '150px'},
        },
        1599: {
          perPage: 3,
          padding: { left: '100px', right: '180px'},
        },
      }
    });

    splide.mount();

  })

}

/*****************************************/
/******** CARRUSEL FULLPAGE BG ***********/
/*****************************************/
function carousel__banner() {

  var owl = jQuery('.module__banner .owl-carousel');

  owl.owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    items: 1,
    dots: false,
    autoplay: true,
    animateIn: 'fadeIn', // add this
    animateOut: 'fadeOut' // and this
  })

}

/*****************************************/
/******** CARRUSEL FULLPAGE BG ***********/
/*****************************************/
function gallery_carousel() {

  jQuery('.type-carousel').each(function () {

    var _this = this;
    var owl = jQuery(_this).find('.owl-carousel');

    owl.owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      autoWidth: true,
      items: 3,
      dots: true
    })
    
  })

}

/*****************************************/
/******** CARRUSEL FULLPAGE BG ***********/
/*****************************************/
function gallery_slider() {

  jQuery('.type-slider').each(function () {

    var _this = this;
    var owl = jQuery(_this).find('.owl-carousel');

    owl.owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      items: 1,
      dots: true
    })

  })

}

/*****************************************/
/************** SHRINK BODY **************/
/*****************************************/
function shrink_body() {
  var offset = 150;
  var duration = 300;
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('body').addClass('shrink');
    } else {
      jQuery('body').removeClass('shrink');
    }
  });
}

/*****************************************/
/************** SVG REPLACE **************/
/*****************************************/
function svg_replace() {
  jQuery('img[src$=\".svg\"]').each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');
    jQuery.get(imgURL, function (data) {
      // Get the SVG tag, ignore the rest
      var $svg = jQuery(data).find('svg');
      // Add replaced image's ID to the new SVG
      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      // Add replaced image's classes to the new SVG
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }
      // Remove any invalid XML tags as per http://validator.w3.org
      $svg = $svg.removeAttr('xmlns:a');
      // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
      if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
      }
      // Replace image with new SVG
      $img.replaceWith($svg);
    }, 'xml');
  });
}

/******** BOTON TOP NORMAL ********/
function boton_to_top_normal() {
  jQuery('.back-to-top').click(function (event) {
    event.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, 300);
    return false;
  });
}

/******** ANIMACIONES TRABAJOS ********/

// ANIMACION BLOQUES GENERALES
// function animate_blocks() {
//   jQuery('.normal__animation').each(function () {
//     var _this = this;
//     var inview = new Waypoint({
//       element: _this,
//       handler: function (direction) {
//         jQuery(this.element).addClass('animation');
//       },
//       offset: '60%'
//     });
//   });
// }

// ANIMACION HEADERS
function animate_heads() {

  jQuery('.animated_head').each(function () {
    var _this = this;
    var inview = new Waypoint({
      element: _this,
      handler: function (direction) {
        jQuery(this.element).addClass('animation');
        jQuery(this.element).find('.animated_letters > span').each(function (i) {
          var $li = jQuery(this);
          setTimeout(function () {
            $li.addClass('loaded');
          }, i * 100); // delay 100 ms
        });
      },
      offset: '60%'
    });
  });

}

// ANIMACION ICONOS
function animate_iconos() {

  jQuery('.icons__list').each(function () {
    var _this = this;
    var inview = new Waypoint({
      element: _this,
      handler: function (direction) {
        element: this,
          jQuery(this.element).find('li').each(function (i) {
            var $li = jQuery(this);
            setTimeout(function () {
              $li.addClass('animation');
            }, i * 150); // delay 100 ms
          });
      },
      offset: '60%'
    });
  })
}

// ANIMACION BANNER
function animate_banner() {
  var waypoints = jQuery('.banner__content').waypoint({
    handler: function (direction) {
      element: this,
        jQuery(this.element).addClass('animation');
      jQuery('.animation.banner__content .animated_letters > span').each(function (i) {
        var $li = jQuery(this);
        setTimeout(function () {
          $li.addClass('loaded');
        }, i * 200); // delay 100 ms
      });
    },
    offset: '80%'
  })
}

// ANIMACION CABECERA
function animate_cabecera() {
  var waypoints = jQuery('.module__banner').waypoint({
    handler: function (direction) {
      element: this,
        jQuery(this.element).addClass('animation');
      jQuery('.module__banner .animated_letters > span').each(function (i) {
        var $li = jQuery(this);
        setTimeout(function () {
          $li.addClass('loaded');
        }, i * 200); // delay 100 ms
      });
    },
    offset: '80%'
  })
}