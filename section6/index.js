//1
let name = "phi";

//2
function sayHello($name) {
    return "Hello " + $name;
}
//3
let arr = [1, 2, 3];
function loop ($arr) {
    for (let i = 0; i < $arr.length; i++) {
        console.log($arr[i]);
    }
}

//4
var user = {
    name: "John",
    age: 30
};

var userName = user.name;
var userAge = user.age;

console.log("Tên người dùng: " + userName);
console.log("Tuổi người dùng: " + userAge);