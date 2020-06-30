var express = require('express');
var app = express();
var mysql = require('mysql');
var cors = require('cors'); // npm install cors
var bodyParser = require('body-parser'); //npm install body-parser

const connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'proyecto'
});
app.use(cors());
app.use(bodyParser.json())

app.get('/', function (req, res) {
  res.send('');
});
app.get('/lista', function (req, res) {
  connection.query('SELECT * FROM usuario ', function(err, rows, fields) {
    let response= new Object;
    response["total"]=0;
    response["lista"]=new Array();
    if (rows.length>0) {
      response["lista"]=rows;
      response["total"]=rows.length;
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
app.post('/save', function(request, res){
  //console.log(request.body);
  let sql = `INSERT INTO usuario(usuario,contrasena)VALUES(?,?)`;
  let data = [request.body.usuario, request.body.contrasena];
  let response= new Object;
  connection.query(sql, data, (err, results, fields) => {
    if (results.affectedRows>0) {
        response["estatus"]=true;
    }
    if (err) {
      response["estatus"]=false;
      response["message"]=err.message;
    }
    res.json(response);
  });

});
app.listen(3000, function () {
  console.log('Servidor en el puerto 3000!');
});
