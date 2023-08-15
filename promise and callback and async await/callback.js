function wait(){
    let ms = 3000 + new Date().getTime()
    while(new Date()<ms){}
}

function register(callback){
    setTimeout(() => {
        console.log('register...')
        callback()
    }, 2000);
}
function sendEmail(){
    setTimeout(() => {
        console.log('email send...')
    }, 1000);
}
function login(){
    setTimeout(() => {
        console.log('login...')
    }, 1000);
}

register(function(params) {
    sendEmail()
    login()
}) 
console.log('other app works...')