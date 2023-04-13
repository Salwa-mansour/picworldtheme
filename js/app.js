// wait until DOM is ready
document.addEventListener("DOMContentLoaded", function(event){
  //wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener("load", function(e){
    // ------------------------------
     const topCategoryManu=document.getElementById('categories-navigation');
     const topCategoryManuOverlay=document.getElementById('menu-overlay');
     const topCategoryManuTogller=document.getElementById('nv1-toggler');
     const dropDowns=Array.from(document.querySelectorAll('.dropMenu'));
     const categoriesCircles =Array.from(document.querySelectorAll('.categories-list  li .img-box img'))
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
      rtl: true,
      touch:true,
      slideshow: false,//stop autosliding
     
});


   $('.single-flexslider').flexslider({
animation: "fade"
});


   
  })(jQuery)
 
    let catMenuTl=gsap.timeline({paused:true,onComplete: stylesReset});
function MenuToggler(){
  catMenuTl.to('#menu-overlay',{right:0})
            .to('#categories-navigation',{right:0})
            .to('.line',{background:'#fff'},'stamp')
            .to('.line2',{x:-50,autoAlpha:0},'stamp')
            .to('.line1',{y:10.5,rotation:45},'stamp')
            .to('.line3',{y:-10.5,rotation:-45},'stamp')

}
function stylesReset(){
  //gsap.set(catMenuTl.targets(), { clearProps: "all" });
  console.log('cleard')
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
MenuToggler()


topCategoryManuTogller.addEventListener("click",toggleMenu);



   window.addEventListener("resize", () => {
   
 
        catMenuTl.revert()
        document.body.style.overflow = 'scroll';
    })

topCategoryManuOverlay.addEventListener("click",toggleMenu)

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
 )



    // -------------------------------
  }, false);
  
});