function confirmModification() {
    if (confirm("Voulez-vous vraiment modifier vos informations ?")) {
      document.getElementById("formulaire").submit();
    }
  }

  document.getElementById("formsend").addEventListener("click", function(event) {
    event.preventDefault();
    confirmModification();
  });

