const express = require("express")// importar express
const app = express() // asignar propiedades de express
const alumno = require('./routes_models/alumno') // extraer model/rutas alumno
const maestro = require('./routes_models/maestro') // extraer model/rutas maestro
const materia = require('./routes_models/materia') // extraer model/rutas materia

const mysql = require("mysql")// importar lib de mysql
const myconn = require("express-myconnection")
const connex = { // objeto de conexion a base de datos
    host     : 'localhost',
    port     : 3306,
    user     : 'root',
    password : '',
    database : 'wvision1'
  };

// middlewares --------------------------------------------------------------
app.use(myconn(mysql,connex, 'single')) // usar conexion
app.use(express.json()) // respuesta del server en tipo json
app.set('json spaces', 2); // ver formato json (pretty)

// routes --------------------------------------------------------------------
app.get('/',(req,res)=>{// prueba de respuesta de home
    res.send('WELCOME TO WORLD VISION MEXICO')
}) 

app.use('/alumno', alumno) // GETTER RESPUESTAS DE ROUTER
app.use('/maestro', maestro) // GETTER RESPUESTAS DE ROUTER
app.use('/materia', materia) // GETTER RESPUESTAS DE ROUTER

app.use(function(req,res){ // verifica si existe la ruta ingresada
    res.status(404).send("PAGINA NO ENCONTRADA");
})

// server running ------------------------------------------------------------
app.set('port', process.env.PORT || 8000) // asignar puerto a servidor

app.listen(app.get('port'), ()=>{ // verificar en que puerto esta corriendo
    console.log('server running in port: ', app.get('port'))
}) 
