

import '../css/style.css';
import '../css/flexslider-rtl.css';
import '../css/woocommerce.css';
import navigation from "./navigation";  
// wait until DOM is ready
document.addEventListener("DOMContentLoaded", function(event){
  //wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener("load", function(e){
    // ------------------------------
     const topCategoryManu=document.getElementById('categories-navigation');
     const topCategoryManuOverlay=document.getElementById('menu-overlay');
     const topCategoryManuTogller=document.getElementById('nv1-toggler');
     const dropDowns=Array.from(document.querySelectorAll('.dropMenu'));
     const categoriesCircles =Array.from(document.querySelectorAll('.categories-list  li .img-box img'));
     const filterBtn=document.getElementById('fillter-btn');
     const filterOverlay=document.getElementById('aside-overlay');
     console.log(filterBtn);
     var   mm=gsap.matchMedia()
   var screenWidth= window.innerWidth;
     var isOpen = false;
    // console.log(topCategoryManuTogller,topCategoryManuOverlay,topCategoryManu)

//   gsap.from(".box", {
//   scrollTrigger: {
//     trigger: ".box"
//   },
//   x: "10rem",
//   opacity: 0,
//   onComplete: function () {
//     gsap.set(this.targets(), { clearProps: "all" });
//   }
// });
//     ScrollTrigger.create({
//   trigger: elem,
//   onEnter: myEnterFunc,
//   onLeave: myLeaveFunc,
//   onEnterBack: myEnterFunc,
//   onLeaveBack: myLeaveFunc
// });
     //make arrow
      // .to('.line2',{x:100,autoAlpha:0})
      //       .to('.line1',{y:10.5,rotation:-45},'stamp')
      //       .to('.line3',{y:10.5,rotation:45},'stamp')
    //custom GSAP code goes here
    // This tween will rotate an element with a class of .custom-logo
    // let eyeTl=gsap.timeline({repeat:1.5,paused:true,onComplete: stylesReset});


         // -------------------------------
// main page slider 
  (function ($){
   $('.flexslider').flexslider({
      animation: "slide",
     
      touch:true,
     pauseOnAction:true,
     pauseOnHover:true,
});


   $('.single-flexslider').flexslider({
animation: "fade",
directionNav:false,
controlNav:false,
touch:true,
slideshowSpeed:3000,
});


$('.product-group1').flexslider({
animation: "slide",

itemWidth: 300,
itemMargin: 5,
directionNav:true,
controlNav:false,
selector:".product-group1-prodcuts >li",
// slideshow:false,
});

   
  })(jQuery)
 
    let catMenuTl=gsap.timeline({paused:true,onComplete: stylesReset});
    let filterTl=gsap.timeline({paused:true});
function MenuToggler(){
  catMenuTl.to('#menu-overlay',{right:0})
            .to('#categories-navigation',{right:0})
            .to('.line',{background:'#fff'},'stamp')
            .to('.line2',{x:-50,autoAlpha:0},'stamp')
            .to('.line1',{y:10.5,rotation:45},'stamp')
            .to('.line3',{y:-10.5,rotation:-45},'stamp')

}
MenuToggler()
function filtersToggler(){
  filterTl.to('#aside-overlay',{left:0})
         .to('#secondary',{left:0})
           

}
filtersToggler()
function stylesReset(){
  //gsap.set(catMenuTl.targets(), { clearProps: "all" });
 // console.log('cleard')
}
function toggleMenu() {
     isOpen = !isOpen;

        if (isOpen) {
            catMenuTl.restart()
            document.body.style.overflow = 'hidden';
        } else {
            catMenuTl.timeScale(3).reverse()
            //get red of inline styles
            setTimeout(() => { catMenuTl.revert();console.log('cleard') }, 500)
            
            document.body.style.overflow = 'scroll';
        }
}



topCategoryManuTogller.addEventListener("click",toggleMenu);

function toggleFiltersOn() {
     // isOpen = !isOpen;

     //    if (isOpen) {
            filterTl.restart()
            document.body.style.overflow = 'hidden';
        // } else {
        //     filterTl.timeScale(3).reverse()
        //     //get red of inline styles
        //     setTimeout(() => { filterTl.revert();console.log('cleard') }, 500)
            
        //     document.body.style.overflow = 'scroll';
        // }
}

function toggleFiltersOff(){
         filterTl.timeScale(3).reverse()
            //get red of inline styles
            setTimeout(() => { filterTl.revert();console.log('cleard') }, 500)
            
            document.body.style.overflow = 'scroll';
}
if (filterBtn!=null) {
  filterBtn.addEventListener("click",toggleFiltersOn);

  
}


   window.addEventListener("resize", () => {
   
 
        catMenuTl.revert()
        filterTl.revert()
        document.body.style.overflow = 'scroll';
    })

topCategoryManuOverlay.addEventListener("click",toggleMenu)
if (filterOverlay!=null) {
   filterOverlay.addEventListener("click",toggleFiltersOff) 
}


// dropDowns.forEach((item)=>
// {
     topCategoryManu.addEventListener('click',(e)=>{
        if(e.target.classList.contains('dashicons')){
           e.preventDefault()
        
        let   thisMenu =e.target.parentElement.parentElement.querySelector('ul');
    
         if(thisMenu.classList.contains(e.target.id)){
          //going around probgation
          topCategoryManu.querySelector(`.${e.target.id}`).classList.toggle('show-item');
        
         }
        
       
        }
       

      });

  


mm.add("(max-width:500px)", () => {
categoriesCircles.forEach(circle => {

  gsap.to(circle, { 
   
    scrollTrigger:{
        trigger:circle,
        start:"top 60%",
        end:"bottom 10%",
        toggleActions:'restart none restart none',
    //   markers:true,
        toggleClass:"circle-inview-position"
    }
  })
});


}
 );

let imgflip=document.querySelector('#img-flepper #img-container figure img');
if(imgflip!= null){
    gsap.to('#flip-after',{
    width:imgflip.clientWidth,
    durtation:.1,
    scrollTrigger:{
        trigger:'#img-flepper',
        toggleActions:'restart none restart none',
      //  markers:true,
        scrub:true,
       start:`top+=200 bottom`,
      end:"center center",
    }
})
}


// gsap.to('#flip-befor',{
//      width:0,
//      durtation:.1,
//     scrollTrigger:{
//         trigger:'#img-flepper',
//         toggleActions:'restart none restart none',
//        //  markers:true,
//         scrub:true,       
//        start:`top+=200 bottom`,
//       end:"center center",
//     }
// })



let addressLink=document.querySelector('.woocommerce-MyAccount-navigation-link--edit-address a')
if (addressLink!=null) {
if(addressLink.innerText==""){
    addressLink.innerText="العنوان"
}}

    // -------------------------------
  }, false);
  
});
