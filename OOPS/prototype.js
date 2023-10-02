// constructor function
function BankAccount(name, balance=0) {
    this.name = name
    this.accNum = Date.now()
    this.bal = balance

    // no need to write here just create prototype
    // this.deposit = (amt) => {
    //     this.bal += amt
    // }

    // this.withdraw = (amt) => {
    //     this.bal -= amt
    // }
}
BankAccount.prototype.deposit = function(amt){this.bal += amt}
BankAccount.prototype.withdraw = function(amt){this.bal -= amt}
console.log(BankAccount.prototype)

const kevin = new BankAccount("kevin")
const niva = new BankAccount("niva",1000)
niva.deposit(500)
niva.withdraw(700)

console.log(kevin)
console.log(niva)