const express = require("express");
const router = express.Router();

const StudentControllers = require("../controllers/studentController");

router.get("/", StudentControllers.getLogin);
router.get("/registration", StudentControllers.getRegistration);
router.post("/registration", StudentControllers.registerStudent);
router.post("/login", StudentControllers.loginValidation);
router.get("/profile", StudentControllers.validateToken, StudentControllers.getProfile);
router.get("/logout", StudentControllers.logout);

module.exports = router;