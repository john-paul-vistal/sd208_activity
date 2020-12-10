const mongoose = require('mongoose');

const studentSchema = mongoose.Schema({
    firstname: { type: String, required: true },
    lastname: { type: String, required: true },
    email: { type: String, required: true },
    password: { type: String, required: true },
    address: { type: String, required: true },
    phone: { type: Number, required: true }
})

module.exports = mongoose.model('Student', studentSchema, 'student');