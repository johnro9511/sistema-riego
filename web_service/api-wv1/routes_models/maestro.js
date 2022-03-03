const express = require("express")
const maestro = express.Router() // asignar propiedades de Router

maestro.get('/',(req,res)=>{// obtener select maestro
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error
        
        conn.query('select * from maestro where estado = 1', (err, rows)=>{
            if(err){
                // console.log(err) // mostrar error en cmd
                return res.json("ERROR AL OBTENER DATOS") // si hay error
            } 

            if(!(rows == 0)){// validacion si hay datos p/mostrar
                res.json(rows) // retorna resultado
            }else{
                res.json("NO HAY DATOS PARA MOSTRAR") // retorna mensaje
            }
        })
    })
})

maestro.post('/',(req,res)=>{// insertar maestro
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        if(req.body.nombres == null || req.body.nombres == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE NOMBRES") // si hay error
        }else if(req.body.apellidos == null || req.body.apellidos == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE APELLIDOS") // si hay error
        }else{
            conn.query('insert into maestro set ?', [req.body], (err, rows)=>{
                if(err){
                    // console.log(err) // mostrar error en cmd
                    return res.json("ERROR AL INSERTAR DATOS") // si hay error
                }            
                res.send('maestro INSERTADO') // retorna resultado
            })
        }// else validacion de datos null o vacios
    })
})

maestro.put('/:id',(req,res)=>{// actualizar datos de maestro
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        if(req.body.nombres == null || req.body.nombres == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE NOMBRES") // si hay error
        }else if(req.body.apellidos == null || req.body.apellidos == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE APELLIDOS") // si hay error
        }else{
            conn.query('update maestro set ? where id = ?', [req.body, req.params.id], (err, rows)=>{
                if(err){
                    // console.log(err) // mostrar error en cmd
                    return res.json("ERROR AL ACTUALIZAR DATOS") // si hay error
                } 
                res.send('maestro ACTUALIZADO') // retorna resultado
            })
        }// else validacion de datos null o vacios
    })
})

maestro.get('/:id',(req,res)=>{// obtener maestro por filtro (id)
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query('select * from maestro where id = ?', [req.params.id], (err, rows)=>{
            if(err){
                // console.log(err) // mostrar error en cmd
                return res.json("ERROR AL OBTENER DATOS") // si hay error
            } 
            
            if(!(rows == 0)){// validacion si hay datos p/mostrar
                res.json(rows) // retorna resultado
            }else{
                res.json("NO HAY DATOS PARA MOSTRAR") // retorna mensaje
            }            
        })
    })
})

maestro.get('/nom/:nombres',(req,res)=>{// obtener maestro por filtro (NOMBRES)
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query(`select * from maestro where nombres LIKE '%' ? '%' `, [req.params.nombres], (err, rows)=>{
            if(err){
                // console.log(err) // mostrar error en cmd
                return res.json("ERROR AL OBTENER DATOS") // si hay error
            } 
            
            if(!(rows == 0)){// validacion si hay datos p/mostrar
                res.json(rows) // retorna resultado
            }else{
                res.json("NO HAY DATOS PARA MOSTRAR") // retorna mensaje
            }            
        })
    })
})

/*
maestro.delete('/:id',(req,res)=>{// eliminar DEFINITIVAMENTE maestro
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query('delete from maestro where id = ?', [req.params.id], (err, rows)=>{
            if(err){
                // console.log(err) // mostrar error en cmd
                return res.json("ERROR AL ELIMINAR DATOS") // si hay error
            } 
            res.send('maestro ELIMINADO') // retorna resultado
        })
    })
})
*/

module.exports = maestro

/* EJEMPLO INSERT/UPDATE maestro EN POSTMAN
{
    "nombres": "MARIA JOSE",
    "apellidos": "LEDESMA R",
    "foto": "my_rute/453",
    "estado": 0
} 
*/
