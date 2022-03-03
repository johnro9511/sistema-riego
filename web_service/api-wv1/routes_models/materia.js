
const express = require("express");
const materia = express.Router(); // asignar propiedades de Router

materia.get('/',(req,res)=>{// obtener select materia
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error
        
        conn.query('select * from materia', (err, rows)=>{
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

materia.post('/',(req,res)=>{// insertar materia
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error
        
        if(req.body.nombres == null || req.body.nombres == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE NOMBRES") // si hay error
        }else{
            conn.query('insert into materia set ?', [req.body], (err, rows)=>{
                if(err){
                    // console.log(err) // mostrar error en cmd
                    return res.json("ERROR AL INSERTAR DATOS") // si hay error
                }            
                res.send('materia INSERTADO') // retorna resultado
            })
        }// else validacion de datos null o vacios
    })
})

materia.put('/:id',(req,res)=>{// actualizar datos de materia
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        if(req.body.nombres == null || req.body.nombres == ""){// validacion de datos null o vacios
            return res.json("INGRESE DATOS DE NOMBRES") // si hay error
        }else{
            conn.query('update materia set ? where id = ?', [req.body, req.params.id], (err, rows)=>{
                if(err){
                    // console.log(err) // mostrar error en cmd
                    return res.json("ERROR AL ACTUALIZAR DATOS") // si hay error
                } 
                res.send('materia ACTUALIZADO') // retorna resultado
            })
        }// else validacion de datos null o vacios
    })
})

materia.get('/:id',(req,res)=>{// obtener materia por filtro (id)
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query('select * from materia where id = ?', [req.params.id], (err, rows)=>{
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

materia.get('/nom/:nombres',(req,res)=>{// obtener materia por filtro (NOMBRES)
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query(`select * from materia where nombres LIKE '%' ? '%' `, [req.params.nombres], (err, rows)=>{
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
materia.delete('/:id',(req,res)=>{// eliminar DEFINITIVAMENTE materia
    req.getConnection((err,conn)=>{
        if(err) return res.send(err) // si hay error

        conn.query('delete from materia where id = ?', [req.params.id], (err, rows)=>{
            if(err){
                // console.log(err) // mostrar error en cmd
                return res.json("ERROR AL ELIMINAR DATOS") // si hay error
            } 
            res.send('materia ELIMINADO') // retorna resultado
        })
    })
})
*/

module.exports = materia

/* EJEMPLO INSERT/UPDATE materia EN POSTMAN
{
    "nombres": "QUIMICA II",
    "estado": 1
} 
*/
