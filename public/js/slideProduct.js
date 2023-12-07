"use strict";

productScroll();

function productScroll() {
  let slider = document.getElementById("slider");
  let next = document.getElementsByClassName("pro-next");
  let prev = document.getElementsByClassName("pro-prev");
  let slide = document.getElementById("slide");
  let item = document.getElementById("slide");

  

  for (let i = 0; i < next.length; i++) {
    //refer elements by class name

    let position = 0; //slider postion

    // next[i].onclick = () => {
    //   console.log(slider.clientWidth);
    // }

    prev[i].addEventListener("click", function() {
      //click previos button
      if (position > 0) {
        //avoid slide left beyond the first item
        position -= 1;
        translateX(position); //translate items
        if(position <= 0){
          prev[i].classList.remove('active')
        }
      }
    });

    next[i].addEventListener("click", function() {
      if (position >= 0 && position < hiddenItems()) {
        //avoid slide right beyond the last item
        position += 1;
        translateX(position); //translate items
        prev[i].classList.add('active')
      }

    });
  }

  function hiddenItems() {
    //get hidden items
    let items = getCount(item, false);
    let visibleItems = slider.offsetWidth / 210;
    return items - Math.ceil(visibleItems);
  }
}

function translateX(position) {
  //translate items
  slide.style.left = position * -210 + "px";
}

function getCount(parent, getChildrensChildren) {
  //count no of items
  let relevantChildren = 0;
  let children = parent.childNodes.length;
  for (let i = 0; i < children; i++) {
    if (parent.childNodes[i].nodeType != 3) {
      if (getChildrensChildren)
        relevantChildren += getCount(parent.childNodes[i], true);
      relevantChildren++;
    }
  }
  return relevantChildren;
}

// 

const searchBtn = document.querySelector('.searchBtn')
const searchBoard = document.querySelector('.search')

searchBtn.onclick = () => {
  searchBoard.classList.toggle('active')
}

window.onscroll = () => {
  searchBoard.classList.remove('active')
}

const userBtn = document.querySelector('.userName')
const subUser = document.querySelector('.subAcc')

userBtn.onclick = () => {
  subUser.classList.toggle('active')
  userBtn.classList.toggle('active')
}

