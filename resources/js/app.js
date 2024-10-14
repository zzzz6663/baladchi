import './bootstrap';
// import '../../public/common/tooltipster.bundle.min';
import '../../public/common/js';

// console.log(787111777118)




import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    // wsHost: window.location.hostname,
    wsHost: "socket.baladchee.ir",
    // wsHost: import.meta.env.VITE_PUSHER_HOST,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    // wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    // forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    // enabledTransports: ['ws', 'wss'],+
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: false
});
console.log(window.location.hostname)
// console.log(1133112121222211212)

$('.name_inp').on('change', function() {
    console.log(44)
    var fileName = $(this).val().split('\\').pop(); // استخراج نام فایل
    $(this).prev('label').text('انتخاب فایل: ' + fileName); // انتخاب لیبل مربوطه و افزودن نام فایل

});


$('body').on('click', '.clear_search', function (e) {
    $('#skill_search_list').html("")
    $('#skill_list').slideDown(200)
    $('#skill_search_list').slideUp(200)
})
$('#skill_search').on('input', function() {
    let el=$(this)
    var search = el.val();
    let baladchi=el.data("balad");
    console.log(baladchi)

    $.ajax('/get_skill', {
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        },
        data: { search: search,baladchi:baladchi },
        type: 'post',
        success: function (data) {
            console.log(data)
            $('#skill_search_list').html(data.body)
            $('#skill_list').slideUp(200)
            $('#skill_search_list').slideDown(200)
        },
        error: function (request, status, error) {
            console.log(request)
        }
    })

});
$('.file_s').on('change', function() {
    let el=$(this)
    var fileName = el.val().split('\\').pop();
    console.log(fileName)
    el.closest(".file_par").find('.file_name').text(fileName);
});



window.Echo.channel("home").listen("NewTest",(e)=>{
    console.log(e)
})


