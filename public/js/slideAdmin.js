const nav = document.querySelectorAll('aside .nav li')


document.addEventListener("DOMContentLoaded", () => {
  var localStorageKey = 'selectedButton'
  nav.forEach((button, index) => {
    button.addEventListener('click', () => {
      localStorage.removeItem(localStorageKey)
      localStorage.setItem(localStorageKey, index)
      nav.forEach(function (btn) {
        btn.classList.remove('active')
      })
      button.classList.add('active')
    })
  })
  var selectedButtonIndex = localStorage.getItem(localStorageKey)

  if (selectedButtonIndex !== null) {
    nav[selectedButtonIndex].classList.add('active')
  }
})

const propertiesAct = document.querySelector('.propertiesAct')
const properties = document.querySelector('.properties')

document.addEventListener("DOMContentLoaded", () => {
  const menuState = false
  propertiesAct.addEventListener('click', function () {
    const isMenuOpen = properties.classList.toggle('active')
    localStorage.setItem(menuState, isMenuOpen ? 'active' : 'closed')
  })
  const savedMenuState = localStorage.getItem(menuState)

  if (savedMenuState === 'active') {
    properties.classList.add('active')
    propertiesAct.classList.add('active')
  }
})