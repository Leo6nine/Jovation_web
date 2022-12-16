const menu_btn = document.querySelector('.hamburger');
const mobile_menu = document.querySelector('.mobile-nav');
const mobileList = document.querySelectorAll('.mobile-list')

menu_btn.addEventListener('click', function (){
    menu_btn.classList.toggle('is-active');
    mobile_menu.classList.toggle('is-active');
    
});
mobileList.forEach((btn)=>{

    btn.addEventListener('click',function(){
        if(mobile_menu.classList.contains("is-active")){
            mobile_menu.classList.remove('is-active')
            menu_btn.classList.toggle('is-active')
        }else{
            
        }
    })
})
const navbar = document.querySelector('.nav');
window.onscroll = () => {
    if (window.scrollY > 300) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active');
    }
};


// let nav = document.getElementById("nav");
// let sticky = nav.offsetTop;
// window.onscroll = function() {sticker()};
// function sticker() {
//    if (window.pageYOffset >= sticky) {
//       nav.classList.add("sticky")
//    } else if (window.pageYOffset <= sticky) {
//       nav.classList.remove("sticky");
//    }
// }