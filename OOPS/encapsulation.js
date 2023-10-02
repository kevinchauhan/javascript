class Student{
    static id = 0
    #name       // # is used to declare private member
    #roll 
    constructor(nam){
        this.#name = nam
        this.id = ++Student.id
    }
    set Data(n){
        this.#roll = n
    }
    get Data(){
        return this.#roll
    }
    static kai(){
        console.log("kai..")
    }
    static biju(){
        console.log("biju..")
    }
    static{
        console.log("hi...")
    }
}
class Fullstack extends Student{
    course
    constructor(c){
        super('he')
        this.course = c
    }
    
    
}

// const s1 = new Fullstack('niva')
// const s2 = new Fullstack('niva')
// const s3 = new Fullstack('niva')
// // s1.#name = 'k'
// s1.Data = 10
// console.log(s1,s2,s3)

Student.biju()
Student.kai()