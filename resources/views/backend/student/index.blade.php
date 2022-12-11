@extends('backend.layouts.admin')
@section('content')
@can('student_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('backend.students.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.student.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('cruds.student.std_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.class') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.studentImage') }}
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
                    @foreach($students as $student)

                    <tr data-entry-id="{{ $student->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $i ?? '' }}
                        </td>
                        <td>
                            {{ $student->studentId ?? '' }}
                        </td>

                        <td>
                            {{ $student->fName ?? '' }} {{ $student->lName ?? '' }}
                        </td>
                        <td>
                            {{ $student->studentclass->name ?? '' }}
                        </td>
                        <td>
                            {{ $student->mobile ?? '' }}
                        </td>

                        <td>
                            @if($student->studentImage)
                                <img src="{{ asset('storage/images/students/' . $student->studentImage) }}" style="max-height: 50px;border-radius:3px; " class="img-fluid" alt="{{$student->fName}} {{$student->lName}}"
                                title="{{$student->fName}} {{$student->lName}}">
                            @else
                                <img src="{{ asset('storage/images/students/default.png') }}" style="max-height: 50px;border-radius:3px;" class="img-fluid"
                                alt="{{$student->fName}} {{$student->lName}}" title="{{$student->fName}} {{$student->lName}}">
                            @endif
                        </td>


                        @can('student_access')
                        <td>
                            @can('student_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('backend.students.show', $student) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan

                            @can('student_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('backend.students.edit', $student) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('student_delete')
                            <form action="{{ route('backend.students.destroy', $student) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  @can('student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('backend.students.mass_destroy') }}",
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
