// Si les 2 inputs ne sont pas remplis, le bouton est désactivé, sinon il est activé
function enableButtonConnexion(input1, input2, button) {
    if (input1.value == "" || input2.value == "") {
      button.disabled = true;
      button.style.backgroundColor = 'grey';
    } else {
      button.disabled = false;
      button.style.backgroundColor = 'green';
    }
}

// Si les 2 inputs ne sont pas remplis, le bouton est désactivé, sinon il est activé
function enableButtonCreateTeam(input1, input2, button) {
    if (input1.value == "" && input2.value == "") {
        button.disabled = true;
        button.style.backgroundColor = 'grey';
    } else {
        button.disabled = false;
        button.style.backgroundColor = 'green';
    }
}
