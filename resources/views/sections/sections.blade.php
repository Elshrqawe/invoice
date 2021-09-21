@extends('layouts.master')
@section('title')
    {{__('Fatortk.swear')}}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('Fatortk.Settings')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('Fatortk.Department List')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('Add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('Add') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('edit') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
    <!--div-->
        <div class="col-xl-12">

            <div class="card">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can('اضافة قسم')
                        <a class="modal-effect btn btn-outline-primary " data-effect="effect-newspaper"
                           data-toggle="modal" href="#modaldemo8"> {{__('Fatortk.add section')}} <i class="fas fa-plus"></i></a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2" data-page-length="50">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{__('Fatortk.Department Name')}}</th>
                                <th class="wd-15p border-bottom-0">{{__('Fatortk.Notes')}}</th>
                                <th class="wd-15p border-bottom-0">{{__('Fatortk.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Sections as $Section)

                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{$Section ->section_name}}</td>
                                    <td>{{$Section ->description}}</td>
                                    <td>
                                        @can('تعديل قسم')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Section->id }}"
                                                title="تعديل"><i class="fa fa-edit"></i>
                                        </button>
                                        @endcan
                                        @can('حذف قسم')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Section->id }}"
                                                title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit{{ $Section->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">{{__('Fatortk.Edit Section')}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- add_form -->

                                                <form action="{{ route('sections.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="section_name"
                                                                   class="mr-sm-2">{{__('Fatortk.Name AR')}}
                                                                :</label>
                                                            <input id="section_name" type="text" name="section_name"
                                                                   class="form-control"
                                                                   value="{{ $Section->getTranslation('section_name', 'ar') }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $Section->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="section_name_en"
                                                                   class="mr-sm-2">{{__('Fatortk.Name')}}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $Section->getTranslation('section_name', 'en') }}"
                                                                   name="section_name_en" required>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{__('Fatortk.Note')}}
                                                            :</label>
                                                        <textarea class="form-control" name="description"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $Section->getTranslation('description', 'ar') }}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{__('Fatortk.Note EN')}}
                                                            :</label>
                                                        <textarea class="form-control" name="description_en"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $Section->getTranslation('description', 'en') }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{__('Fatortk.Close')}}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{__('Fatortk.Update')}}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $Section->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{__('Fatortk.Warning')}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('sections.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{__('Fatortk.Are you sure you want to delete this section?')}}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $Section->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{__('Fatortk.Close')}} </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{__('Fatortk.yes sure')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">{{__('Fatortk.add section')}}</h6>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('sections.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">{{__('Fatortk.Name AR')}}
                                                :</label>
                                            <input id="section_name" type="text" name="section_name"
                                                   class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="section_name_en" class="mr-sm-2">{{__('Fatortk.Name')}}
                                                :</label>
                                            <input type="text" class="form-control" name="section_name_en">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="section_name_en" class="mr-sm-2">{{__('Fatortk.Note')}}
                                            :</label>
                                        <textarea class="form-control" id="description" name="description"
                                                  rows="3"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="section_name_en" class="mr-sm-2">{{__('Fatortk.Note EN')}}
                                            :</label>
                                        <textarea class="form-control" id="description_en" name="description_en"
                                                  rows="3"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">{{__('Fatortk.addition')}}</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">
                                            {{__('Fatortk.Close')}}
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div><!-- bd -->

        </div>
        <!--/div-->


    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
