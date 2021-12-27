@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-3 mb-4">
            <div class="row" >
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nombre del cliente">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="Telefono (opcional)">
                </div>
                <div class="col d-flex flex-row-reverse">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldnisearch">Buscar DNI</button>
                </div>
            </div>
        </div>

        <div class="card p-3 mb-4">
            <div class="row">
                <div class="col-6">
                    <select class="custom-select form-select">
                        <option value="0" selected>Microbleding Mixta</option>
                        <option value="1">Microbleding Natural</option>
                        <option value="2">Microbleding Retoque</option>
                        <option value="3">Delineado de labios</option>
                      </select>
                </div>
    
                <div class="col-3">
                    <input type="text" class="form-control" placeholder="Precio">
                </div>
                <div class="col-3 d-flex flex-row-reverse">
                    <button class="btn btn-secondary">Agregar servicio</button>
                </div>
            </div>
    
            <div class="row mt-4 mx-0">
                <table id="tableservices" class="table" style="height:80%">
                    <thead>
                      <tr>
                        <th scope="col">Operaciones</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Precio</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td class="text-end">4.60</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td class="text-end">5.20</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td >Larry the Bird</td>
                        <td class="text-end">20.50</td>
                      </tr>
                    </tbody>
                  </table>
            </div>

            <div class="d-flex flex-row-reverse mt-3 mx-0"> 
                    <label class="col-1 text-end" for="">10.50</label>
                    <label class="col-3" for="">Precio total</label>
            </div>

            <div class="d-flex flex-row-reverse mt-3 mx-0">     
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpayment">Continuar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal DNI -->
<div class="modal fade" id="modaldnisearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar por DNI</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-6">
                <input type="text" class="form-control" placeholder="DNI">
              </div>
              <div class="col d-flex flex-row-reverse">
                <button class="btn btn-secondary">Buscar</button>
              </div>
          </div>
          <div class="row mx-0 mt-3">
            <span class="py-2 badge fs-6 text-dark w-100 text-align-center">0 resultados</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Pasar datos</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal payment -->
<div class="modal fade" id="modalpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Metodo de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Efectivo</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Tarjeta</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Yape</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="" value="0">
                    </div>
                    <div class="col-sm-5">
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
    $(document).ready(function() {
        $('#tableservices').DataTable({
            paging: false,
            searching: false,
            ordering:  false,
            select: true
        });
    } );    
  </script>

@endsection
