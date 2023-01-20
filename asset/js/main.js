function mostrarPass (pass, eyePass) {
    let inputPass = document.getElementById(pass);
    let icon = document.getElementById(eyePass);
    if (inputPass.type=="password" && icon.classList.contains("fa-eye")) {
        inputPass.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        inputPass.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
};


//alert("hola mundo! desde xampp3!!!");

