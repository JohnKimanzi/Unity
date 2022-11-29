/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/pages/datetimepicker.init.js ***!
  \***************************************************/
// Date Time Picker
if ($('.datetimepicker').length > 0) {
  $('.datetimepicker').datetimepicker({
    format: 'DD/MM/YYYY',
    icons: {
      up: "fa fa-angle-up",
      down: "fa fa-angle-down",
      next: 'fa fa-angle-right',
      previous: 'fa fa-angle-left'
    }
  });
}

if ($('.timepicker').length > 0) {
  $('.timepicker').datetimepicker({
    format: "hh:mm:ss",
    icons: {
      up: "fa fa-angle-up",
      down: "fa fa-angle-down",
      next: 'fa fa-angle-right',
      previous: 'fa fa-angle-left'
    }
  });
}
/******/ })()
;