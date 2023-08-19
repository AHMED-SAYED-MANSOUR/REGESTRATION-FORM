window.addEventListener("scroll",function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky",window.scrollY > 0)
})
function reveal(){
    var transitions=document.querySelectorAll(".transition");
    for (var i=0;i<transitions.length;i++){
        var windowHeight=window.innerHeight;
        var elementTop=transitions[i].getBoundingClientRect().top;
        var elementVisible=300;
        if(elementTop<windowHeight-elementVisible){
            transitions[i].classList.add("active");
        }
        // else {
        //     transitions[i].classList.remove("active");
        // }
    }
}
window.addEventListener("scroll",reveal);


 
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  
  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
  }
  

