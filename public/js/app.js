/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);

/***/ }),
/* 2 */
/***/ (function(module, exports) {

layui.config({
    base: '/fly/layui-formSelects-master/dist/' //此处路径请自行处理, 可以使用绝对路径
}).extend({
    formSelects: 'formSelects-v4'
});
layui.use(['element', 'form', 'layedit', 'util', 'carousel', 'formSelects'], function () {
    var element = layui.element,
        form = layui.form,
        layedit = layui.layedit,
        util = layui.util,
        $ = layui.jquery,
        carousel = layui.carousel,
        formSelects = layui.formSelects;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layedit.set({
        uploadImage: {
            url: '/post/imageUpload',
            type: 'post'
        }
    });
    layedit.build('L_content', {
        height: 300
    });

    util.fixbar({
        bar1: '&#xe642;',
        bgcolor: '#009688',
        click: function click(type) {
            if (type === 'bar1') {
                location.href = '/post/create';
            }
        }
    });

    carousel.render({
        elem: '#home_banner',
        width: '100%',
        arrow: 'always',
        height: '360px'
    });

    $('.fly-search').on('click', function () {
        var toke_name = $('meta[name="csrf-token"]').attr('content');
        layer.open({
            type: 1,
            title: false,
            closeBtn: false
            //,shade: [0.1, '#fff']
            , shadeClose: true,
            maxWidth: 10000,
            skin: 'fly-layer-search',
            content: ['<form action="http://www.haitaostyle.top/post/search" method="post">', '<input autocomplete="off" placeholder="搜索内容，回车跳转" type="text" name="search">', '<input type="hidden" name="_token" value="' + toke_name + '">', '</form>'].join(''),
            success: function success(layero) {
                var input = layero.find('input[name="search"]');
                input.focus();

                layero.find('form').submit(function () {
                    var val = input.val();
                    if (val.replace(/\s/g, '') === '') {
                        return false;
                    }
                    input.val(input.val());
                });
            }
        });
    });

    formSelects.btns('layui_select', ['remove']);
    formSelects.maxTips('layui_select', function (id, vals, val, max) {
        layer.alert("选超了!!!");
    });

    formSelects.render('layui_select');
});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);