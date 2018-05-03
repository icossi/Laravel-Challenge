<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{asset('css/bootstrap-table.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap-table.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-table-filter-control.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tablas.css') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
      .fixed-table-body {
          height: auto;
        }
    </style>
</head>
<body>
<div class="container">
  <h1>Laravel Challenge</h1>
  <i>Last Conecction: {{$connection->created_at->toDateTimeString()}}
  <table id="table" border="1px" data-toggle="table" class="table table-bordered" data-filter-control="true"
          data-search="true"  data-page-list="[10, 25, 50, 100, ALL]" data-show-footer="false"
            data-pagination="true" data-click-to-select="true" >
        <thead>
          <tr>
                <th data-searchable="false" >Organization</th>
                <th data-field="repository"  >Repository Name</th>
                <th  data-searchable="false"  >Description</th>
                <th  data-searchable="false"  data-sortable="true" >Created at</th>
                <th  data-searchable="false"  data-sortable="true" >Last Comit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($repositories as $r)
              <tr>
                  <td>{{$r->organization}}</td>
                  <td>{{$r->name}}</td>
                  <td>{{$r->description}}</td>
                  <td>{{$r->creation_date}}</td>
                  <td>{{$r->last_commit}}</td>
              </tr>
          @endforeach
        </tbody>
    </table>
<div>
</body>
</html>
