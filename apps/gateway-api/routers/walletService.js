var express = require('express');
var router = express.Router()
const apiAdapter = require('./apiAdapter')

const BASE_URL = 'http://wallet.io'
const api = apiAdapter(BASE_URL)


router.get('/wallets/:mobile', (req, res) => {
    api.get(req.path).then(resp => {
        res.send(resp.data)
    })
})


module.exports = router