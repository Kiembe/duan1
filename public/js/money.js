const VND = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
  });
  
  const money = document.querySelectorAll('.price')
  console.log(money);
  money.forEach((e,i) => {
    const price = e.textContent
    money[i].innerHTML = VND.format(price)
  })