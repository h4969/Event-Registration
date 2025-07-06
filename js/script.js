document.getElementById("registerForm").addEventListener("submit", function (e) {
  const phone = document.querySelector("input[name='phone']").value;
  if (!/^\d{10}$/.test(phone)) {
    alert("Phone number must be 10 digits.");
    e.preventDefault();
  }
});
