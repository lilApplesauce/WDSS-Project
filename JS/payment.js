
    document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll(".payment-method-buttons button");

    for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {
    // Unselect all buttons
    for (var j = 0; j < buttons.length; j++) {
    buttons[j].classList.remove("selected");
}
    // Select the clicked button
    this.classList.add("selected");
});
}

    var form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
    var selectedButton = document.querySelector(".payment-method-buttons button.selected");
    if (!selectedButton) {
    alert("Please select a payment method.");
    event.preventDefault(); // Prevent form submission if no button is selected
}
});
});
