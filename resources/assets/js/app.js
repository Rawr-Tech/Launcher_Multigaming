/**
 * Created by wirk on 12/04/17.
 */
import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'localhost:6001',
});

window.Echo.channel('test')
    .listen('TestEvent', (e) => {
        console.log(e.test_prop);
    });