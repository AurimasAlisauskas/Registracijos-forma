$( document ).ready(function() {

    /**
 * Validate the contact form displayed with the [contact-form] shortcode.
 */
const contactFormSubmit = document.getElementById('contact-form-submit');
contactFormSubmit.addEventListener('click', validateForm);

function validateForm(event) {

  event.preventDefault();
  event.stopPropagation();

  //Full name
  const fullName = document.getElementById('full-name') !== null ?
      document.getElementById('full-name').value :
      '';

  //Email
  const email = document.getElementById('email') !== null ?
      document.getElementById('email').value :
      '';

  //Phone
  const phone = document.getElementById('phone') !== null ?
  document.getElementById('phone').value :
  '';
  
  //Datetime
  const datetime = document.getElementById('datetime') !== null ?
  document.getElementById('datetime').value :
  '';

  //Message
  const message = document.getElementById('message') !== null ?
      document.getElementById('message').value :
      '';

  const validationMessages = [];
  if (fullName.length === 0) {
    validationMessages.push('Įveskite vardą');
  }

  if (email.length === 0 || !emailIsValid(email)) {
    validationMessages.push('Įveskite El. pašto adresą');
  }

  if (phone.length === 0 ) {
    validationMessages.push('Įveskite telefono numerį');
  }

  if (datetime.length === 0 ) {
    validationMessages.push('Įveskite datą ir laiką');
  }

  if (message.length === 0) {
    validationMessages.push('Įveskite komentarą');
  }

  if (validationMessages.length === 0) {

    //Submit the form
    document.getElementById('contact-form').submit();

  } else {

    //Delete all the existing validation messages from the DOM
    const parent = document.getElementById('validation-messages-container');
    while (parent.firstChild) {
      parent.removeChild(parent.firstChild);
    }

    //Add the new validation messages to the DOM
    validationMessages.forEach(function(validationMessage, index) {

      //add message to the DOM
      const divElement = document.createElement('div');
      divElement.classList.add('validation-message');
      const node = document.createTextNode(validationMessage);
      divElement.appendChild(node);

      const element = document.getElementById('validation-messages-container');
      element.appendChild(divElement);

    });

  }

}

/**
 * A simple function that verify the email with a regular expression.
 *
 * @param email
 * @returns {boolean}
 */
function emailIsValid(email) {

  const regex = /\S+@\S+\.\S+/;
  return regex.test(email);

}

});