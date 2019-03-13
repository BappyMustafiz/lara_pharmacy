// show modal
$('body').on('click','.modal-show', function(event){
   
   event.preventDefault();

   var me  = $(this),
       url = me.attr('href'),
       title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('d-none');
    $('#modal-btn-save').text(me.hasClass('edit')? 'Update': 'Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response){
            $('#modal-body').html(response);
        }
    });

    $('#large-Modal').modal('show');   

});

// add customer
$('#modal-btn-save').click(function(event){
  event.preventDefault();

  var form = $('#modal-body form'),
      url  = form.attr('action'),
      method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

      form.find('.help-block').remove();
      form.find('.form-group').removeClass('text-danger');

  $.ajax({
    url : url,
    method:method,
    data : form.serialize(),
    success: function(response){
        form.trigger('reset');
        $('#large-Modal').modal('hide');
        $('#customerTable').DataTable().ajax.reload();

        swal({
          type : 'success',
          title : 'Success!',
          text : 'Data saved'
        });
    },
    error: function(xhr){
      var res = xhr.responseJSON;
      if($.isEmptyObject(res) == false){
        $.each(res.errors, function (key, value){
          $('#' + key)
                .closest('.form-group')
                .addClass('text-danger')
                .append('<span class="help-block"><strong>'+ value +'</strong></span>') 
        });
      }
    }
  });    
});



// single view
$('body').on('click','.view_customer', function(event){
    event.preventDefault();

   var me  = $(this),
       url = me.attr('href'),
       title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('d-none');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response){
            $('#modal-body').html(response);
        }
    });

    $('#large-Modal').modal('show');
});

// delete customer
$(document).on('click', ".delete-customer", function(event){
    event.preventDefault();

    var id = $(this).attr('rel');
    var deleteFunction = $(this).attr('rel1');

    swal({
        title: "Are you sure?",
        text: "Not delete data just inactive status",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes, do it!",
        cancelButtonText: "No, cancel it!",
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger",
        buttonStyling: false,
        reverseButtons: true
    },
    function(){
      $.ajax({
        url:deleteFunction+"/"+id,
        success: function(response){
            $('#customerTable').DataTable().ajax.reload();

            swal({
              type : 'success',
              title : 'Success!',
              text : 'Customer inactivate successfully'
            });
          },
          error: function(xhr){
              swal({
              type : 'error',
              title : 'Oops...',
              text : 'Something went wrong!'
            });
          }
      });
    });
});


// show modal for medicine quick add
$('body').on('click','.add-medicine', function(event){

    event.preventDefault();

    var me  = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('d-none');
    $('#modal-btn-save').text('Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response){
            $('#modal-body').html(response);
        }
    });

    $('#large-Modal').modal('show');

});

//print invoice

var el = document.getElementById("printInvoice");
if(el){
    el.addEventListener("click", function() {
        var printContents = document.getElementById('printDiv').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
}


// autocomplete for POS
// $(document).ready(function(){
//   $('#medicine_title').keyup(function(){
//     var query = $(this).val();
//     if(query != ''){
//       var _token = $('input[name="_token"]').val();
//       $.ajax({
//           url:'get_autocomplete_data',
//           method:"POST",
//           data:{query:query, _token:_token},
//           success:function(data){
//             $('#medicineList').fadeIn();
//             $('#medicineList').addClass('active');
//             $('#medicineList').html(data);
//           }
//       });
//     }
//   });
//
//   $(document).on('click', 'li',function(){
//     $('#medicine_title').val($(this).text());
//     $('#medicineList').fadeOut();
//   });
// });
