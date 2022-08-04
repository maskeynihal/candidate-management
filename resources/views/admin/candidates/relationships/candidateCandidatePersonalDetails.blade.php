@can('candidate_personal_detail_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.candidate-personal-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.candidatePersonalDetail.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.candidatePersonalDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-candidateCandidatePersonalDetails">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.middle_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.emergency_contact_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidatePersonalDetail.fields.join_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidatePersonalDetails as $key => $candidatePersonalDetail)
                        <tr data-entry-id="{{ $candidatePersonalDetail->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $candidatePersonalDetail->id ?? '' }}
                            </td>
                            <td>
                                {{ $candidatePersonalDetail->candidate->email ?? '' }}
                            </td>
                            <td>
                                {{ $candidatePersonalDetail->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidatePersonalDetail->middle_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidatePersonalDetail->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $candidatePersonalDetail->emergency_contact_number ?? '' }}
                            </td>
                            <td>
                                {{ $candidatePersonalDetail->join_date ?? '' }}
                            </td>
                            <td>
                                @can('candidate_personal_detail_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.candidate-personal-details.show', $candidatePersonalDetail->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('candidate_personal_detail_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.candidate-personal-details.edit', $candidatePersonalDetail->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('candidate_personal_detail_delete')
                                    <form action="{{ route('admin.candidate-personal-details.destroy', $candidatePersonalDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('candidate_personal_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.candidate-personal-details.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-candidateCandidatePersonalDetails:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection