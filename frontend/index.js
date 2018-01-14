var express = require('express');
var app = express();

var io = require('socket.io');

app.listen('8042');
io = io.listen('8069');

app.all('*', function (req, res){
    res.statusCode = 403;
    res.send('Forbidden.')
});

io.sockets.on('connection', function (socket) {
    socket.emit('message', { hello: 'world' })

    socket.on('my other event', function (data) {
        console.log(data)
    });

    socket.on('disconnect', function () {
        console.log('user disconnected')
    });
});

