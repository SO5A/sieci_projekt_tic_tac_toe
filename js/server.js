'use strict';

let http = require('http');
let express = require('express');
let socketio = require('socket.io');
let RpsGame = require('./RpsGame');

let app = express();
let server = http.createServer(app);
let io = socketio(server);

let waitingPlayer;

io.on('connection', onConnection);

app.use(express.static(__dirname + '/client'));
server.listen(8080, () => console.log('Ready to work!'));

