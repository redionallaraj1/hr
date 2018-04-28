@extends('system-mgmt.state.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Lista e Shteteve</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('state.create') }}">Shto Shtet te ri</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('state.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Kerko'])
          @component('layouts.two-cols-search-row', ['items' => ['Emri i Shtetit'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="state: activate to sort column ascending">Emri i Shtetit</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="country: activate to sort column ascending">Emri i Vendit</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Veprime</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($states as $state)
                <tr role="row" class="odd">
                  <td>{{ $state->name }}</td>
                  <td>{{ $state->country_name }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('state.destroy', ['id' => $state->id]) }}" onsubmit = "return confirm('A jeni i/e sigurt?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('state.edit', ['id' => $state->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Ndrysho
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Fshi
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Rezultate 1 nga {{count($states)}} </div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $states->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection