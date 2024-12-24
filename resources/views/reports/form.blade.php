@extends('layout.mian_structer')

@section('section_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">تقرير حجوزات المرافق</h3>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('room.report_show') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>من تاريخ</label>
                            <input type="date" name="date_from" class="form-control mt-1">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>الى تاريخ</label>
                            <input type="date" name="date_to" class="form-control mt-1">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-25" role="submit">بحث</button>
            </form>
        </div>
    </div>
@endsection
