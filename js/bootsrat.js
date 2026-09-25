let navbar = document.getElementById('head');
let navlink1 = document.getElementById('linkmenu1');
let navlink2 = document.getElementById('linkmenu2');
let navlink3 = document.getElementById('linkmenu3');
let navlink4 = document.getElementById('linkmenu4');
let navlink5 = document.getElementById('linkmenu5');
let navlink6 = document.getElementById('linkmenu6');
let navlink7 = document.getElementById('linkmenu7');
let navlink8 = document.getElementById('linkmenu8');
let navlink9 = document.getElementById('linkmenu9');
let mail = document.getElementById('mail');
let phone = document.getElementById('phone');


let scrollposition  = 0;
window.addEventListener('scroll', function(){
   
    if ((document.body.getBoundingClientRect()).top < scrollposition ){
        console.log('aqui');
        navbar.classList.remove('navmenu');
        navbar.classList.add('navmenuwhite');
        navlink1.classList.remove('nav-link');
        navlink1.classList.add('nav-linkwhite');
        navlink2.classList.add('nav-linkwhite');
        navlink2.classList.remove('nav-link');
        navlink3.classList.add('nav-linkwhite');
        navlink3.classList.remove('nav-link');
        navlink4.classList.add('nav-linkwhite');
        navlink4.classList.remove('nav-link');
        navlink5.classList.add('nav-linkwhite');
        navlink5.classList.remove('nav-link');
        navlink6.classList.add('nav-linkwhite');
        navlink6.classList.remove('nav-link');
        navlink7.classList.add('nav-linkwhite');
        navlink7.classList.remove('nav-link');
        navlink8.classList.add('nav-linkwhite');
        navlink8.classList.remove('nav-link');
 	navlink9.classList.add('nav-linkwhite');
        navlink9.classList.remove('nav-link');
        phone.classList.remove('datahead');
        phone.classList.add('dataheadwhite');
        mail.classList.remove('datahead');
        mail.classList.add('dataheadwhite');
       
    }else{
        

        navbar.classList.add('navmenu');
        navbar.classList.remove('navmenuwhite');
        navlink1.classList.remove('nav-linkwhite');
        navlink1.classList.add('nav-link');
        navlink3.classList.remove('nav-linkwhite');
        navlink3.classList.add('nav-link');
        navlink2.classList.remove('nav-linkwhite');
        navlink2.classList.add('nav-link');
        navlink4.classList.remove('nav-linkwhite');
        navlink4.classList.add('nav-link');
        navlink5.classList.remove('nav-linkwhite');
        navlink5.classList.add('nav-link');
        navlink6.classList.remove('nav-linkwhite');
        navlink6.classList.add('nav-link');
        navlink7.classList.remove('nav-linkwhite');
        navlink7.classList.add('nav-link');
        navlink8.classList.remove('nav-linkwhite');
        navlink8.classList.add('nav-link');
 	navlink9.classList.remove('nav-linkwhite');
        navlink9.classList.add('nav-link');
        phone.classList.remove('dataheadwhite');
        phone.classList.add('datahead');
        mail.classList.remove('dataheadwhite');
        mail.classList.add('datahead');
       
        
    }
   // scrollposition = (document.body.getBoundingClientRect()).top;

    
});

