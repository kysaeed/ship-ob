(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/dashboard"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Components/WorldEditor.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Components/WorldEditor.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {// console.log('World Editor!!!!');
  },
  methods: {
    onCreate: function onCreate() {
      var data = {
        id: this.id,
        name: this.name,
        desc: this.desc
      };
      this.axios.post('home/world/create', data).then(function (res) {
        if (res.data.isSuccess) {
          // todo: 
          alert('作成しました！');
        } else {
          ;
        }
      })["catch"](function (res) {});
    }
  },
  data: function data() {
    var axios = window.axios.create({
      responseType: 'json'
    });
    return {
      axios: axios,
      id: null,
      name: '',
      desc: ''
    };
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Components/WorldEditor.vue?vue&type=template&id=1c476324&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Components/WorldEditor.vue?vue&type=template&id=1c476324& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "my-3" },
    [
      _c(
        "b-container",
        [
          _c(
            "b-row",
            { staticClass: "my-3" },
            [
              _c("b-col", { attrs: { sm: "3" } }, [
                _c("label", [_vm._v("タイトル")])
              ]),
              _vm._v(" "),
              _c(
                "b-col",
                { attrs: { sm: "9" } },
                [
                  _c("b-form-input", {
                    attrs: { placeholder: "タイトルを入力" },
                    model: {
                      value: _vm.name,
                      callback: function($$v) {
                        _vm.name = $$v
                      },
                      expression: "name"
                    }
                  })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-row",
            { attrs: { lass: "my-3" } },
            [
              _c("b-col", { attrs: { sm: "3" } }, [
                _c("label", [_vm._v("説明")])
              ]),
              _vm._v(" "),
              _c(
                "b-col",
                { attrs: { sm: "9" } },
                [
                  _c("b-form-textarea", {
                    attrs: { placeholder: "説明を入力", rows: "8" },
                    model: {
                      value: _vm.desc,
                      callback: function($$v) {
                        _vm.desc = $$v
                      },
                      expression: "desc"
                    }
                  })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-row",
            { staticClass: "my-3 justify-content-md-center" },
            [
              _c(
                "b-col",
                { attrs: { sm: "4" } },
                [
                  _c(
                    "b-button",
                    {
                      attrs: { block: "", variant: "primary" },
                      on: { click: _vm.onCreate }
                    },
                    [_vm._v("GO!")]
                  )
                ],
                1
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/Components/WorldEditor.vue":
/*!*************************************************!*\
  !*** ./resources/js/Components/WorldEditor.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _WorldEditor_vue_vue_type_template_id_1c476324___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./WorldEditor.vue?vue&type=template&id=1c476324& */ "./resources/js/Components/WorldEditor.vue?vue&type=template&id=1c476324&");
/* harmony import */ var _WorldEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./WorldEditor.vue?vue&type=script&lang=js& */ "./resources/js/Components/WorldEditor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _WorldEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _WorldEditor_vue_vue_type_template_id_1c476324___WEBPACK_IMPORTED_MODULE_0__["render"],
  _WorldEditor_vue_vue_type_template_id_1c476324___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/WorldEditor.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Components/WorldEditor.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/Components/WorldEditor.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./WorldEditor.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Components/WorldEditor.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldEditor_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Components/WorldEditor.vue?vue&type=template&id=1c476324&":
/*!********************************************************************************!*\
  !*** ./resources/js/Components/WorldEditor.vue?vue&type=template&id=1c476324& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldEditor_vue_vue_type_template_id_1c476324___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./WorldEditor.vue?vue&type=template&id=1c476324& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Components/WorldEditor.vue?vue&type=template&id=1c476324&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldEditor_vue_vue_type_template_id_1c476324___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldEditor_vue_vue_type_template_id_1c476324___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/dashboard.js":
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Components_WorldEditor_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Components/WorldEditor.vue */ "./resources/js/Components/WorldEditor.vue");

var app = new Vue({
  el: '#app',
  components: {
    'world-editor': _Components_WorldEditor_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  }
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/dashboard.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/kysaeed/work/web/ship-ob/ship-ob/resources/js/dashboard.js */"./resources/js/dashboard.js");


/***/ })

},[[1,"/js/manifest","/js/vendor"]]]);