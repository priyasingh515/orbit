@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sample</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('sample.create')}}" class="btn btn-primary">Add Sample</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
            <form action=""method="get">
            <div class="card-header">
                <div class="card-title">
                    {{-- <button type="button" onclick="window.location.href='{{route('categories.index')}}'" class="btn btn-default btn-sm">Reset</button> --}}
                </div>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="keyword" value="{{Request::get('keyword')}}" class="form-control float-right" placeholder="Search">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                </div>
            </form>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Pdf</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($SampleData as $sample)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$sample->name}}</td>
                            <td>
                                {{-- @if($sample->sample_file) 
                                <a href="{{ url('public/admin/sample/' . basename($sample->sample_file)) }}" target="_blank">View PDF</a>
                                @else
                                    No PDF
                                @endif   --}}
                                
                                @if (!empty($sample->sample_file) && is_string($sample->sample_file))
                                    <a href="{{ url('public/admin/sample/'.$sample->sample_file) }}" target="_blank">
                                        <img src="{{ asset('/public/assets/front/img/logos/pd.png') }}" alt="Answer Pdf" height="50" width="50">
                                    </a>
                                @else
                                    <span>No PDF</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('sample.edit',$sample->id)}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('sample.delete', $sample->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>

@endsection

@section('customJs')

@endsection