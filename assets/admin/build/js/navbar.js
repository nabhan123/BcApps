const checkbox = document.getElementById("checkbox");

checkbox.addEventListener("change", () => {
  // change tema website
  document.body.classList.toggle("dark");
});
