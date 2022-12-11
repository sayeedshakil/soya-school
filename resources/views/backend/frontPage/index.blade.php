@extends('backend.layouts.admin')
@section('content')
@can('site_configuration_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.front-page.create') }}">
                {{ trans('global.add') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive text-center">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.serial') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontPage.headerNameEn') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontPage.headerNameBn') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontPage.headTeacherImage') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontPage.headTeacherName') }}
                        </th>
                        <th>
                            {{ trans('cruds.frontPage.latestNewsText') }}
                        </th>
                        <th>
                            {{ trans('cruds.post.fields.is_active')}}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i=1
                    @endphp
                    @foreach($frontPages as $item)

                    <tr data-entry-id="{{ $item->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $i ?? '' }}
                        </td>
                        <td>
                            {{ $item->headerNameEn ?? '' }}
                        </td>

                        <td>
                            {{ $item->headerNameBn ?? '' }}
                        </td>
                        <td>
                            @if($item->headTeacherImage)
                                <img src="{{ asset('storage/images/teachers/' . $item->headTeacherImage) }}" style="max-height: 50px;border-radius:3px; " class="img-fluid" alt="{{$item->headTeacherName}}">
                            @else
                                <img src="{{ asset('storage/images/teachers/default.png') }}" style="max-height: 50px;border-radius:3px;" class="img-fluid"
                                alt="No Image found" >
                            @endif

                        </td>
                        <td>
                            {{ $item->headTeacherName ?? '' }}

                        </td>

                        <td>
                            {{ $item->latestNewsText ?? '' }}
                        </td>

                        <td>
                            @if ($item->is_active == '0')
                                <div class="badge badge-warning">
                                    In-Active
                                </div>
                            @elseif ($item->is_active == '1')
                                <div class="badge badge-primary">
                                    Active
                                </div>
                            @endif
                        </td>


                        @can('site_configuration_access')
                        <td>
                            {{-- @can('site_configuration_show') --}}
                            {{-- <a class="btn btn-xs btn-primary" href="{{ route('backend.front-page.show', $item) }}">
                                {{ trans('global.view') }}
                            </a> --}}
                            {{-- @endcan --}}

                            @can('site_configuration_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('backend.front-page.edit', $item) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('site_configuration_delete')
                            <form action="{{ route('backend.front-page.destroy', $item) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan



                        </td>
                        @endcan

                    </tr>
                    @php
                    $i++
                     @endphp
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  @can('site_configuration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('backend.front-page.mass_destroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
  @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection

