const express = require('express')
const app = express()
const bodyParser = require('body-parser')
const { getDocument, deleteData, insertData, filter , updateData } = require('./dataBase')
const fs = require('fs')


const index = fs.readFileSync('./index.html', 'utf-8')
const PORT = process.env.PORT || 3000

app.use(bodyParser.json())

// serving html page
app.get('/', (req, res) => {
    res.send(index)

})

// sending all data
app.get('/sel', (req, res) => {
    getDocument().then((response) => {
        res.send(response)
    })
})

// inserting data into the db
app.post('/ins', (req, res) => {
    insertData(req.body)
    res.send(req.body)
})

// deleting doc from db
app.get('/del', (req, res) => {
    deleteData(req.query.id).then((respond) => res.send(respond))
})

// finding one doc from db and return it
app.get('/edit', (req, res) => {
    filter(req.query.id).then((respond) => {
        res.send(respond)
    })
})

// updating doc in db 
app.post('/upd', (req, res) => {
    updateData(req.body).then((respond)=>{
        res.send({message: 'success..'})
    })
})


// starting server
app.listen(PORT, () => {
    console.log(`listening on http://localhost:${PORT}`)
})