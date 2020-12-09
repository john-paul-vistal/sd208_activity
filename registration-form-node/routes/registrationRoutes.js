const express = require("express");
const { request } = require("express");
const router = express.Router();

let studentProfile = []


router.get("/", (request, response) => {
    try {
        response.render('registration')
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
})

router.post("/register", (request, response) => {
    try {
        let info = {
            firstname: request.body.firstname,
            lastname: request.body.lastname,
            email: request.body.email,
            password: request.body.password,
            phone: request.body.phone,
            address: request.body.address
        }

        studentProfile.push(info)
        response.redirect('/student.mis/login')
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
})


router.get('/profile', (request, response) => {
    try {
        response.render('profile')
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
})

router.get('/login', (request, response) => {
    try {
        response.render('login', { error: "" })
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
})

router.post('/authenticate', (request, response) => {
    try {
        let email = request.body.email;
        let password = request.body.password;
        let result
        for (const data of studentProfile) {
            if (data.email == email && data.password == password) {
                result = data;
            }
        }
        if (result != undefined) {
            response.render('profile', { info: result })
        } else {
            response.render('login', { error: "Account Not Existed!Try again!" })
        }
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
})





module.exports = router;