@extends('backend.layouts.admin')
@section('content')
@can('teacher_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.teachers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.teacher.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.teacher.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.teacher.teacher_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.teacher.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.teacher.designation') }}
                        </th>
                        <th>
                            {{ trans('cruds.teacher.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.teacher.teacherImage') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.student.admissionNumber') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.admissionDate') }}
                        </th>--}}

                        {{-- <th>
                            {{ trans('cruds.student.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.roll') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.dateOfBirth') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.religion') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.address') }}
                        </th> --}}

                        {{-- <th>
                            {{ trans('cruds.student.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fatherName') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fatherMobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fatherOccupation') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.motherName') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.motherMobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.motherOccupation') }}
                        </th> --}}
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i=1
                    @endphp
                    @foreach($teachers as $teacher)

                    <tr data-entry-id="{{ $teacher->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $i ?? '' }}
                        </td>
                        <td>
                            {{ $teacher->teacherId ?? '' }}
                        </td>

                        <td>
                            {{ $teacher->fName ?? '' }} {{ $teacher->lName ?? '' }}
                        </td>
                        <td>
                            @if ($teacher->designation == 'Principal')
                                <div class="badge badge-success">
                                    {{ $teacher->designation ?? '' }}
                                </div>
                            @elseif ($teacher->designation == 'Vice Principal')
                                <div class="badge badge-primary">
                                    {{ $teacher->designation ?? '' }}
                                </div>
                            @elseif ($teacher->designation == 'Teacher')
                                <div class="badge badge-info">
                                    {{ $teacher->designation ?? '' }}
                                </div>
                            @endif

                        </td>
                        <td>
                            {{ $teacher->mobile ?? '' }}
                        </td>

                        <td>
                            @if($teacher->teacherImage)
                                <img src="{{ asset('storage/images/teachers/' . $teacher->teacherImage) }}" style="max-height: 50px;border-radius:3px; " class="img-fluid" alt="{{$teacher->fName}} {{$teacher->lName}}"
                                title="{{$teacher->fName}} {{$teacher->lName}}">
                            @else
                                <img src="{{ asset('storage/images/students/default.png') }}" style="max-height: 50px;border-radius:3px;" class="img-fluid"
                                alt="{{$teacher->fName}} {{$teacher->lName}}" title="{{$teacher->fName}} {{$teacher->lName}}">
                            @endif
                        </td>


                        @can('teacher_access')
                        <td>
                            @can('teacher_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('backend.teachers.show', $teacher) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('teacher_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('backend.teachers.edit', $teacher) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('teacher_delete')
                            <form action="{{ route('backend.teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  @can('teacher_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('backend.teachers.mass_destroy') }}",
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
