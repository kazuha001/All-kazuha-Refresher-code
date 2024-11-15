
//Library
var mysql = require('mysql2')

var express = require('express')

var bodyparse = require('body-parser')

var path = require('path')

var app = express()
var port = 3000 //Ports connect to 3000

//Localhost Tester
app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`)
})


if (app) {

//Make a connection in html file through localhost:3000
app.use(bodyparse.urlencoded({extended: true}))

app.use(bodyparse.json())

app.get('/', (req, res) => {

    res.sendFile(path.join(__dirname, 'index.html'))

})

//Database Connection
var connection = mysql.createConnection({

    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test'

})

//Process to Submit the Data using prepare statement
app.post('/submit', (req, res) => {

    const username = req.body.username

    var stmt = 'INSERT INTO sample (name) VALUES (?)'

    connection.execute(stmt, [username], (err, result) => {

    if (err) {
        console.error('Error')
    } else {
        console.log('Submited Succesfully')
    }

    res.send('Data Submitted Successfully')

})

})


} else {

    console.error('Not Connected')

}






