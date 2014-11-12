var servidor = 'http://localhost/marvin/public/api/';


$(document).ready(function () {

//if ( $('.searchCat').length){
   $( "#search" ).autocomplete(
  {

     source: servidor +  $('#search').data('url'),
     data: 'service=' + $(this).val(),
     focus: function (event, ui) {
            $("#search").val(ui.item.label);
            $('#' + $('#search').data('cod')).val(ui.item.value);
            return false;
        },
    select: function (event, ui) {
            $("#search").val(ui.item.label);
            $('#' + $('#search').data('cod')).val(ui.item.value);
            return false;
        }
  })
   $( "#buscar" ).autocomplete(
  {

     source: servidor +  $('#buscar').data('url'),
     data: 'service=' + $(this).val(),
     focus: function (event, ui) { 
            $("#buscar").val(ui.item.label);
            $('#' + $('.buscar').data('cod')).val(ui.item.value);
            return false;
        },
    select: function (event, ui) {
            $("#buscar").val(ui.item.label);
            $('#' + $('#buscar').data('cod')).val(ui.item.value);
            return false;
        }
  })
//}
  if ( $('.btn-delete').length)
   {
       $('.btn-delete').click(function (e) {
        e.preventDefault();
        if(confirm('¿Realmente desea eliminarlo?'))
         {
             var id = $(this).data('id');
             var form = $('#form-delete');
             var action = form.attr('action').replace('CLIENTE_ID', id);
             var row =  $(this).parents('tr');
             
             row.fadeOut(1000);
             
             $.post(action, form.serialize(), function(result) {
                if (result.success) {
                   setTimeout (function () {
                      row.delay(1000).remove();
                      //alert(result.msg);
                   }, 1000);                
                } else {
                   row.show();
                }
             }, 'json');
           }
           });
         
   }

$( '.fecha' ).datepicker({
      numberOfMonths: 1,
      showButtonPanel: true
    });

});

/*
$( "#e1" ).select2({
    placeholder: "Search for a movie",
    minimumInputLength: 3,
    ajax: {
    url: "http://api.rottentomatoes.com/api/public/v1.0/movies.json",
    dataType: 'jsonp',
    quietMillis: 100,
    data: function (term, page) { // page is the one-based page number tracked by Select2
    return {
    q: term, //search term
    page_limit: 10, // page size
    page: page, // page number
    apikey: "ju6z9mjyajq2djue3gbvv26t" // please do not use so this example keeps working
    };
    },
    results: function (data, page) {
    var more = (page * 10) < data.total; // whether or not there are more results available
     
    // notice we return the value of more so Select2 knows if more results can be loaded
    return {results: data.movies, more: more};
    }
    },
    formatResult: movieFormatResult, // omitted for brevity, see the source of this page
    formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
    dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
    escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
});
  $( "#seadrch" ).autocomplete(
  {
     url:'search',
     data: 'service=' + $(this).val(),
     focus: function (event, ui) {
            $("#search").val(ui.item.label);
            $('#codigo').val(ui.item.value);
            return false;
        },
    select: function (event, ui) {
            $("#search").val(ui.item.label);
            $('#codigo').val(ui.item.value);
            return false;
        }
  })


  $( "#producto" ).autocomplete(
  {
     source:'producto',
     focus: function (event, ui) {
            $("#producto").val(ui.item.label);
            $('#codigoProducto').val(ui.item.value);
            return false;
        },
    select: function (event, ui) {
            $("#producto").val(ui.item.label);
            $('#codigoProducto').val(ui.item.value);
            return false;
        }
  });
  //mm/dd/yy
$('.onlyNumber').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});


  $("#compra").submit(function() {

    var url = "store"; // the script where you handle the form input.

    $.ajax({
           type: "GET",
           url: url,
           data: $("#compra").serialize(), // serializes the form's elements.
           success: function(data)
           {
              //$('#cabecera').hide();
              //alert(data.num_compra);
                //$("#alertPlaceHolder").html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span> execute </span></div>')
              $('#alertPlaceHolder').html("");
              if(data.success)
                {
                    $('#codigoCompra').val(data.num_compra);
                    
                    $("#tablaDetalle").append(lineaTablaTemplate(data));

                    $('#totalVenta').val(parseInt(data.total) + parseInt($('#totalVenta').val()));
                    $('#totalIVa').val(parseInt(data.iva) + parseInt($('#totalIVa').val()));
              }
           }
         });

    return false; // avoid to execute the actual submit of the form.
});

function lineaTablaTemplate(data)
{
  var html = "";
  html = "<tr id='id" + data.id + "'>";
  html +="<td>"+ data.cod_producto + "</td>";
  html +="<td>"+ data.producto + "</td>";
  html +="<td>"+ data.pre_siniva + "</td>";
  html +="<td>"+ data.iva + "</td>";
  html +="<td>"+ data.pre_coniva + "</td>";
  html +="<td>"+ data.cantidad + "</td>";
  html +="<td>"+ data.total + "</td>";
  html += "<td> <a href='#'data-id='" + data.id + "' class='btn btn-danger btn-delete glyphicon glyphicon-remove'> </a>";
  html +="</tr>";
  return html;
}


   

});
$("#tablaDetalle").delegate(".glyphicon-remove", "click", function(e) {
   var id = $(this).data('id');
   var form = $('#form-delete');
   var action = form.attr('action').replace('CLIENTE_ID', id);
   var row =  $(this).parents('tr');
           
  alert(id);
             
    $.post(action, form.serialize(), function(result) {
     if (result.success) {
       row.fadeOut(1000);
      }
    }, 'json');
             

});*/