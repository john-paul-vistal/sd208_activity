const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const port = 8500

const ElectionSystemAdminRoutes = require("./routes/registrationRoutes");

app.use(bodyParser.urlencoded({ extended: true }))

app.use('/public', express.static('public'));

app.use(bodyParser.json())
app.set("view engine", "ejs");


app.use("/student.mis", ElectionSystemAdminRoutes);


app.listen(port, () => {
    console.log(`Server listening on port ${port}!`);
});