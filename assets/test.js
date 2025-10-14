let arr=[];
arr[0]="Un";
arr[1]=2;
arr[2]=3.14;
for(let i=0; i<arr.length; i++){
    console.log(arr[i]);
}
arr.forEach(function(nb){
    console.log('nb: '+nb);
})
arr.forEach(nb=>console.log('nb: '+nb));
for(let computer=0; computer<5; computer++){
    console.log('computer: '+computer);
}


let arr1=[5];
let arr2=Array(5);
let arr3=Array(5.2);
let arr4=Array.of(5);
console.log(arr1);
console.log(arr2);
console.log(arr3);
console.log(arr4);

console.log(arr);
console.log(arr[0]);
console.log(arr["length"]);
arr.length=0;
console.log(arr);
arr.length=3;
console.log(arr);


let a=function(){
    alert('Hello');
}