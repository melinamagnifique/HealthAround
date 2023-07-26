   // Écouteur d'événement pour mettre à jour les valeurs du seuil en temps réel
   var rangeInputs = document.querySelectorAll('input[type="range"]');
   rangeInputs.forEach(function(input) {
     var output = document.createElement('span');
     output.textContent = input.value;
     input.addEventListener('input', function() {
       output.textContent = input.value;
     });
     input.parentNode.appendChild(output);
   });