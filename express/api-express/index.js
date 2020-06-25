var express = require('express');
var app = express();
var mysql = require('mysql');
const connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'proyecto'
});
app.get('/', function (req, res) {
  res.send('');
});
app.get('/lista', function (req, res) {
  connection.query('SELECT * FROM usuario ', function(err, rows, fields) {
    let response= new Object;
    if (rows.length>0) {
      response["lista"]=rows;
      response["total"]=rows.length;
    }else{
      response["lista"]=new Array();
      response["total"]=0;
    }
    res.json(response);
  });
});
app.get('/usuario/:id', function (req, res) {
  connection.query(`SELECT * FROM usuario where idusuario=${req.params.id};`, function(err, rows, fields) {
    let response= new Object;
    if(rows.length>0){
      response["usuario"]=rows[0];
    }else{
      response["usuario"]=null;
    }
    res.json(response);
  });
});
app.listen(3000, function () {
  console.log('Servidor en el puerto 3000!');
});
