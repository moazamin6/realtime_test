<?php


//Broadcast::channel('App.User.{id}', function ($user, $id) {
//    return (int)$user->id === (int)$id;
//});
//
Broadcast::channel('testChannel', function () {
    return true;
});


Broadcast::channel('chat-{id}', function () {
    return true;
});