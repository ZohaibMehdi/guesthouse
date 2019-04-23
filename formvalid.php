<?php
require_once 'includes/header.php';
?>

<div class="container">
  <form action="" class="needs-validation" id="validForm">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" class="form-control"  required>

      <label for="city">City</label>
      <input type="text" id="city" placeholder="Provide City Name" class="form-control" value="hyd" required>
      <input type="date" class="form-control" id="guest-checkin" name="gIN" >
      <select name="gRoomNO" class="form-control" id="guest-room" required>
        <option value="">Select Room #</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
      <input type="text" class="form-control" id="guest-num" placeholder='Enter Your CNIC number' name="num" >

    </div>
  </form>
  <button class="btn btn-primary" id="submitForm">Submit form</button>
</div>

<script>


var btnForm = document.getElementById('submitForm');
//var fields = document.querySelectorAll('.needs-validation input');
var form = document.querySelector('.needs-validation');

btnForm.addEventListener('click', function(){
  if(form.checkValidity() === false) {
    let options = document.getElementById('guest-room');
    console.log(options.value);
    event.preventDefault();
    event.stopPropagation();
    form.classList.add('was-validated');
    console.log('Fill the required fields');
  }else{
    console.log('Required fields are ok');
    console.log(document.getElementById('guest-num').value)
  }
});

</script>



<?php
require_once 'includes/footer.php';
?>
