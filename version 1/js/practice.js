// let data = [
//   {
//     country: 'China',
//     population: 1409517397,
//   },
//   {
//     country: 'India',
//     population: 1339180127,
//   },
//   {
//     country: 'USA',
//     population: 324459463,
//   },
//   {
//     country: 'Indonesia',
//     population: 263991379,
//   }
// ];
//
// let cities = [];
// for (var i = 0; i < data.length; i++){
//   if(data[i].population > 500000000){
//     cities.push(data[i]);
//   }
// }
//
// let cities = data.filter(val => {
//   return val.population > 500000000;
// });
//
// let cities = Array.prototype.filter.call(data, function(el){
//   if(el.population > 500000000){
//     return data;
//   }
// });
//
// console.log(cities);
//
// var form = document.querySelectorAll('.form-group input');
//
// var validation = Array.prototype.filter.call(form, function(formEL){
//
//   for(let i = 0; i < formEL.length; i++){
//     if(formEL[i].checkValidity() === false){
//       console.log(formEL[i]);
//       formEL[i].classList.add('is-invalid');
//     }
//
//     if(formEL[i].checkValidity() === true){
//       formEL[i].classList.add('is-valid');
//     }
//   }
//
// });




// for(let i = 0; i < form.length; i++){
//   if(form[i].hasAttribute('required')){
//     //console.log(form[i])
//     if(form[i].value == ''){
//       form[i].classList.add('is-invalid');
//       event.stopPropagation();
//       // prevent form submission
//     }else{
//       form[i].classList.add('is-valid');
//       // submit form
//     }
//   }
// }



// console.log(form[1].hasAttribute('required'))
// console.log(form.length)
