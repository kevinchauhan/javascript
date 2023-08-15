// function wait() {
//     let ms = 3000 + new Date().getTime()
//     while (new Date() < ms) { }
// }


function register() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log('register...')
            resolve('success...')
        }, 2000);
    })

}
function sendEmail(n) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (n > 2) return reject('Error')
            console.log('email send...')
            resolve()
        }, 3000);
    })

}
function login() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log('login...')
            resolve()
        }, 1000);
    })
}

//   METHOD - 1

// register(10)
//     .then(sendEmail)
//     .then(login)
//     .catch((err)=>{console.log(err)})



// METHOD - 2 - ASYNC AWAIT

// async function authenticate(){
//     await register()
//     await sendEmail()
//     await login()
// }
// authenticate().then(()=>{
//         console.log("Authentication done...")
//     }).catch((err)=>{console.log(err)})



// with try and catch block
async function authenticate() {
    try {
        const message = await register()
        await sendEmail()
        await login()
        console.log(message)
    } catch(err){
        console.log(err)
        throw new Error()
    }
}
authenticate().then(() => {
    console.log("Authentication done...")
}).catch((err)=>{console.log("throwed from catch block")})


console.log('other app works...')

