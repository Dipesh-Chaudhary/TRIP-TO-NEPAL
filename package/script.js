//finding elements by query selectors
let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');



window.onscroll = () =>{
    searchBtn.classList.remove('fa-times'); //to remove "X" logo of search button while scrolling
    searchBar.classList.remove('active');   //to remove search bar while scrolling
    menu.classList.remove('fa-times');      //to remove "X" logo of menu button while scrolling
    navbar.classList.remove('active');     
    loginForm.classList.remove('active');   //to remove login form container while scrolling
}

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');     //to show "X" logo while clicking  menu button
    navbar.classList.toggle('active');     //to make nav-bar active while clicking menu
});

searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times'); //to show "X" logo while clicking  search logo
    searchBar.classList.toggle('active');   //to make searchbar active while clicking menu
});

formBtn.addEventListener('click', () =>{  
    loginForm.classList.add('active');    //to show login form while clicking login/admin/form button
});

formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active'); //to close login form when clicking "X" logo
});




