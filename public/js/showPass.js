const input = document.querySelectorAll('.pass')
const show = document.querySelectorAll('.fa-eye-slash')

show.forEach((e,i) => {
    e.onclick = () => {
        if(input[i].type == "password"){
            input[i].type = "text"
        }else{
            input[i].type = "password"
        }
    }
})