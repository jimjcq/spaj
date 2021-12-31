@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" justify-content-center">
        <div class="card mb-4 shadow">
              <div class="card-header">
                Datos de clientes
              </div>
            
              
          <div class="card-body">

            <div class="row justify-content-md-center" >
                <div class="col-lg-6 col-md col-sm my-1">
                
                  <div class="input-group">
                      <!--<span class="input-group-text" id="basic-addon1">@</span>-->
                      <i class="bi bi-person input-group-text"></i>
                    <input type="text" class="form-control" placeholder="Nombre del cliente" id="name-client">
                  </div>

                
                  </div>
                <div class="col-lg-4 col-md col-sm my-1">
                  <div class="input-group">
                    <i class="bi bi-telephone input-group-text"></i>
                    <input type="number" class="form-control col-lg col-md col-sm-6" placeholder="Telefono (opcional)">
                  </div>
                </div>
                <div class="col-lg-2 col-md col-sm my-1 d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldnisearch" id="btn-search-dni">Buscar DNI</button>
                </div>
            </div>
          </div>
          
        </div>

        <div class="card shadow">
            <div class="card-header">
              Datos de servicios
            </div>
          <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md col-sm my-1">
                    <select class="custom-select form-select" id="listservices" onchange="changed_price()">
                        @foreach ($services as $service)
                          <option id="idservice{{$service->id}}" value="{{$service->id}}|{{$service->price}}">{{ $service->name }}</option>
                        @endforeach
                      </select>
                </div>
    
                <div class="col-lg-4 col-md col-sm my-1">

                  <div class="input-group">
                    <i class="bi bi-currency-dollar input-group-text"></i>
                    <input id="idprice" type="number" class="form-control" placeholder="Precio">
                  </div>

                </div>
                <div class="col-lg-2 col-md col-sm my-1 d-flex flex-row-reverse">
                    <button id="btn-register" class="btn btn-secondary">Agregar servicio</button>
                </div>
            </div>
    
            <div class="row mt-4 mx-0 overflow-auto" style="min-height: 150px">
                <table id="tableservices" class="table pb-2">
                    <thead>
                      <tr>
                        <th class="col-3" scope="col">Operaciones</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                  
                    </tbody>
                  </table>
            </div>

            <div class="d-flex flex-row-reverse mt-3 mx-0"> 
                    <label id="price-total" class="col-2 text-end" for="">0</label>
                    <label class="col-3" for="">Precio total</label>
            </div>

            <div class="d-flex flex-row-reverse mt-3 mx-0">     
                <button class="btn btn-primary"  data-bs-target="#modalpayment" id="btn-continue">Continuar</button>
            </div>
          </div>

      </div>
    </div>
</div>

<!-- Modal DNI -->
<div class="modal fade" id="modaldnisearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar por DNI</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-6">
                <input type="number" class="form-control" placeholder="DNI" id="modal-input-search-dni">
              </div>
              <div class="col d-flex flex-row-reverse">
                <button class="btn btn-secondary" id="modal-button-search-reniec">Buscar</button>
              </div>
          </div>
          <div class="row mx-0 mt-3">
            <span class="py-2 badge fs-6 text-dark w-100 text-align-center" id="modal-search-name-dni"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modal-btn-pasar-datos">Pasar datos</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal payment -->
<div class="modal fade" id="modalpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Metodo de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row mb-3">
                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btn-efectivo" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btn-efectivo">Efectivo</label>
                  
                    <input type="radio" class="btn-check" name="btnradio" id="btn-tarjeta" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-tarjeta">Tarjeta</label>
                  
                    <input type="radio" class="btn-check" name="btnradio" id="btn-yape" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-yape">Yape</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btn-mixta" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btn-mixta">Mixta</label>

                  </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Efectivo</label>
                    <div class="col-sm-5">

                      <div class="input-group">
                        <i class="bi bi-currency-dollar input-group-text"></i>
                        <input type="number" class="form-control" id="input-price-efectivo" value="0">
                      </div>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Tarjeta</label>
                    <div class="col-sm-5">

                      <div class="input-group">
                        <i class="bi bi-currency-dollar input-group-text"></i>
                        <input type="number" class="form-control" id="input-price-tarjeta" value="0">
                      </div>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Yape</label>
                    <div class="col-5">

                      <div class="input-group">
                        <i class="bi bi-currency-dollar input-group-text"></i>
                        <input type="number" class="form-control" id="input-price-yape" value="0">
                      </div>


                    </div>
                    <div class="col-5">
                        <select class="form-select" aria-label="Default select example">
                            <option value="0" selected>Anthony</option>
                            <option value="1">Jimmy</option>
                            <option value="2">Otro</option>
                        </select>    
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Grabar boleta</button>
            </div>
        </div>
    </div>
  </div>

  <script>

    function isBlank(str) {
        return (!str || /^\s*$/.test(str));
    }

    $(document).ready(function() {
        $('#tableservices').DataTable({
            paging: false,
            searching: false,
            ordering:  false,
            select: true,
            info: false,
        });
    } );    

    $('#btn-register').on('click', function(){

      var id = $('#listservices').val().split('|')[0];
      $('#tableservices').DataTable().row.add([
        '<button type="button" class="btn btn-danger">Quitar</button>',

        //$('#idservice' + id).val().split('|')[0],
        $('#idservice' + id).text(),
        isNaN (parseFloat( $('#idprice').val() ) ) ? 0: $('#idprice').val()  ,
        
      ]).draw(false);
      refresh_price();
    });

    function changed_price(){
      var price = $('#listservices').val().split('|')[1];
      $('#idprice').val(price);
    }

    function refresh_price(){
      var price = 0;
      var data = $('#tableservices').DataTable().rows().data();
      data.each(function (value, index) {
        price += parseFloat(value[2]);
      });
      $('#price-total').html(price);
    }

    $('#tableservices tbody').on( 'click', 'button.btn-danger', function () {
      $('#tableservices').DataTable()
        .row( $(this).parents('tr') )
        .remove()
        .draw();
        refresh_price();
      } );

      $('#btn-efectivo').on('click', function(){
        $('#input-price-efectivo').val( parseFloat($('#price-total').html()) );
        $('#input-price-tarjeta').val( 0 );
        $('#input-price-yape').val( 0 );
      });
      $('#btn-tarjeta').on('click', function(){
        $('#input-price-efectivo').val( 0 );
        $('#input-price-tarjeta').val( parseFloat($('#price-total').html()) );
        $('#input-price-yape').val( 0 );
      });
      $('#btn-yape').on('click', function(){
        $('#input-price-efectivo').val( 0 );
        $('#input-price-tarjeta').val( 0 );
        $('#input-price-yape').val( parseFloat($('#price-total').html()) );
      });
      $('#btn-mixta').on('click', function(){
        $('#input-price-efectivo').val( 0 );
        $('#input-price-tarjeta').val( 0 );
        $('#input-price-yape').val( 0 );
      });

      $('#btn-continue').on('click', function(){
        if(isBlank( $('#name-client').val() ) == false && parseFloat( $('#price-total').html() ) > 0 )
        {
          $('#modalpayment').modal('show');
          $('#btn-efectivo').click();
        }
      });

      $('#btn-search-dni').on('click', function(){
        $('#modal-input-search-dni').val('');
      });

      $('#modal-btn-pasar-datos').on('click', function(){
        $('#name-client').val( $('#modal-search-name-dni').html() );
      });

      $('#modal-button-search-reniec').on('click', function(){
        $('#modal-search-name-dni').html('Jimmy Josue Chullunquia Quispe')
      });

    changed_price();

  </script>

  <style>
    table.dataTable.no-footer {
      border-bottom: none;
    }
  </style>

@endsection
