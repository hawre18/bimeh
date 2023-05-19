@extends('template.v1.admin.app')
@section('alert')
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection
@section('content')

        <div class="container-fluid">
            <div class="layout-specing">
                <div ><a class="btn btn-primary" href="{{route('sample.create')}}">افزودن نمونه کار</a></div>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="table-responsive bg-white shadow rounded">
                            <table class="table mb-0 table-center">
                                <thead>
                                <tr>
                                    <th class="border-bottom p-3" >#</th>
                                    <th class="border-bottom p-3" >مشتری</th>
                                    <th class="border-bottom p-3" >متخصص</th>
                                    <th class="border-bottom p-3">نوع خدمت</th>
                                    <th class="border-bottom p-3">تاریخ انجام</th>
                                    <th class="border-bottom p-3">علیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($samples as $sample)
                                    <tr>
                                        <th class="p-3">{{$loop->index+1}}</th>
                                        <td class="p-3">
                                            @if($sample->customer!=null)
                                                {{$sample->customer->f_name.' '.$sample->customer->l_name}}
                                        @elseif($sample->customer==null)
                                        null
                                                @endif
                                        </td>
                                        <td class="p-3">
                                            @if($sample->doctor!=null)
                                                {{$sample->doctor->fname.' '.$sample->doctor->lname}}
                                            @elseif($sample->doctor==null)
                                                null
                                                @endif
                                        </td>
                                        <td class="p-3">
                                            @if($sample->service!=null)
                                                {{$sample->service->title}}
                                            @elseif($sample->service==null)
                                                null
                                                @endif
                                        </td>
                                        <td class="p-3">{{\Hekmatinasser\Verta\Verta::instance($sample->dateDo)->formatJalaliDatetime(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                                        <td class="text-end p-3">
                                            <a href="{{route('sample.edit',$sample->id)}}" class="btn btn-icon btn-pills btn-soft-success" >ویرایش</a>
                                            <form method="post" action="{{route('sample.destroy',$sample->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-icon btn-pills btn-soft-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end row-->
                <div style="text-align: center">
                    {!! $samples->render() !!}
                </div>
            </div>
        </div><!--end container-->


@endsection
