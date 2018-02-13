;
var pusher = new Pusher('pusher-key');
var channel = pusher.subscribe('channel-provocations');

channel.bind('App\Events\CreateProvocation', function(data) {
    console.log(data);
});