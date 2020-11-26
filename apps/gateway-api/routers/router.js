var express = require('express');
var router = express.Router()
var walletService = require('./walletService')
var discountService = require('./discountService')

router.use((req, res, next) => {
    console.log("Called: ", req.path)
    next()
})

router.use(walletService)
router.use(discountService)

module.exports = router