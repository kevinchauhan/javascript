class Student{
    name 
    constructor(name){
        this.name = name
    }
    getData(){
        return this.name
    }
}
class Fullstack extends Student{
    course
    constructor(c){
        super('he')
        this.course = c
    }
    greet(){
        return this.name + ' ' + this.course
    }
}

const s1 = new Fullstack('niva')
// s1.name = 'k'
console.log(s1.greet())