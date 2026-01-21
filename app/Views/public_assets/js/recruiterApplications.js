let currentApplicant = "";

function acceptApplication(name) {
  alert(`Application accepted for ${name}!`);
}

function openRefuseModal(name) {
  currentApplicant = name;
  document.getElementById("refuseModal").classList.add("active");
  document.getElementById("refuseReason").value = "";
}

function closeRefuseModal() {
  document.getElementById("refuseModal").classList.remove("active");
  currentApplicant = "";
}

function submitRefusal() {
  const reason = document.getElementById("refuseReason").value.trim();

  if (reason === "") {
    alert("Please provide a reason for refusal.");
    return;
  }

  alert(`Application refused for ${currentApplicant}.\nReason: ${reason}`);
  closeRefuseModal();
}

// Close modal when clicking outside of it
document.getElementById("refuseModal").addEventListener("click", function (e) {
  if (e.target === this) {
    closeRefuseModal();
  }
});
