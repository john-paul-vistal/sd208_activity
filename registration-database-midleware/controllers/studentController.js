const jwt = require('jsonwebtoken')
const Student = require("../models/student.model");

const getLogin = (request, response) => {
    try {
        response.render("login", { error: "" })
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
};

const getRegistration = (request, response) => {
    try {
        response.render("registration")
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
};

const registerStudent = async(request, response) => {
    try {
        let student = new Student({
            firstname: request.body.firstname,
            lastname: request.body.lastname,
            email: request.body.email,
            password: request.body.password,
            phone: request.body.phone,
            address: request.body.address,
        })

        const result = await student.save()

        if (!result) {
            return response.status(400).json({
                error: "Error in adding new Admin!",
            });
        }

        response.redirect('/student.mis')

    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
};


const getProfile = async(request, response) => {
    try {
        const student = await Student.findOne({ _id: request.student.id })
        response.render("profile", { info: student })
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
};


const validateToken = (request, response, next) => {
    try {
        const authorizationHeader = request.cookies.authorization

        if (authorizationHeader === null) {
            response.status(401).redirect("/student.mis")
        } else {
            jwt.verify(authorizationHeader, process.env.ACCESS_TOKEN, (error, data) => {
                if (error) {
                    response.status(401).redirect("/student.mis")
                } else {
                    request.student = data
                    next()
                }
            })

        }
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
}


const loginValidation = async(request, response) => {
    try {
        let email = request.body.email;
        let password = request.body.password;

        const studentFound = await Student.findOne({ email: email, password: password });
        if (!studentFound || studentFound.length === 0) {
            response.render("login", { error: "Account Not Existed!" })
        } else {
            const student = {
                id: studentFound._id,
            }

            const accessToken = jwt.sign(student, process.env.ACCESS_TOKEN)
                //Save cookie to client side
            response.cookie('authorization', accessToken, { httpOnly: true });
            //Redirect
            response.redirect('/student.mis/profile')
        }
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
}

const logout = async(request, response) => {
    try {
        response.clearCookie('authorization')
        response.redirect('/student.mis')
    } catch (e) {
        return response.status(400).json({
            error: e,
        });
    }
};


module.exports = {
    getLogin,
    getRegistration,
    registerStudent,
    getProfile,
    validateToken,
    loginValidation,
    logout
};