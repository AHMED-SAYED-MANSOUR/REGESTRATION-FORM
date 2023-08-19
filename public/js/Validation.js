function Checkname(name){
    const a = ( /\d/.test(name.value) );
    if(a === true)
    {
       // window.alert("name or Full name contain numbers");
       //errorMessage("name or Full name contain numbers");
       errorMessage("Full name contains numbers",a,"error1","red");
    }

  }
  function errorMessage(msg,a,DocId,color) {
    var error = document.getElementById(DocId)
    if (a === true )
    {
        error.textContent = msg
        error.style.color = color
    } 
    else {
        error.textContent = ""
    }
}
function containsSpecialChars(str) {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    return specialChars.test(str);
  }
function passwordValid(){
    const password = document.getElementById("password");
    const confirmpassword = document.getElementById("confirmpassword");
    
    if(password.value===""||password.value===null ) {
        errorMessage("Please write password in password field",true,"error3","red")
    }
    else{
        errorMessage("Done :))",true,"error3","green")
    }
    if(confirmpassword.value === "" || confirmpassword.value === null){
        errorMessage("Please write password in confirm password field ",true,"error4","red")

    }else{
        errorMessage("Done :))",true,"error4","green")
    }

    if(password.value != confirmpassword.value){
        errorMessage("Two passwords does not match",true,"error5","red")

    }
    else {
//&& ( /\d/.test(password.value) )
        if(  (password.value.length >=8)    && containsSpecialChars(password.value) ){
            
            errorMessage("Two passwords matched ",true,"error5","green")
            
        }   
        else{
            
            errorMessage("please try to enhance ur password by add special characters and numbers and make its length greater than 8",true,"error5","red")
        }
    }


}
function validation() {
    //var date = new Date(document.getElementById("date").value);
  
    const name = document.getElementById("fname");
    const Fullname = document.getElementById("FullName");
    const email = document.getElementById("E-mail");    
    const phonenum = document.getElementById("Phone");
    const address = document.getElementById("Address");
    const Bdate = document.getElementById("Birthday");

  
    let messages = [];
  
    if (name.value === "" || name.value === null) {
      errorMessage("User Name is empty ",true,"error","red")
    }
    else{
        errorMessage("Done :))",true,"error","green")


    }
  
    if (Fullname.value === "" || Fullname.value === null) {
      errorMessage("Full Name is required",true,"error1","red")
    }
    else{
        errorMessage("Done :))",true,"error1","green")

    }
    if (email.value === "" || email.value === null || !email.value.match("@")) {
      errorMessage("Email is required",true,"error2","red")
    }
    else{
        errorMessage("Done :))",true,"error2","green")
    }
    if (Bdate.value === "" || Bdate.value === null ) {
        errorMessage("Birthday is required",true,"error8","red")
      }
      else{
          errorMessage("Done :))",true,"error8","green")
      }
  
    if (address.value === "" || address.value === null) {
      errorMessage("Address is required",true,"error7","red")
    }
    else{
        errorMessage("Done :))",true,"error7","green")
    }
  
    if (phonenum.value === "" || phonenum.value === null) {
      errorMessage("Please enter your telephone number.",true,"error6","red")
    }
    else{
        errorMessage("Done :))",true,"error6","green")
    }
    // if (password.value === "" || password.value === null) {
    //     errorMessage("password is required",true,"error3","red")
    // }
    // else{
    //     errorMessage("Done :))",true,"error3","green")
    // }
    // if ( confirmpassword.value === "" || confirmpassword.value === null )  {
    //     errorMessage("Confirm password is required",true,"error4","red")
    // }
    // else{
    //     errorMessage("Done :))",true,"error4","green")

    // }
  
    
    
  
    form.addEventListener("submit", (e) => {
      if (messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join(", ");
      }
    });
  }
  