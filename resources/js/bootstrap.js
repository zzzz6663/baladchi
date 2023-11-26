import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
// console.log(2323)
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'e1549a0011172d219e6a',
//     cluster: 'mt1',
//     encrypted: true,

// });


// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MiX_PUSHER_APP_KEY,
//     cluster: process.env.MiX_PUSHER_APP_CLUSTER,
//     // encrypted: true,
//     wsHost:window.location.hostname,
//     wsPort:6001

// });

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.PUSHER_APP_KEY,
//     cluster: process.env.PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: process.env.PUSHER_HOST ? process.env.PUSHER_HOST : `ws-${process.env.PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: process.env.PUSHER_PORT ?? 80,
//     wssPort: process.env.PUSHER_PORT ?? 443,
//     forceTLS: (process.env.PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: "1567789",
//     cluster: 'mt1',
//     wsHost:  "localhost",
//     wsPort: "6001",
//     forceTLS: false,
// });
// let mix = require('laravel-mix');
// require('dotenv').config();
// let my_env_var = process.env.MY_ENV_VAR;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     // wsHost: window.location.hostname,
//     wsHost: import.meta.env.VITE_PUSHER_HOST,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     // wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     // forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     // enabledTransports: ['ws', 'wss'],
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: false
// });

// console.log(8080)


// window.Echo.channel("home").listen("NewTest",(e)=>{
//     console.log(e)
// })


// window.Echo.join('home')
//                     .here(users => {
//                         users.forEach(function (item) {
//                         });
//                     })
//                     .joining(user => {
//                         console.log('joining')
//                     })
//                     .leaving(user => {
//                         console.log('leaving')
//                     })
//                     .listen('NewTest', e => {
//                         console.log('sssssssssss')

//                     }).listenForWhisper('typing', e => {
//                         console.log(typing)

//                     })

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
