// This file is required by the index.html file and will
// be executed in the renderer process for that window.
// All of the Node.js APIs are available in this process.

var jsonfile = require('jsonfile')

var file = 'config.json'
jsonfile.readFile(file, function(err, obj) {
  document.title = obj.app
  document.getElementById("msg").innerHTML = obj.server.name
})
