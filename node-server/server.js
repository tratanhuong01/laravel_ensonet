var io = require('socket.io')(6001)
console.log('Connected....')
io.on('error', function (socket) {
    console.log('error....')
})
io.on('connection', function (socket) {
    console.log('Co nguoi vua ket noi' + socket.id)
})
var Redis = require('ioredis')
var redis = new Redis(1000)
redis.psubscribe("*", function (error, count) {
    //
})
redis.on('pmessage', function (partner, channel, message) {
    io.emit('message', message)
    console.log('Sent')
})