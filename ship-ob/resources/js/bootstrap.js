window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

var ajaxBaseUrl = '';
let ajax = document.head.querySelector('meta[name="ajax-base-url"]');
if (ajax) {
    ajaxBaseUrl = ajax.content;
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = ajaxBaseUrl;

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

let assset = document.head.querySelector('meta[name="asset-base-url"]');
if (assset) {
    const assetBaseUrl = assset.content;
    global.asset = function(name) {
        return assetBaseUrl + name;
    } 
} else {
    global.asset = function(name) {
        return '/' + name;
    } 
}

const userAgent = window.navigator.userAgent.toLowerCase();
const userAgentList = [
    'msie',
    'trident',
    'edge',
    'chrome',
    'safari',
    'firefox',
    'opera',
];

var userAgentName = '';
for (var i = 0; i < userAgentList.length; i++) {
    if (userAgent.indexOf(userAgentList[i]) > -1) {
        userAgentName = userAgentList[i];
        break;
    }
}

global.isFirefox = false;
if (userAgentName === 'firefox') {
    global.isFirefox = true;
}


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
