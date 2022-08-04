@extends('layouts.admin')
@section('content')
@can('candidate_official_detail_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.candidate-official-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.candidateOfficialDetail.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'CandidateOfficialDetail', 'route' => 'admin.candidate-official-details.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.candidateOfficialDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CandidateOfficialDetail">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.candidateOfficialDetail.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidateOfficialDetail.fields.official_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidateOfficialDetail.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidateOfficialDetail.fields.designation') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidateOfficialDetails as $key => $candidateOfficialDetail)
                        <tr data-entry-id="{{ $candidateOfficialDetail->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $candidateOfficialDetail->id ?? '' }}
                            </td>
                            <td>
                                {{ $candidateOfficialDetail->official_email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CandidateOfficialDetail::AREA_SELECT[$candidateOfficialDetail->area] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CandidateOfficialDetail::DESIGNATION_SELECT[$candidateOfficialDetail->designation] ?? '' }}
                            </td>
                            <td>
                                @can('candidate_official_detail_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.candidate-official-details.show', $candidateOfficialDetail->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('candidate_official_detail_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.candidate-official-details.edit', $candidateOfficialDetail->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('candidate_official_detail_delete')
                                    <form action="{{ route('admin.candidate-official-details.destroy', $candidateOfficialDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('candidate_official_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.candidate-official-details.massDestroy') }}",
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
  let table = $('.datatable-CandidateOfficialDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection