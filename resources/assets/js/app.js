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

window.Echo.join(`chat`)
    .here((users) => {
        users.forEach((element) => {
            let username = $('meta[name="username"]').attr('content');
            if (username !== element.name) {
                $('#group-1').append('<a id="' + element.id + '" href="/user/'+ element.id +'"><span class="user-status is-online"></span> <em>' + element.name +'</em></a>');
            }
        })
    })
    .joining((user) => {
        $('#group-1').append('<a id="' + user.id + '" href="/user/'+ user.id +'"><span class="user-status is-online"></span> <em>' + user.name +'</em></a>');
    })
    .leaving((user) => {
        $('#'+user.id).remove();
    });