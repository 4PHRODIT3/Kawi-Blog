let passwords = document.querySelectorAll(".show-password");
passwords.forEach((element) => {
  element.addEventListener("click", function (event) {
    let password_input = event.target.previousElementSibling;
    if (password_input.type == "password") {
      password_input.type = "text";
    } else {
      password_input.type = "password";
    }
  });
});
