@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
{{__('Fatortk.Invoice details)}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('Fatortk.billing list)}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('Fatortk.Invoice details)}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


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



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab"> {{__('Fatortk.billing)}}</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">{{__('Fatortk.Invoice information)}}</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">{{__('Fatortk.attachments)}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">{{__('Fatortk.invoice number)}}</th>
                                                        <td>{{ $invoices->invoice_number }}</td>
                                                        <th scope="row">{{__('Fatortk.Release Date)}}</th>
                                                        <td>{{ $invoices->invoice_Date }}</td>
                                                        <th scope="row">{{__('Fatortk.due date)}}</th>
                                                        <td>{{ $invoices->Due_date }}</td>
                                                        <th scope="row">{{__('Fatortk.Section)}}</th>
                                                        <td>{{ $invoices->Sections->section_name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">{{__('Fatortk.the product)}}</th>
                                                        <td>{{ $invoices->product }}</td>
                                                        <th scope="row">{{__('Fatortk.collection amount)}}</th>
                                                        <td>{{ $invoices->Amount_collection }}</td>
                                                        <th scope="row">{{__('Fatortk.Commission amount)}}</th>
                                                        <td>{{ $invoices->Amount_Commission }}</td>
                                                        <th scope="row">{{__('Fatortk.Discount)}}</th>
                                                        <td>{{ $invoices->Discount }}</td>
                                                    </tr>


                                                    <tr>
                                                        <th scope="row">{{__('Fatortk.tax rate)}}</th>
                                                        <td>{{ $invoices->Rate_VAT }}</td>
                                                        <th scope="row">{{__('Fatortk.tax value)}}</th>
                                                        <td>{{ $invoices->Value_VAT }}</td>
                                                        <th scope="row">{{__('Fatortk.total with tax)}}</th>
                                                        <td>{{ $invoices->Total }}</td>
                                                        <th scope="row">{{__('Fatortk.current status)}}</th>

                                                        @if ($invoices->Value_Status == 1)
                                                            <td><span
                                                                    class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                            </td>
                                                        @elseif($invoices->Value_Status ==2)
                                                            <td><span
                                                                    class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                            </td>
                                                        @else
                                                            <td><span
                                                                    class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                            </td>
                                                        @endif
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">{{__('Fatortk.Notes)}}</th>
                                                        <td>{{ $invoices->note }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                       style="text-align:center">
                                                    <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>{{__('Fatortk.invoice number)}}</th>
                                                        <th>{{__('Fatortk.Product Type)}}</th>
                                                        <th>{{__('Fatortk.Section)}}</th>
                                                        <th>{{__('Fatortk.Payment status)}}</th>
                                                        <th>{{__('Fatortk.Payment Date)}}</th>
                                                        <th>{{__('Fatortk.Notes)}}</th>
                                                        <th>{{__('Fatortk.Added date)}}</th>
                                                        <th>{{__('Fatortk.The user)}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($details as $x)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $x->invoice_number }}</td>
                                                            <td>{{ $x->product }}</td>
                                                            <td>{{ $invoices->Sections->section_name }}</td>
                                                            @if ($x->Value_Status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $x->Status }}</span>
                                                                </td>
                                                            @elseif($x->Value_Status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $x->Status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $x->Status }}</span>
                                                                </td>
                                                            @endif
                                                            <td>{{ $x->Payment_Date }}</td>
                                                            <td>{{ $x->note }}</td>
                                                            <td>{{ $x->created_at }}</td>
                                                            <td>{{ $x->user }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                @can('اضافة مرفق')
                                                    <div class="card-body">
                                                        <p class="text-danger">* {{__('Fatortk.Attachment Format)}} pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">{{__('Fatortk.Add attachments)}}</h5>
                                                        <form action="{{ route('InvoiceAttachments.store') }}" method="post" enctype="multipart/form-data"
                                                              autocomplete="off">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                       name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                       value="{{ $invoices->invoice_number }}">
                                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                                       value="{{ $invoices->id }}">
                                                                <label class="custom-file-label" for="customFile">{{__('Fatortk.Select the attachment)}}</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm " name="uploadedFile">{{__('Fatortk.Confirm)}} </button>
                                                        </form>
                                                    </div>
                                                @endcan
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                           style="text-align:center">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            <th scope="col">م</th>
                                                            <th scope="col">{{__('Fatortk.file name)}}</th>
                                                            <th scope="col">{{__('Fatortk.added)}}</th>
                                                            <th scope="col">{{__('Fatortk.Added date)}}</th>
                                                            <th scope="col">{{__('Fatortk.Processes)}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($attachments as $attachment)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $attachment->file_name }}</td>
                                                                <td>{{ $attachment->Created_by }}</td>
                                                                <td>{{ $attachment->created_at }}</td>
                                                                <td colspan="2">

                                                                    <a class="btn btn-outline-success btn-sm"
                                                                       href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                       role="button"><i class="fas fa-eye"></i>&nbsp;{{__('Fatortk.an offer)}}</a>

                                                                    @can('تحميل المرفق')
                                                                    <a class="btn btn-outline-info btn-sm"
                                                                       href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                       role="button"><i
                                                                            class="fas fa-download"></i>&nbsp;{{__('Fatortk.download)}}</a>
                                                                    @endcan
                                                                    @can('حذف المرفق')

                                                                        <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-invoice_number="{{ $attachment->invoice_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">{{__('Fatortk.delete)}}</button>
                                                                    @endcan

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

    <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Fatortk.delete attachment)}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delete_file') }}" method="post">

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> {{__('Fatortk.Are you sure about the process of deleting the attachment?)}}</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="invoice_number" id="invoice_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Fatortk.Cancellation)}}</button>
                        <button type="submit" class="btn btn-danger">{{__('Fatortk.Confirm)}}</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
