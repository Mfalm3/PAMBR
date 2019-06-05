try {

    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');


    // require('./fileupload');


} catch (e) {
    console.log(e);
}
