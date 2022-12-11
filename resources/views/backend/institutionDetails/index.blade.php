@extends('backend.layouts.admin')
@section('content')
@can('site_configuration_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.institution_details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.institutionDetails.title') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.institutionDetails.title') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.institutionDetails.aboutus_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.institutionDetails.aboutus_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.institutionDetails.aboutus_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.institutionDetails.contactus_school_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.institutionDetails.contactus_address') }}
                        </th>

                        <th>
                            {{ trans('cruds.institutionDetails.contactus_mobile') }}
                        </th>

                        <th>
                            {{ trans('cruds.institutionDetails.contactus_telephone') }}
                        </th>

                        <th>
                            {{ trans('cruds.institutionDetails.contactus_email') }}
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
                    @foreach($institutionDetail as $item)

                    <tr data-entry-id="{{ $item->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $i ?? '' }}
                        </td>
                        <td>
                            {{ $item->aboutus_title ?? '' }}
                        </td>

                        <td>
                            {{ $item->aboutus_description ?? '' }}
                        </td>
                        <td>
                            @if($item->aboutus_image)
                                <img src="{{ asset('storage/images/siteImage/' . $item->aboutus_image) }}" style="max-height: 50px;border-radius:3px; " class="img-fluid" alt="{{$item->aboutus_title}} "
                                title="{{$item->aboutus_title}} ">
                            @else
                                <img src="{{ asset('storage/images/students/default.png') }}" style="max-height: 50px;border-radius:3px;" class="img-fluid"
                                alt="{{$item->aboutus_title}} " title="{{$item->aboutus_title}} ">
                            @endif
                        </td>
                        <td>
                            {{ $item->contactus_school_name ?? '' }}
                        </td>
                        <td>
                            {{ $item->contactus_address ?? '' }}
                        </td>
                        <td>
                            {{ $item->contactus_mobile ?? '' }}
                        </td>
                        <td>
                            {{ $item->contactus_telephone ?? '' }}
                        </td>
                        <td>
                            {{ $item->contactus_email ?? '' }}
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
                            {{-- @can('post_show') --}}
                            {{-- <a class="btn btn-xs btn-primary" href="{{ route('backend.institution_details.show', $item) }}">
                                {{ trans('global.view') }}
                            </a> --}}
                            {{-- @endcan --}}


                            @can('site_configuration_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('backend.institution_details.edit', $item) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('site_configuration_delete')
                            <form action="{{ route('backend.institution_details.destroy', $item) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('backend.institution_details.mass_destroy') }}",
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
