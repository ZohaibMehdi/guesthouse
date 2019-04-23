<html>
<head>
<!-- link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-

GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"

crossorigin="anonymous"></script -->
<style>
body {
	padding: 5em;
}

.valid-feedback, .valid-pattern-feedback, .feedback {
  display: none;
}
input:required:valid + .valid-feedback {
  display: block;
}
input:pattern:valid + .feedback > .valid-pattern {
  display: block;
}

</style>
</head>
<body>
<form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend"
          required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
        <div class="feedback">
        <div class="valid-required">
          Looks good!
        </div>
        <div class="valid-pattern">
          Pattern looks good!
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">City</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">State</label>
      <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Zip</label>
      <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
/*var form = document.querySelector('form');
form.addEventListener('submit', function(e) {
  if(!form.checkValidity()) {
    e.preventDefault();
    e.stopPropagation();
    form.reportValidity();
  }
});*/


/*
(function() {
  'use strict';
  window.addEventListener('load', function() {

    var fields = document.querySelectorAll('.needs-validation input');
    var form = document.querySelector('.needs-validation');
    var button = form.querySelector('button');
    var nfn = function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        if(!button.hasAttribute('disabled')) {
          button.setAttribute('disabled', true);
        }
      } else {
        if(button.hasAttribute('disabled')) {
          button.removeAttribute('disabled');
        }
      }
      form.classList.add('was-validated');
    };
    fields.forEach(function(field) {
      field.addEventListener('change', nfn, false);
    });

    form.addEventListener('submit', nfn, false);
  }, false);
})(); */
</script>
</body>
</html>
