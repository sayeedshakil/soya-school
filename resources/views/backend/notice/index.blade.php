@extends('backend.layouts.admin')
@section('content')
@can('notice_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{route('backend.notices.create')}}">
            {{ trans('global.add') }} {{ trans('cruds.notice.title_singular') }}
        </a>
    </div>
</div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.notice.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.notice.notice_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.notice.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.post.fields.category') }}
                        </th>

                        <th>
                            {{ trans('cruds.student.class') }}
                        </th>

                        <th>
                            {{ trans('cruds.notice.attachment') }}
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
                    @foreach($notice as $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $i ?? '' }}
                            </td>
                            <td>
                                {{ $item->title ?? '' }}
                            </td>
                            <td>
                                {{ $item->description ?? '' }}
                            </td>
                            <td>
                                {{ $item->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->studentclass->name ?? '' }}
                            </td>
                            <td>
                                @if ($item->attachment)
                                    <a class="btn btn-primary " href="{{asset('storage/images/attachment/'.$item->attachment)}}" download="{{$item->title}}-notice" >
                                        <i class="fas fa-download "></i>
                                        Download attachment
                                    </a>
                                @else
                                    {{'No attachment found!'}}
                                @endif
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

                            @can('notice_access')
                            <td>
                                {{-- @can('notice_show') --}}
                                {{-- <a class="btn btn-xs btn-primary" href="{{ route('backend.studentclasses.show', $item->id) }}">
                                    {{ trans('global.view') }}
                                </a> --}}
                                {{-- @endcan --}}

                                @can('notice_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('backend.notices.edit', $item->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan

                                @can('notice_delete')
                                <form action="{{ route('backend.notices.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('notice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('backend.notices.mass_destroy') }}",
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
