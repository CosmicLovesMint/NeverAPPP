import express from 'express';
import morgan from 'morgan';
import ejs from 'ejs';

import {dirname,join} from 'path'
import { fileURLToPath } from 'url';

// Establecer metadatos y direccionales de los archivos
let _dir = dirname(fileURLToPath(import.meta.url))

 // Establecer aplicacion
 const NEVERAPP = express() // EMPX

 // Establacer medidas

 NEVERAPP.set('views', join(_dir))                                      
 NEVERAPP.set('view engine', 'ejs')

 NEVERAPP.get('/', (req,res) => res.render('index'))
 NEVERAPP.use('/assets', express.static(_dir + '/assets'));
 NEVERAPP.listen(3000) // PUERTO A 3000 con secuencia
    