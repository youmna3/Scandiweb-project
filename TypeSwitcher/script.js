//select item by id
//hide the non selected and show the only selected type output

function typeOutput() {
  //get the selected type
  let productType = document.getElementById("productType").value;
  //hide all the forms
  let hideForm = document.querySelectorAll(".book, .dvd, .furniture");
  for (let i = 0; i < hideForm.length; i++) {
    hideForm[i].style.display = "none";
  }
  //show the form based on selected type
  let showForm = document.querySelectorAll("." + productType);
  for (let i = 0; i < showForm.length; i++) {
    showForm[i].style.display = "block";
  }
}
typeOutput();
