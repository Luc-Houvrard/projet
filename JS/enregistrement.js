

const password1 = document.getElementById("pwd")
const password2 = document.getElementById("pwd2")
const error = document.getElementById("error")

password1.addEventListener('input', function() {
    if (password1.value === password2.value) {
        error.classList.remove("text-danger")
        error.classList.add("text-success")
        error.textContent = "Vos mots de passe sont corrects"  
      }else{
          if (password1.value === "" || password2.value === "") {
            error.classList.remove("text-success")
            error.classList.add("text-danger")
              error.textContent = "L'un des champs de mot de passe est vide"
          }else{
            error.classList.remove("text-success")
            error.classList.add("text-danger")
              error.textContent = "Vos mots de passe ne sont pas similaires"
          }
      }})

password2.addEventListener('input', function() {
    if (password1.value === password2.value) {
        error.classList.remove("text-danger")
        error.classList.add("text-success")
      error.textContent = "Vos mots de passe sont corrects"
    }else{
        if (password1.value === "" || password2.value === "") {
            error.classList.remove("text-success")
            error.classList.add("text-danger")
            error.textContent = "L'un des champs de mot de passe est vide"
        }else{
            error.classList.remove("text-success")
            error.classList.add("text-danger")
            error.textContent = "Vos mots de passe ne sont pas similaires"
        }
    }})


    