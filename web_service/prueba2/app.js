var mysql = require('mysql');
const { SerialPort, ReadlineParser } = require('serialport')
const port = new SerialPort({ path: 'COM3', baudRate: 9600 })
const parser = new ReadlineParser()

var con = mysql.createConnection({ // conexion a base datos
  host: "localhost",
  user: "root",
  port     : 3306,
  password: "",
  database: "sistema_riego"
});

function cerrarApp(){
    port.close(); // cerrar puerto
    process.exit(); // cerrar aplicacion
}

var xxx=""; var sepa;
var temp_amb; var hume_amb;
port.pipe(parser)
parser.on('data', function(data){
  data = data.toString();
  xxx=data; // guarda dato de serial en variable
  sepa = xxx.split("-"); // descomponemos el serial guardado
  hume_amb = sepa[0]; // asigna
  temp_amb = sepa[1]; // asigna
  console.log("hume: "+ hume_amb + " -- temp: "+ temp_amb);

  let query = `INSERT INTO registros (id_zona,id_ubi,temp_amb,hume_amb,iluminacion,temp_suelo,hume_suelo,ph,co2) VALUES (?,?,?,?,?,?,?,?,?);`;

  con.query(query, [2,2,temp_amb,hume_amb,0.0,10.10,10.10,0.0,0.0], (err, rows) => {
    if (err) throw err;
  });
}); // obt datos de serial

setTimeout(cerrarApp, 5000); // cerramos el puerto y la aplicacion a los 5 seg.
