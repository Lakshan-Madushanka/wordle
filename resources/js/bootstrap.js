/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

Alpine.plugin(persist)

window.Alpine = Alpine

document.addEventListener('alpine:init', () => {
    Alpine.store('darkMode', {
        on: Alpine.$persist(false).as('darkMode_on'),

        toggle() {
            this.on = !this.on
        }
    })
})

document.addEventListener('alpine:init', () => {
    Alpine.data('currentGuess', () => ({
        guess: [],

        inputKey($key) {
            let noOfGuessedLetters = this.guess.length;
            if ($key === 'Backspace') {
                this.guess.pop();
                return;
            }

            if ($key === 'Enter' && noOfGuessedLetters === 5) {
                Livewire.emit('submitGuess', this.guess);
                return;
            }
            const validLetters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
            $key = $key.toLowerCase();

            if (validLetters.includes($key) && this.guess.length < 5) {
                this.guess.push($key)
            }
        },
    }))
})

Alpine.start()

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

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
