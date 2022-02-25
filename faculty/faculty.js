const left = document.querySelector(".left");
const right = document.querySelector(".right");
const container = document.querySelector(".container");

left.addEventListener("mouseenter", () => {
  container.classList.add("hover-left");
});

left.addEventListener("mouseleave", () => {
  container.classList.remove("hover-left");
});

right.addEventListener("mouseenter", () => {
  container.classList.add("hover-right");
});

right.addEventListener("mouseleave", () => {
  container.classList.remove("hover-right");
});



/*8hgjggjh8*/
const left1 = document.querySelector(".left1");
const right1 = document.querySelector(".right1");
const container1 = document.querySelector(".container1");

left1.addEventListener("mouseenter", () => {
  container1.classList.add("hover-left1");
});

left1.addEventListener("mouseleave", () => {
  container1.classList.remove("hover-left1");
});

right1.addEventListener("mouseenter", () => {
  container1.classList.add("hover-right1");
});

right1.addEventListener("mouseleave", () => {
  container1.classList.remove("hover-right1");
});
/*ghfhhfjhfjm*/
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
/*jhjhfgj8*/
const left11 = document.querySelector(".left11");
const right11 = document.querySelector(".right11");
const container11 = document.querySelector(".container11");

left11.addEventListener("mouseenter", () => {
  container11.classList.add("hover-left11");
});

left11.addEventListener("mouseleave", () => {
  container1.classList.remove("hover-left11");
});

right11.addEventListener("mouseenter", () => {
  container11.classList.add("hover-right11");
});

right11.addEventListener("mouseleave", () => {
  container11.classList.remove("hover-right11");
});