var RegistrationVarrantyValidator = {


  init: function () {

    this.registerEvents();
  },

  registerEvents: function () {


    $('#warrantyFormSubmit').on('click', function (ev) {
      ev.preventDefault();

      var purchaseDate = new Date($('#warrantyForm input[name=purchase_date]').val());
      var activationDate = new Date($('#warrantyForm input[name=activation_date]').val());
      if(activationDate.getTime() < purchaseDate.getTime()){
        $('#validationError').html('Please select correct activation date.');
        return;
      }

      var isFormValid = $('#warrantyForm').imFormValidator({
        showError: function (elem, msg) {

          $(elem).addClass('error-input');


        }, hideError: function (elem, msg) {
          $(elem).removeClass('error-input');
        }
      });
      if(!isFormValid){
        return;
      }
      $('#warrantyForm').submit();
    })
  }


}
