var express = require('express');
var router = express.Router()
const apiAdapter = require('./apiAdapter')

const BASE_URL = 'http://discount.io'
const api = apiAdapter(BASE_URL)



router.post('/campaigns/demand', (req, res) => {
    api.post(req.path, req.body).then(resp => {
        res.send(resp.data)
    })
})

router.get('/users-campaigns', (req, res) => {
    api.get(req.path).then(resp => {
        res.send(resp.data)
    })
})


module.exports = router