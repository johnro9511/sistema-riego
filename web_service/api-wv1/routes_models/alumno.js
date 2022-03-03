const express = require("express")
const alumno = express.Router() // asignar propiedades de Router

alumno.get('/',(req,res)=>{// obtener select alumno
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error
        
        conn.query('select * from alumno where estado = 1', (err, rows)=>{
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

alumno.post('/',(req,res)=>{// insertar alumno
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        if(req.body.nombres == null || req.body.nombres == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE NOMBRES") // si hay error
        }else if(req.body.apellidos == null || req.body.apellidos == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE APELLIDOS") // si hay error
        }else{
            conn.query('insert into alumno set ?', [req.body], (err, rows)=>{
                if(err){
                    // console.log(err) // mostrar error en cmd
                    return res.json("ERROR AL INSERTAR DATOS") // si hay error
                }            
                res.send('alumno INSERTADO') // retorna resultado
            })
        }// else validacion de datos null o vacios
    })
})

alumno.put('/:id',(req,res)=>{// actualizar datos de alumno
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        if(req.body.nombres == null || req.body.nombres == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE NOMBRES") // si hay error
        }else if(req.body.apellidos == null || req.body.apellidos == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE APELLIDOS") // si hay error
        }else{
            conn.query('update alumno set ? where id = ?', [req.body, req.params.id], (err, rows)=>{
                if(err){
                    // console.log(err) // mostrar error en cmd
                    return res.json("ERROR AL ACTUALIZAR DATOS") // si hay error
                } 
                res.send('alumno ACTUALIZADO') // retorna resultado
            })
        }// else validacion de datos null o vacios
    })
})

alumno.get('/:id',(req,res)=>{// obtener alumno por filtro (id)
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query('select * from alumno where id = ?', [req.params.id], (err, rows)=>{
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

alumno.get('/nom/:nombres',(req,res)=>{// obtener alumno por filtro (NOMBRES)
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query(`select * from alumno where nombres LIKE '%' ? '%' `, [req.params.nombres], (err, rows)=>{
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
alumno.delete('/:id',(req,res)=>{// eliminar DEFINITIVAMENTE alumno
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query('delete from alumno where id = ?', [req.params.id], (err, rows)=>{
            if(err){
                // console.log(err) // mostrar error en cmd
                return res.json("ERROR AL ELIMINAR DATOS") // si hay error
            } 
            res.send('alumno ELIMINADO') // retorna resultado
        })
    })
})
*/

module.exports = alumno

/* EJEMPLO INSERT/UPDATE ALUMNO EN POSTMAN
{
    "nombres": "MARIA JOSE",
    "apellidos": "LEDESMA R",
    "foto": "my_rute/453",
    "estado": 0
} 
*/
