const mongoose = require('mongoose')

// connecting to db
mongoose.connect("mongodb://127.0.0.1:27017/user_data").then(() => {
    console.log("Connection is successfully....")
}).catch((err) => {
    console.log(err)
})

// structuring... 
const itemSchema = new mongoose.Schema({
    name: { type: String },
    email: { type: String },
    add: { type: String }
}, { versionKey: false });

// Create a model based on the schema
const users = mongoose.model('users', itemSchema);

// inserting data
function insertData(userData) {
    return new Promise((resolve, reject) => {
        const userOne = new users(userData)
        const result = userOne.save()
        resolve(result)
    })
}

// get all data
function getDocument() {
    return new Promise((resolve, reject) => {
        resolve(users.find())
    })
}

// deleting data
function deleteData(id) {
    return new Promise((resolve, reject) => {
        const result = users.deleteOne({ _id: id })
        resolve(result)
    })
}

// finding docs
function filter(id) {
    return new Promise((resolve, reject) => {
        const item = users.findById(id)
        resolve(item)
    })
}

// updating docs
function updateData(updatedData) {
    return new Promise((resolve, reject) => {
        const item = users.findByIdAndUpdate(updatedData.id,
            {
                name: updatedData.name,
                email: updatedData.email,
                add: updatedData.add
            }
        )
        resolve(item)
    })
}

module.exports = { getDocument, deleteData, insertData, filter, updateData }