const left = document.querySelector('.left');

const right = document.querySelector('.right');

const container = document.querySelector('.container');

var more = document.querySelectorAll("a");

var credits1=document.querySelector(".image1");
var credits2=document.querySelector(".image2");
// var t1=document.createTextNode("-Photo by Johann from Pexels");
// var t2=document.createTextNode("-Photo by Kelvin Valerio from Pexels");

left.addEventListener('mouseenter', () => {
container.classList.add('hover-left');

});

left.addEventListener('mouseleave', () => {
container.classList.remove('hover-left');

});

right.addEventListener('mouseenter', () => {
container.classList.add('hover-right');

});

right.addEventListener('mouseleave', () => {
container.classList.remove('hover-right');

});

// for(var i=0; i<more.length; i++){
// 	more[i].addEventListener("click",function(){
// 		console.log(i);
// 		if(){
// 			credits1.appendChild(t1);
// 		}
// 		else{
// 			credits2.appendChild(t2);
// 		}
// 	})
// }
more[0].addEventListener("click",function(){credits1.appendChild(t1);})

more[1].addEventListener("click",function(){credits2.appendChild(t2);})
// Photo by Johann from Pexels.jpg
// Photo by Kelvin Valerio from Pexels.jpg