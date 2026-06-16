//window.onbeforeunload = function () {
   // window.scrollTo(0, 0);
//};
//
//window.addEventListener("load", function () {
 //   window.scrollTo({
     //   top: 0,
   //     left: 0,
       // behavior: "instant"
    //});
//});// =========================
// Navbar Scroll Effect

window.addEventListener("scroll", function(){

    const navbar = document.querySelector(".custom-navbar");

    navbar.classList.toggle("scrolled", window.scrollY > 50);

});
// =========================
// PREMIUM LOADER
// =========================

window.addEventListener("load", () => {

    const loader =
    document.getElementById("preloader");

    setTimeout(() => {

        loader.style.opacity = "0";

        loader.style.visibility = "hidden";

        loader.style.transition =
        "all 0.8s ease";

    }, 800);

});


// =========================
// COUNTER ANIMATION
// =========================

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {

    counter.innerText = '0';

    const updateCounter = () => {

        const target = +counter.getAttribute('data-target');

        const current = +counter.innerText;

        const increment = target / 80;

        if(current < target){

            counter.innerText = `${Math.ceil(current + increment)}`;

            requestAnimationFrame(updateCounter);

        }else{

            counter.innerText = target + '+';

        }

    };

    updateCounter();

});
// =========================
// SCROLL PROGRESS BAR
// =========================

const scrollBar =
document.getElementById('scrollBar');

if(scrollBar){

window.addEventListener('scroll', () => {

    requestAnimationFrame(() => {

        const scrollTop =
        document.documentElement.scrollTop;

        const scrollHeight =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;

        const scrollPercent =
        (scrollTop / scrollHeight) * 100;

        scrollBar.style.width =
        scrollPercent + '%';

    });

});

}
// =========================
// CUSTOM CURSOR
// =========================

if(window.innerWidth > 991){

const cursor =
document.querySelector('.custom-cursor');

const cursorDot =
document.querySelector('.custom-cursor-dot');

if(cursor && cursorDot){

document.addEventListener('mousemove', e => {

    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';

    cursorDot.style.left = e.clientX + 'px';
    cursorDot.style.top = e.clientY + 'px';

});

}

}
// =========================
// MOBILE MENU ACTIVE
// =========================


document.addEventListener("DOMContentLoaded", function(){

    const dropdown =
    document.querySelector(".premium-nav-dropdown");

    const toggle =
    document.querySelector(".premium-dropdown-toggle");

    if(toggle && dropdown){

        toggle.addEventListener("click", function(e){

            if(window.innerWidth <= 991){

                e.preventDefault();

                dropdown.classList.toggle("active");

            }

        });

    }

});