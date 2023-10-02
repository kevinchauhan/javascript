// constructor function 
// it is used before oops concept was introduced
function BankAccount(name, balance=0) {
    this.name = name
    this.accNum = Date.now()
    this.bal = balance

    this.deposit = (amt) => {
        this.bal += amt
    }

    this.withdraw = (amt) => {
        this.bal -= amt
    }
}

const kevin = new BankAccount("kevin")
const niva = new BankAccount("niva",1000)
niva.deposit(500)
niva.withdraw(700)

console.log(kevin)
console.log(niva)