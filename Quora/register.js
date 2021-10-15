/*Register Page*/
var reg_disp = document.querySelector(".register-popup");
var pass_disp = document.querySelector(".pass-popup");
var reg_btn = document.getElementById("register");
var close = document.querySelector(".close");
var close_p = document.querySelector(".close-p");
var new_name = document.querySelector("#new-name");
var new_email = document.querySelector('#new-email');
var email_error = document.querySelector('.email-error');
var name_error = document.querySelector('.name-error');
var pass_error = document.querySelector('.pass-error');
var reg_next = document.querySelector('#reg-next');
var new_pass = document.querySelector('#new-pass');
var std_mail_form = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/
var std_name_form = /[a-zA-Z]{3,}/;
var std_pass_form = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/


reg_btn.addEventListener("click", function(){
  reg_disp.style.display = "flex";
  new_name.focus();
})

close.addEventListener("click", function(){
  reg_disp.style.display = "none";
})

close_p.addEventListener("click", function(){
  pass_disp.style.display = "none";
})

window.onclick = function(event) {
  if (event.target == reg_disp) {
    reg_disp.style.display = "none";
    name_error.style.display = "none";
    new_name.style.border = "1px solid #dee0e1";
    email_error.style.display = "none";
    new_email.style.border = "1px solid #dee0e1";
    name_error.innerHTML = "";
    email_error.innerHTML = "";
    new_name.value = "";
    new_email.value = "";
    new_pass.value = "";
  }
}

new_name.addEventListener("change", function(){
  if(!new_name.value.match(std_name_form)){
    name_error.style.display = "flex";
    name_error.innerHTML = " Please use your full name.";
    new_name.style.border = "1px solid red";
  }
  else{
    name_error.style.display = "none";
    new_name.style.border = "1px solid #dee0e1";
    name_error.innerHTML = "";
  }
})

new_email.addEventListener("change", function(){
  if(!new_email.value.match(std_mail_form)){
    email_error.style.display = "flex";
    new_email.style.border = "1px solid red";
    email_error.innerHTML = "The email address you entered is not valid.";
  }
  else{
    email_error.style.display = "none";
    new_email.style.border = "1px solid #dee0e1";
    email_error.innerHTML = "";
  }
})

new_pass.addEventListener("change", function(){
  if(!new_pass.value.match(std_pass_form)){
    if(new_pass.value.length < 8){
      pass_error.style.display = "flex";
      new_pass.style.border = "1px solid red";
      pass_error.innerHTML = "Please use a password at least 8 characters long."
    }
    else{
      pass_error.style.display = "flex";
      new_pass.style.border = "1px solid red";
      pass_error.innerHTML = "Please use a password with at least one lower case letter, upper case letter and digit."
    }
  }
  else{
    pass_error.style.display = "none";
    new_pass.style.border = "1px solid #dee0e1";
  }
})

reg_next.addEventListener("click", function(){
  let flag = true;
  if (new_name.value.length == ""){
    name_error.innerHTML = "Please enter your name."
    name_error.style.display = "flex";
    new_name.style.border = "1px solid red";
    flag = false;
  }
  else{
    name_error.style.display = "none";
    new_name.style.border = "1px solid #dee0e1";
  }
  if (new_email.value.length == ""){
    email_error.innerHTML = "Please enter your email."
    email_error.style.display = "flex";
    new_email.style.border = "1px solid red";
    flag = false;
  }
  else{
    email_error.style.display = "none";
    new_email.style.border = "1px solid #dee0e1";
  }
  if (flag){
    pass_disp.style.display = "flex";
    reg_disp.style.display = "none";
  }
})


/*Auto focus*/
var log_email = document.querySelector("#email").focus();



/*No account found for this email. Retry, or Sign up for Quora.*/