jQuery(document).ready(function($) {
  //jQuery('.data').datepicker({ dateFormat: 'dd/mm/yy' });
  $(".hora").mask("99:99");

  $(function() {
    $( "#data_inicial, #data_final" ).datepicker({
      dateFormat: 'dd/mm/yy',
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onSelect: function( selectedDate ) {
          if(this.id == 'data_inicial'){
            var dateMin = $('#data_inicial').datepicker("getDate");
            var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 1);
            var rMax = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 90);
            $('#data_final').datepicker("option","minDate",rMin);
            $('#data_final').datepicker("option","maxDate",rMax);
          }

      }
    });
  });
});
