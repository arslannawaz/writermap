(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./resources/js/rwdImageMaps.min.js":
/*!******************************************!*\
  !*** ./resources/js/rwdImageMaps.min.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var rwdImageMaps = function rwdImageMaps(t) {
  var e = t,
      r = function r() {
    e.forEach(function (t) {
      if ("undefined" != typeof t.getAttribute("usemap")) {
        var e = t;
        e.addEventListener("load", function () {
          if (w = e.getAttribute("width"), h = e.getAttribute("height"), !w || !h) {
            var t = new Image();
            t.src = e.getAttribute("src"), w || (w = t.width), h || (h = t.height);
          }

          var r = e.clientWidth / 100,
              i = e.clientHeight / 100,
              a = e.getAttribute("usemap").replace("#", "");
          document.querySelectorAll('map[name="' + a + '"] area').forEach(function (t) {
            t.dataset.coords || (t.dataset.coords = t.getAttribute("coords"));

            for (var e = t.dataset.coords.split(","), a = new Array(e.length), n = 0; n < a.length; ++n) {
              n % 2 === 0 ? a[n] = parseInt(e[n] / w * 100 * r) : a[n] = parseInt(e[n] / h * 100 * i);
            }

            t.setAttribute("coords", a.toString());
          });
        }), e.setAttribute("src", e.getAttribute("src"));
      }
    });
  };

  return window.addEventListener("resize", r), r(), this;
};

/***/ })

}]);