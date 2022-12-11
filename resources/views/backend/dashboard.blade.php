@extends('backend.layouts.admin')

@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            {{-- box section --}}
            <div class="card">
                <div class="card-header">
                    Welcome {{auth()->user()->name}}
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>

                    </div>

                    {{-- @can('database_notification_access')
                        @forelse($notifications as $notification)
                            <div class="alert alert-success" role="alert">
                                [{{ $notification->created_at }}] Writer {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just registered.
                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                    Mark as read
                                </a>
                            </div>

                            @if($loop->last)
                                <a href="#" id="mark-all">
                                    Mark all as read
                                </a>
                            @endif
                        @empty
                        You have no new notifications.
                        @endforelse
                    @endcan
                            <hr> --}}
                    <div class="row pr-2">

                        @can('student_access')
                        <div class="col-6 col-lg-3 pr-0">
                            <div class="card">
                              <a href="{{route('backend.students.index')}}">
                                  <div class="card-body p-3 d-flex align-items-center">
                                      <div class="bg-primary p-3 mr-2">
                                        {{-- <i class="c-icon c-icon-xl far fa-address-card"></i> --}}
                                        <i class="c-icon c-icon-xl fas fa-users"></i>
                                      </div>
                                      <div>
                                        <div class="text-valu text-primary">{{$students}}</div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Manage Students</div>
                                      </div>
                                  </div>
                              </a>
                              <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.students.create')}}"><span class="small font-weight-bold">Add Student</span>
                                  <i class="c-icon fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                        @endcan
                        <!-- /.col-->
                        <!-- /.col-->
                        @can('teacher_access')
                        <div class="col-6 col-lg-3 pr-0">
                            <div class="card">
                              <a href="{{route('backend.teachers.index')}}">
                                  <div class="card-body p-3 d-flex align-items-center">
                                      <div class="bg-info p-3 mr-2">
                                        {{-- <i class="c-icon c-icon-xl far fa-address-card"></i> --}}
                                        <i class="c-icon c-icon-xl fas fa-users"></i>
                                      </div>
                                      <div>
                                        <div class="text-valu text-info">{{$teachers}}</div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Manage teachers</div>
                                      </div>
                                  </div>
                              </a>
                              <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.teachers.create')}}"><span class="small font-weight-bold">Add Teacher</span>
                                  <i class="c-icon fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                        @endcan
                        <!-- /.col-->
                        <!-- /.col-->
                        @can('expense_access')
                        <div class="col-6 col-lg-3 pr-0">
                            <div class="card">
                              <a href="{{route('backend.expenses.index')}}">
                                  <div class="card-body p-3 d-flex align-items-center">
                                      <div class="bg-success p-3 mr-2">
                                        {{-- <i class="c-icon c-icon-xl fas fa-bezier-curve"></i> --}}
                                        <i class="c-icon c-icon-xl fas fa-money-bill "></i>
                                      </div>
                                      <div>
                                        <div class="text-value text-success"></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Manage Expenses</div>
                                      </div>
                                  </div>
                              </a>
                              <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.expense-reports.index')}}"><span class="small font-weight-bold">View Expense Report</span>
                                  <i class="c-icon fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                        @endcan
                        <!-- /.col-->
                        <!-- /.col-->
                        @can('income_access')
                        <div class="col-6 col-lg-3 pr-0">
                            <div class="card">
                              <a href="{{route('backend.incomes.index')}}">
                                  <div class="card-body p-3 d-flex align-items-center">
                                      <div class="bg-success p-3 mr-2">
                                        {{-- <i class="c-icon c-icon-xl fas fa-bezier-curve"></i> --}}
                                        <i class="c-icon c-icon-xl fas fa-money-bill "></i>
                                      </div>
                                      <div>
                                        <div class="text-value text-success"></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Manage Incomes</div>
                                      </div>
                                  </div>
                              </a>
                              <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.expense-reports.index')}}"><span class="small font-weight-bold">View Income Report</span>
                                  <i class="c-icon fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                        @endcan
                        <!-- /.col-->
                        <!-- /.col-->
                        {{-- @can('') --}}
                        <div class="col-6 col-lg-3 pr-0">
                            <div class="card">
                              <a href="https://soya.biddalay.net/" target="_blank">
                                  <div class="card-body p-3 d-flex align-items-center">
                                      <div class="bg-dark p-3 mr-2">
                                        {{-- <i class="c-icon c-icon-xl fas fa-bezier-curve"></i> --}}
                                        <i class="c-icon c-icon-xl fas fa-desktop nav-icon"></i>
                                      </div>
                                      <div>
                                        <div class="text-value text-success"></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Edufy Login</div>
                                      </div>
                                  </div>
                              </a>
                              <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="https://soya.biddalay.net/" target="_blank"><span class="small font-weight-bold">Log In to Edufy</span>
                                  <i class="c-icon fas fa-angle-right"></i>
                                </a></div>
                            </div>
                        </div>
                        {{-- @endcan --}}
                        <!-- /.col-->
                        <!-- /.col-->
                        <div class="col-6 col-lg-3 pr-0">
                          <div class="card">
                            <a href="{{route('backend.profiles.show',auth()->user()->id)}}">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-warning p-3 mr-2">
                                      <i class="c-icon c-icon-xl far fa-address-card"></i>
                                    </div>
                                    <div>
                                      <div class="text-valu text-warning"></div>
                                      <div class="text-muted text-uppercase font-weight-bold small">your profile</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.profiles.edit',auth()->user()->id)}}"><span class="small font-weight-bold">Edit Your Profile</span>
                                <i class="c-icon fas fa-angle-right"></i></a></div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6 col-lg-3 pr-0">
                          <div class="card">
                            <a href="{{route('backend.auth.change_password')}}">
                                <div class="card-body p-3 d-flex align-items-center">
                                    <div class="bg-danger p-3 mr-2">
                                      <i class="c-icon c-icon-xl fas fa-unlock-alt"></i>
                                    </div>
                                    <div>
                                      <div class="text-value text-danger"></div>
                                      <div class="text-muted text-uppercase font-weight-bold small">Password</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('backend.auth.change_password')}}"><span class="small font-weight-bold">Change Password</span>
                                <i class="c-icon fas fa-angle-right"></i></a></div>
                          </div>
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row-->
                </div>

            </div>
            {{-- box section end--}}

            {{-- notice section --}}
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
                                            @can('notice_create')
                                            <a class="btn btn-xs btn-success" href="{{ route('backend.notices.create') }}">
                                                {{ trans('global.add') }}
                                            </a>
                                            @endcan

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
            {{-- notice section end--}}
        </div>
    </div>
</div>
@endsection


@section('scripts')
@parent
{{-- @can('database_notification_access')

    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('backend.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));

            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>

@endcan --}}
@endsection

