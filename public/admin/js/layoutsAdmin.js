

// add hover class to selected list item

let list=document.querySelectorAll('.navigation li');
function activeLink(){
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
    item.addEventListener('mouseover', activeLink));




// menu toggle
let tonggle=document.querySelector('.toggle');
let navigation=document.querySelector('.navigation');
let main=document.querySelector('.main');

tonggle.onclick=function(){
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}